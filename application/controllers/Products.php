<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	public function display($id = null){
		$data['makersList'] = $this->Products_model->selectMakers();

// -----------------//
// NO ARGS PROVIDED //
//------------------//
		if(!isset($id)){
			$data['title'] = "Tous les produits";
			

			if($this->input->post()){
				$data['products'] = $this->Products_model->selectWithCriteria($params);

			}
			else{
				$products = $this->Products_model->selectAll();
				$data['products'] = $products;

				foreach($products as $product){
					if(is_dir('assets/imgs/store/'.$product->productID)){
						if(!empty(scandir('assets/imgs/store/'.$product->productID)[2])){
							$image = base_url('assets/imgs/store/'.$product->productID.'/'.scandir('assets/imgs/store/'.$product->productID)[2]);
							//$orientations[$product->productID] = $this->getOrientation($image);
							$images[$product->productID] = $image;
						}
					}
				}
				$data['images'] = $images;
				//$data['orientations'] = $orientations;

			}

			$this->load->view('header', $data);
			$this->load->view('productsList',$data);

		}

// ------------//
// ID PROVIDED //
//- -----------//
		else{
			$product = $this->Products_model->selectOne($id);

		// Redirect if product ID doesn't exist
			if(!isset($product)){
				redirect('Products/display');
			}

			$images = []; $imagesOrientations = [];
			if(is_dir('assets/imgs/store/'.$product->productID)){
				$files = scandir('assets/imgs/store/'.$product->productID);
				foreach($files as $file){
					if($file != '.' && $file != '..'){
						
						array_push($images, base_url('assets/imgs/store/'.$product->productID.'/'.$file));
						array_push($imagesOrientations, $this->getOrientation($images[0]));

					}
				}
				$data['images'] = $images;
				$data['imagesOrientations'] = $imagesOrientations;

			}
			else{
				//$images[0] = base_url('assets/imgs/noimg.png');
				$imagesOrientations[0] = 0;

				$data['images'] = $images;
				$data['imagesOrientations'] = $imagesOrientations;

				var_dump($images);
			}

			$data['product'] = $product;
			$data['title'] = $product->label;

			$this->load->view('header', $data);
			$this->load->view('productDetail',$data);
		}
	}

	public function search($minprice=null, $maxprice=null, $category=null, $name=null){
		$data['makersList'] = $this->Products_model->selectMakers();
		
		var_dump($data['makersList']);
		$data['title'] = "Tous les produits";
		$params = compact('category','minprice','maxprice','name');
		var_dump($params);
		


		$this->load->view('header', $data);
		$this->load->view('productsList',$data);
	}
	

	public function add(){
		$data['title'] = "Ajouter un produit";
		$data['makersList'] = $this->Products_model->selectMakers();
		$data['suppliersList'] = $this->Suppliers_model->selectSuppliers();
		$data['categoriesList'] = $this->Categories_model->selectCategories();


		if($this->input->post()){

			if (!$this->form_validation->run()){
	            $this->load->view('header', $data);
				$this->load->view('productAdd', $data);
	        }
	        else{
	       		$params = $this->input->post();

	       	// Available
	       		if(isset($params['available'])){
	       			$params['available'] = 1;
	       		}
	       		else{
	       			$params['available'] = 0;
	       		}

	       	// Category
	       		if($this->Categories_model->exists($params['category'])){
	       			$params['categoryID'] = $params['category'];
	       			unset($params['category']);
	       		}
	       		else{
	       			$errors++;
	       		}

	       	// Maker
	       		if($params['ownmaker'] != ''){
	       			$params['maker'] = $params['ownmaker'];
	       		}
	       		unset($params['ownmaker']);

	       	// Inserting in database
	       		$insertedID = $this->Products_model->add($params);

	       		if(isset($insertedID)){
	       			$data['added'] = true;

	       			if($this->upload_images($insertedID) == 0){
	       				$data['uploaded'] = true;
	       			}
	       			else{
		       			$data['uploaded'] = false;
		       		}
	       		}
	       		else{
	       			$data['added'] = false;
	       		}

  	
	       		$this->load->view('header', $data);
				$this->load->view('productAdd', $data);
	        }

		}
		else{
			$this->load->view('header', $data);
			$this->load->view('productAdd', $data);
		}

	}

	public function update($id = null){
		
// -----------------//
// NO ARGS PROVIDED //
//------------------//
		if(!isset($id)){
			echo "no id";
		}

// ------------//
// ID PROVIDED //
//-------------//
		else{
			$product = $this->Products_model->selectOne($id);

// ------------------------//
// NO PRODUCT WITH THIS ID //
//-------------------------//
			if(!isset($product)){
				echo "no product";
			}

// ------------//
// NORMAL FLOW //
//-------------//
			else{

				$data['title'] = "Modification de ".$product->label;
				$data['makersList'] = $this->Products_model->selectMakers();
				$data['suppliersList'] = $this->Suppliers_model->selectSuppliers();
				$data['categoriesList'] = $this->Categories_model->selectCategories();
				$data['product'] = $product;

				if(!$this->input->post()){
					$data['updated'] = false;
					$this->load->view('header',$data);
					$this->load->view('productUpdate',$data);

				}
				else{

					if(!$this->form_validation->run()){
						$data['updated'] = false;
						$this->load->view('header',$data);
						$this->load->view('productUpdate',$data);
					}
					else{
						$params = $this->input->post();

					// Available
			       		if(isset($params['available'])){
			       			$params['available'] = 1;
			       		}
			       		else{
			       			$params['available'] = 0;
			       		}

			       	// Category
			       		if($this->Categories_model->exists($params['category'])){
			       			$params['categoryID'] = $params['category'];
			       			unset($params['category']);
			       		}

			       	// Maker
			       		if($params['ownmaker'] != ''){
			       			$params['maker'] = $params['ownmaker'];
			       		}

			       		unset($params['ownmaker']);

			       	// Update date
			       		$now = new Datetime();
						$now = $now->format('Y-m-d H-i-s');
			       		$params['updatedate'] = $now;

			       	// ID
			       		$params['productID'] = $product->productID;

				       	if($this->Products_model->update($params)){
			       			$data['updated'] = true;

			       			if($this->upload_images($params['productID']) == 0){
			       				$data['uploaded'] = true;
			       			}
			       			else{
				       			$data['uploaded'] = false;
				       		}
			       		}
			       		else{
			       			$data['updated'] = false;
			       		}
			       		$this->load->view('header',$data);
						$this->load->view('productUpdate',$data);
					}

				}

			}
		}

	}

	public function upload_images($filename){
		$images = []; $errors = 0;

	// Create folder for images storage
		if(!is_dir('assets\imgs\store\\'.$filename)){
			mkdir('assets\imgs\store\\'.$filename, 0755);
			$errors++;
		}
		
	// Set default upload config and load library
		$config['upload_path'] = 'assets/imgs/store/'.$filename.'/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_width'] = 2048;
		$config['max_height'] = 2048;

		$this->load->library('upload', $config);

	// For each uploaded file...
		for($i = 0; $i < count($_FILES['images']['name']); $i++){

   			if(!empty($_FILES['images']['name'][$i])){

		// Set temporary $_FILES that will be check by CI
		        $_FILES['image']['name'] = $_FILES['images']['name'][$i];
		        $_FILES['image']['type'] = $_FILES['images']['type'][$i];
		        $_FILES['image']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
		        $_FILES['image']['error'] = $_FILES['images']['error'][$i];
		        $_FILES['image']['size'] = $_FILES['images']['size'][$i];

			// Set image name and initialize upload config
		        $config['file_name'] = $i;
				$this->upload->initialize($config);

			// Upload image
		        if(!$this->upload->do_upload('image')){
		        	$errors++;
		        }

		    }
   		} 
   	// End for

   		return $errors;
	}

// Define default image orientation
	public function getOrientation($image){
		if(pathinfo($image)['extension'] == 'jpg'){
			switch(exif_read_data($image)['Orientation']){
			case 1:
				$imageOrientation = 0;
				break;
			case 8:
				$imageOrientation = 270;
				break;
			case 3:
				$imageOrientation = 180;
				break;
			case 6:
				$imageOrientation = 90;
				break;
			default:
				$imageOrientation = 0;
			}

			return $imageOrientation;
		}
		else{
			return 0;
		}
		
	}



}

?>
