<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{

	public function signup(){

	}



	public function signin(){
		$data['countriesList'] = $this->Countries_model->selectCountries();
		

		$this->load->view('header', $data);
		$this->load->view('signin', $data);
	}






}