<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_role extends CI_Controller
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
		$this->load->model('M_request');
		$this->load->model('M_history');

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

			$this->var['query'] = $this->M_request->get_request_role_list();
			$this->load->view('request_role_access_v', $this->var);
			$this->load->view('layouts/footer');
		}
		// if ($this->session->userdata('status') == 'login') {
		// 	$this->load->view('layouts/header');
		// 	// $this->var['title'] = 'Haree Notisia Hotu';
		// 	// $this->var['title'] = 'Hello World';
		// 	$this->load->view('home');
		// 	$this->load->view('request_role_access_v');
		// 	// $this->load->view('request_role_access');
		// 	$this->load->view('layouts/footer');
		// } else {
		// 	$this->load->view('login/login_v');
		// }
	}

	public function addRequest_role()
	{
		$id = $this->input->post('id');

		$nameApp = $this->input->post('nameApp');
		$role_access = $this->input->post('role_access');
		$itNotes = $this->input->post('itNotes');
		// $iby = $this->input->post('iby');
		$is_deleted = 0;
		$status_req = 0;
		$iby = $this->input->post('iby');
		// $reqDate = $this->input->post('req_date');
		$reqDate = date("Y-m-d");

		$this->M_request->add_request_role($nameApp,  $role_access, $is_deleted, $itNotes, $status_req,  $iby, $reqDate);

		// Adding to the history list
		$this->M_history->add_history_role($nameApp, $role_access,  $is_deleted, $itNotes, $status_req, $iby, $reqDate);

		redirect('request_role');
	}

	public function updateRequest_role()
	{

		$id = $this->input->post('id');

		// $this->db->where('id', $id);
		$this->M_request->update_req_role($id);

		// Adding to the history list
		$this->M_history->select_dataInsert($id);

		redirect('request_role');
	}

	public function deleteRequest_role()
	{
		$id = $this->input->post('id');

		$this->M_request->delete_req_role($id);

		// Adding to the history list
		$this->M_history->select_dataInsert($id);




		redirect('request_role');
	}

	public function submmitRequest_role()
	{
		$id = $this->input->post('id');
		$this->M_request->submit_request_role($id);

		// Adding to the history list
		$this->M_history->select_dataInsert($id);

		redirect('request_role');
	}
}
