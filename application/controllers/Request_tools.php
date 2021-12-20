<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request_tools extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('M_employee');
		$this->load->model('M_request');

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


			$this->var['query'] = $this->M_request->get_requesttools_list();
			$this->load->view('request_tools_v', $this->var);
			$this->load->view('layouts/footer');
		}
		// 	$this->load->view('layouts/header');

		// 	$this->load->view('home');
		// 	// $this->load->view('request_tools_v');
		// 	// $this->load->view('request_role_access');

		// 	$this->var['query'] = $this->M_request->get_requesttools_list();
		// 	$this->load->view('request_tools_v', $this->var);
		// 	$this->load->view('layouts/footer');
	}


	public function addRequest_tools()
	{
		// $newDate = date("m-d-Y",strtotime($this->input->post('reqDate')));
		// $data = [];
		$projectName = $this->input->post('projectName');
		$description = $this->input->post('description');
		// $requestType = $this->input->post('requestType');
		$itNotes = $this->input->post('itNotes');
		// $iby = $this->input->post('iby');
		$is_deleted = 0;
		$iby = $this->input->post('iby');
		// $reqDate = $this->input->post('reqDate');
		$reqDate  = date("Y-m-d");


		$this->M_request->add_request_tools($projectName, $description, $is_deleted, $itNotes, $iby, $reqDate);

		redirect('request_tools');
	}

	// public function updateRequest_tools(){
	// 	$id = $this->input->post('id');
	// 	$projectName = $this->input->post('projectName');
	// 	$description =  $this->input->post('description');
	// 	$requestType = $this->input->post('requestType');
	// 	$itNotes = $this->input->post('itNotes');
	// 	$reqDate = $this->input->post('reqDate');
	// 	$this->M_request->update_request_tools($id, $projectName, $description, $requestType, $itNotes, $reqDate);
	// 	redirect('request_tools');
	// }


	// function update($id)
	// {
	//     $data=$this->model_mahasiswa->getIDreqForm($id);
	//     $this->load->view($data);
	// }

	public function updateRequest_tools()
	{
		// $data = array(
		// 	'requestform_name'=>$this->input->post('projectName'),
		//     'descrip'=>$this->input->post('description'),
		//     'request_type'=>$this->input->post('requestType'),
		//     'remark'=>$this->input->post('itNotes'),
		//     'idt'=>$this->input->post('reqDate')
		// );
		$id = $this->input->post('id');

		// $this->db->where('id', $id);
		$this->M_request->update_req_tools($id);
		redirect('request_tools');
	}

	public function deleteRequest_tools()
	{
		$id = $this->input->post('id');
		// $is_deleted= 1;
		$this->M_request->delete_req_tools($id);
		redirect('request_tools');
	}

	public function submitRequest_tools()
	{
		$id = $this->input->post('id');
		$this->M_request->submit_req_tools($id);
		redirect('request_tools');
	}
}
