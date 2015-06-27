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
				'password' => sha1($password),
				'email' => $email
				);
			$result = $this->db->insert('user', $user);
			if($result) return true;
		}

		function checkIfUserExists($username) {

			$this->db->where('username', $username);
			$query = $this->db->get('user');

			if($query->num_rows() > 0) return true;
		}

		function getUser($username) {

			$this->db->where('username', $username);
			$query = $this->db->get('user');

			if($query) {
				return $query->row();

			}
		}
	}

?>