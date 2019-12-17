<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{


	public function sign(){
		$data['countriesList'] = $this->Countries_model->selectCountries();


			//
			// SignUP form posted
			//
		if($this->input->post('signup')){
			
			if($this->form_validation->run('signup')){
				$params = $this->input->post();
				$params['email'] = strtolower($params['email']);

				if(strlen($params['birthdateday']) == 1)
					$day = "0".$params['birthdateday'];
				else
					$day = $params['birthdateday'];

				if(strlen($params['birthdatemonth']) == 1)
					$month = "0".$params['birthdatemonth'];
				else
					$month = $params['birthdatemonth'];

				$params['birthdate'] = $params['birthdateyear'] . "-" . $month . "-" . $day;

				if(isset($params['pro']))
					$params['roleID'] = 2;
				else
					$params['roleID'] = 1;

				$params['charcode'] = $params['country'];
				$params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);

				unset($params['country']);
				unset($params['passwordConfirm']);
				unset($params['birthdateday'], $params['birthdatemonth'], $params['birthdateyear']);
				unset($params['signup']);

					// Succssfully added user
				if($this->Users_model->add($params)){

					$data['title'] = "Confirmation de votre inscription";
					$data['content'] = "Un email de confirmation vous a été envoyé à l'adresse ".$params['email'].". Merci de vérifier votre boite mail afin de cliquer sur le lien présent dans celui-ci pour finaliser votre inscription.";

					$this->load->view('header', $data);
					$this->load->view('signupConfirm', $data);
				}
				else{
					$data['content'] = "Une erreur technique est survenue lors de votre inscription. Merci de réessayer ultérieurement, ou bien de contacter l'administrateur du site.";
					$this->load->view('header', $data);
					$this->load->view('signupConfirm', $data);
				}
			}
			else{
				$this->load->view('header', $data);
				$this->load->view('sign', $data);
			}

		}

			//
			// SignIN form posted
			//
		else if($this->input->post('signin')){

			if($this->form_validation->run('signin')){
				
				$user = $this->Users_model->selectByEmail($this->input->post('email'));

				$this->Users_model->updateLastSignin($user->email);

				$userdata = array(
							'email' => $user->email
				);


				$this->Users_model->updateLastSignin();

			}
			else{
				$data['focusOnSignin'] = true;
				$data['title'] = "Connexion";

				$this->load->view('header', $data);
				$this->load->view('sign', $data);
			}

		}

			//
			// No posted form
			//
		else{
			$data['title'] = "Inscription";
			$this->load->view('header', $data);
			$this->load->view('sign', $data);
		}
	}

	public function exists_email(){

		if(!empty($this->input->post('email'))){
			if($this->Users_model->doesEmailExists($this->input->post('email'))){
				return true;
			}
			else{
				return false;
			}
		}
	}

	public function correct_password(){

		$logs = $this->Users_model->getLogs($this->input->post('email'));
		if(!empty($logs) && !empty($this->input->post('password'))){
			if(password_verify($this->input->post('password'), $logs->password)){
				return true;
			}
			else{
				var_dump($this->input->post('password'));
				return false;
			}
		}


	}
}

