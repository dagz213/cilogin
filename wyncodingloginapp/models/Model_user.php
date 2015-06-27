<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Model_user extends CI_Model {

		function __construct(){
			parent::__construct();
		}

		function addNewUser($firstname, $lastname, $username, $password, $email) {
			$user = array(
				'firstname' => $firstname,
				'lastname' => $lastname,
				'username' => $username,
				'password' => md5($password),
				'email' => $email
				);
			$result = $this->db->insert('user', $user);
			if($result) return true;
		}
	}

?>