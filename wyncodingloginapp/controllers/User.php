<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){		
		parent::__construct();
	}

	function register() {
		
		$firstname = $this->input->post('firstname');
		$lastname = $this->input->post('lastname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$confirmpassword = $this->input->post('confirmpassword');
		$email = $this->input->post('email');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE) {

			$error['firstname'] = form_error('firstname');
			$error['lastname'] = form_error('lastname');
			$error['username'] = form_error('username');
			$error['password'] = form_error('password');
			$error['confirmpassword'] = form_error('confirmpassword');
			$error['email'] = form_error('email');
			echo json_encode($error);

		} else {

		}	
	}
}

?>