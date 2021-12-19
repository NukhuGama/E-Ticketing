<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('M_login');
		$this->load->model('M_employee');
		//  $this->load->library('session');
	}
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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$nik = $this->session->userdata('nik');
		if ($this->session->userdata('nik') == '') {
			$this->load->view('login/login_v');
		} else {
			// $this->load->view('layouts/header');
			$data['query'] = $this->M_employee->selectEmploye($nik);
			$this->load->view('layouts/header', $data);
			$this->load->view('home', $data);
			$this->load->view('layouts/footer');
		}
		redirect('dashboard');




		// $this->load->view('index');
	}
}
