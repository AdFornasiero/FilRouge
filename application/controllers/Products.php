<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	public function display($id = null){

// -----------------//
// NO ARGS PROVIDED //
//------------------//
		if(!isset($id)){
			$data['title'] = "Tous les produits";
			$data['products'] = $this->Products_model->selectAll();

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

	public function search($category = null, $minprice=null, $maxprice=null, $name=null){

		$data['title'] = "Tous les produits";
		$params = compact('categoryID','minprice','maxprice','name');

		intval(params['minprice']);
		$data['products'] = $this->Products_model->selectWithCriteria(params);
		
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
