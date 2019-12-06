<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	public function displayAll(){
		$data['title'] = "Tous les produits";
		$data['products'] = $this->Products_model->selectAll();

		$this->load->view('header', $data);
		$this->load->view('productsList',$data);

	}

	public function displayOne($id){
		$this->output->enable_profiler(TRUE);
		$product = $this->Products_model->selectOne($id)[0];
		if(!isset($product)){
			redirect('Products/displayAll');
		}

		$data['product'] = $product;
		$data['title'] = $product->label;

		$this->load->view('header', $data);
		$this->load->view('productDetail',$data);
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
	        }
	       else{


	       		echo 'c bn';
	        }

		}
		else{
			$this->load->view('header', $data);
			$this->load->view('productAdd', $data);
		}





	}


}

?>
