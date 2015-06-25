<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowed');

	class Model_test extends CI_Model {

		function __construct(){
			parent::__construct();
		}

		function getTestNames() {
			$query = $this->db->query('SELECT testname FROM test');

			if($query->num_rows() > 0) {
				return $query->result();
			} else {
				return NULL;
			}
		}
	}

?>