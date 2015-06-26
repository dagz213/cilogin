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

	}
}

?>