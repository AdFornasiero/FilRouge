<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{


	public function sign(){
		$data['countriesList'] = $this->Countries_model->selectCountries();

//--------------------//
// SIGNUP FORM POSTED //
//--------------------//

		if($this->input->post('signup')){
			
			if($this->form_validation->run('signup')){
				$params = $this->input->post();
				
		// Prep user's data before inserting

			// Email
				$params['email'] = strtolower($params['email']);

			// Birthdate
				if(strlen($params['birthdateday']) == 1)
					$day = "0".$params['birthdateday'];
				else
					$day = $params['birthdateday'];
				if(strlen($params['birthdatemonth']) == 1)
					$month = "0".$params['birthdatemonth'];
				else
					$month = $params['birthdatemonth'];
				$params['birthdate'] = $params['birthdateyear'] . "-" . $month . "-" . $day;

			// Professional
				if(isset($params['pro']))
					$params['roleID'] = 2;
				else
					$params['roleID'] = 1;

			// Country
				$params['charcode'] = $params['country'];

			// Password
				$params['password'] = password_hash($params['password'], PASSWORD_DEFAULT);

		// Delete unused datas
				unset($params['country']);
				unset($params['passwordConfirm']);
				unset($params['birthdateday']);
				unset($params['birthdatemonth']);
				unset($params['birthdateyear']);
				unset($params['signup']);

		// Successfully added user
				if($this->Users_model->add($params)){
					$data['title'] = "Confirmation de votre inscription";
					$data['content'] = "Un email de confirmation vous a été envoyé à l'adresse ".$params['email'].". Merci de vérifier votre boite mail afin de cliquer sur le lien présent dans celui-ci pour finaliser votre inscription.";

					$this->load->view('header', $data);
					$this->load->view('signupConfirm', $data);
				}

		// Error during insertion
				else{
					$data['content'] = "Une erreur technique est survenue lors de votre inscription. Merci de réessayer ultérieurement, ou bien de contacter l'administrateur du site.";
					$this->load->view('header', $data);
					$this->load->view('signupConfirm', $data);
				}
			}
			else{

		// Couldn't validate all form fields
				$this->load->view('header', $data);
				$this->load->view('sign', $data);
			}
		}

//--------------------//
// SIGNIN FORM POSTED //
//--------------------//

		else if($this->input->post('signin')){

			if($this->form_validation->run('signin')){
				
				$user = $this->Users_model->selectByEmail($this->input->post('email'));

		// Update last signin date
				$this->Users_model->updateLastSignin($user->email);

		// Set user's status
				switch($user->roleID){
					case(1): $pro = false;
					case(2): $pro = true;
					case(3): $isAdmin = true;
					default: $pro = false;
				}

		// Set user's session data
				$userdata = array(
							'logged' => true,
							'id' => $user->userID,
							'email' => $user->email,
							'login' => $user->login,
							'firstname' => $user->firstname,
							'lastname' => $user->lastname,
							'phone' => $user->phone,
							'birthdate' => $user->birthdate,
							'lastsignindate' => $user->lastsignindate,
							'country' => $user->charcode,
							'pro' => $pro
				);

				$this->session->set_userdata($userdata);
				redirect(site_url('Users/profile'));

		// Check if user's admin
			if(isset($isAdmin) && $isAdmin)
				$userdata['admin'] = true;

		// Cannot validate signin form
			}
			else{
				$data['focusOnSignin'] = true;
				$data['title'] = "Connexion";

				$this->load->view('header', $data);
				$this->load->view('sign', $data);
			}
		}

//----------------//
// NO POSTED FORM //
//----------------//

		else{
			$data['title'] = "Inscription";
			$this->load->view('header', $data);
			$this->load->view('sign', $data);
		}
	}


	public function forgot_password(){
		$data['title'] = "Mot de passe oublié";
		$this->load->view('header', $data);
		$this->load->view('forgotPassword', $data);

	}


	public function profile(){
		$data['title'] = 'Mon compte';
		$this->load->view('header', $data);
		$this->load->view('profile', $data);
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

