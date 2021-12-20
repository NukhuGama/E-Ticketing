<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Print_approval extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_employee');

        $this->load->model('M_approval_role');
        $this->load->model('M_approval_tool');
        //  $this->load->library('session');
        date_default_timezone_set('Asia/Seoul');
        $this->load->helper('date');
    }

    // Print Approval Tool
    public function index()
    {
        $id = $this->input->post('idR');
        // $nik = $this->session->userdata('nik');

        if ($this->session->userdata('nik') == '') {
            $this->load->view('login/login_v');
        } else {


            $this->load->library('mypdf');
            $d = $this->M_approval_tool->getSelectRequestForm($id);
            $dt_file = date('d-m-Y');
            $filename = $d['nik'] . "_" . $dt_file . "_" . "Request_tool";

            $data['query'] = $this->M_approval_tool->getSelectRequestForm($id);
            $this->mypdf->gennerate('print_approval_v', $data, $filename);
        }
    }


    // Print Approval Role
    public function print_reqRole()
    {
        $id = $this->input->post('idR');

        if ($this->session->userdata('nik') == '') {
            $this->load->view('login/login_v');
        } else {
            $this->load->library('mypdf');
            $d = $this->M_approval_role->getSelectRequestForm($id);
            $dt_file = date('d-m-Y');
            $filename = $d['nik'] . "_" . $dt_file . "_" . "Request_role";

            $data['query'] = $this->M_approval_role->getSelectRequestForm($id);
            $this->mypdf->gennerate('print_approvalRole_v', $data, $filename);
        }
    }
}
