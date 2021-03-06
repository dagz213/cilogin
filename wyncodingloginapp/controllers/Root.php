<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Root extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		session_start();
	}

	public function index()
	{
		if(isset($_SESSION['username'])) {
			$data['title']= 'Dashboard';

			$this->load->view('header_view', $data);
			$this->load->view('dashboard', $data);
			$this->load->view('footer_view', $data);
		} else {
			$data['title']= 'Login';

			$this->load->view('header_view', $data);
			$this->load->view('login_view', $data);
			$this->load->view('footer_view', $data);
		}
	}
}
