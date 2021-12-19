<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

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
	 * 
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_employee');

		date_default_timezone_set('Asia/Seoul');
		$this->load->helper('date');
	}

	public function index()
	{
		$nik = $this->session->userdata('nik');
		if ($this->session->userdata('nik') == '') {
			$this->load->view('login/login_v');
		} else {

			$data['query'] = $this->M_employee->selectEmploye($nik);
			$this->load->view('layouts/header', $data);

			$this->load->view('home', $data);
			$this->load->view('edit_profile_v', $data);
			// $this->load->view('request_role_access');
			$this->load->view('layouts/footer');
		}
	}


	public function update_profile()
	{

		// 
		$config['upload_path']         =  'uploads/';  // folder upload
		$config['allowed_types']        = 'gif|jpg|png|jpeg'; // file type
		$config['max_size']             = 10000;


		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('myImg')) // name of input
		{
			echo 'Error Uploading Image';
		} else {

			$file = $this->upload->data();
			$img = $file['file_name'];
			echo 'Uploading Image Success';
		}

		$nik = $this->input->post('nik');
		$data = array(
			'fullname' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'email' => $this->input->post('email'),
			'hpnumber' => $this->input->post('phone'),
			'imgemp'   => $img
		);

		// $this->db->where('id', $id);
		$this->M_employee->editProfile($nik, $data);

		redirect('welcome');
	}
}
