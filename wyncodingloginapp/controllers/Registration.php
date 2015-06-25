<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

	public function index()
	{
		$this->test();
	}

	public function test()
	{
		$this->load->view('registration_view');
	}
}
