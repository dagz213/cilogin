<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	function __construct(){		
		parent::__construct();
		session_start();
		$this->load->model('model_user');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	function register() {

		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$confirmpassword = $this->input->post('confirmpassword');
		$email = $this->input->post('email');

		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE) {

			$response['firstname'] = form_error('firstname');
			$response['lastname'] = form_error('lastname');
			$response['username'] = form_error('username');
			$response['password'] = form_error('password');
			$response['confirmpassword'] = form_error('confirmpassword');
			$response['email'] = form_error('email');
			echo json_encode($response);

		} else {

			if($password != $confirmpassword) {

				$response['passworderror'] = "error";
				echo json_encode($response);

			} else {

				$result = $this->model_user->addNewUser($firstname, $lastname, $username, $password, $email);

				if($result) {

					$response['success'] = $result;
					echo json_encode($response);

				} else {

					$response['failed'] = "failed";
					echo json_encode($response);

				}
			}
		}	
	} /* END OF REGISTER FUNCTION */

	function login() {

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {

			$response['username'] = form_error('username');
			$response['password'] = form_error('password');
			echo json_encode($response);

		} else {

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$result = $this->model_user->checkIfUserExists($username);
			if($result) {


				$user = $this->model_user->getUser($username);

				if($user->password == sha1($password)) {
					
					$_SESSION['username'] = $username;
  					$response['success'] = "success";
  					echo json_encode($response);

				} else {

					$response['wrongpassword'] = "Wrong username or password!";
					echo json_encode($response);
				}


			} else {
				$response['notexists'] = "not exists";
				echo json_encode($response);
			}
		}

	} /* END OF LOGIN FUNCTION */

	public function logout() {
		session_destroy();
		redirect(base_url(), 'refresh');
	}
}

?>