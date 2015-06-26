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
		$this->load->model('model_test');
	}

	public function index()
	{
		$this->test();
	}

	public function test()
	{
		$data['title']= 'Login';
		$data['tests'] = $this->model_test->getTestNames();

		$this->load->view('header_view', $data);
		$this->load->view('login_view', $data);
		$this->load->view('footer_view', $data);
	}

	public function insertTestName() {

		$testName = $this->input->post('testName');
		if($testName != NULL) {
			$result = $this->model_test->insertNewTest($testName);

			if($result == "fail") {
				echo "FAIL";
			} else {
				echo $testName;
			}
		} else {
			echo "EMPTY";
		}
	}
}
