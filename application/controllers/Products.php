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
				var_dump($this->input->post());
				$data['products'] = $this->Products_model->selectWithCriteria($params);

			}
			else{
				$data['products'] = $this->Products_model->selectAll();

			}

			$this->load->view('header', $data);
			$this->load->view('productsList',$data);
		}

// ------------//
// ID PROVIDED //
//- -----------//
		else{
			$product = $this->Products_model->selectOne($id)[0];
			if(!isset($product)){
				redirect('Products/display');
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

			if ($this->form_validation->run() == FALSE)
	        {
	            $this->load->view('header', $data);
				$this->load->view('productAdd', $data);
				$this->load->view('footer');
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


	       		$this->Products_model->add($params);
	        }

		}
		else{
			$this->load->view('header', $data);
			$this->load->view('productAdd', $data);
			$this->load->view('footer');
		}





	}


}

?>
