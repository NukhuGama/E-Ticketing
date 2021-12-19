<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_r_tool extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_employee');
        $this->load->model('M_approval_tool');
        //  $this->load->library('session');
        // $this->load->model('M_approval_tool');
        //  $this->load->library('session');
        date_default_timezone_set('Asia/Seoul');
        $this->load->helper('date');
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
            $data['query'] = $this->M_employee->selectEmploye($nik);
            $this->load->view('layouts/header', $data);
            $this->load->view('home', $data);

            $this->var['query'] = $this->M_approval_tool->get_approval_list();
            $this->load->view('approvalRtool_v', $this->var);
            $this->load->view('layouts/footer');
        }


        // $this->load->view('index');
    }

    public function detail_approval()
    {
        $nik = $this->session->userdata('nik');
        $id = $this->input->post('idR');
        // $id = $_GET['id'];
        // redirect('approval_r_tool');
        // $where=array('id'=>$id);
        if ($this->session->userdata('nik') == '') {
            $this->load->view('login/login_v');
        } else {

            $data['query'] = $this->M_employee->selectEmploye($nik);
            $this->load->view('layouts/header', $data);
            $this->load->view('home', $data);

            // $this->load->view('layouts/header');
            // $this->load->view('home');
            $data['query'] = $this->M_approval_tool->getSelectRequestForm($id);
            // $this->var['query'] = $this->M_approval_tool->M_managerUserApprove($id);
            $this->load->view('detail_approvalRtool_v', $data);
            $this->load->view('layouts/footer');
        }
    }



    // Approval Manager User
    public function approvalManagerUser()
    {
        $id = $this->input->post('id_approve_user');
        $this->M_approval_tool->M_managerUserApprove($id);
        redirect('approval_r_tool');
    }


    // Rejected Manager User
    public function rejectedManagerUser()
    {
        $id = $this->input->post('id_reject_user');
        $this->M_approval_tool->M_managerUserReject($id);
        redirect('approval_r_tool');
    }

    // Approval Manager IT
    public function approvalManagerIT()
    {

        $id = $this->input->post('id_approve_IT');
        $this->M_approval_tool->M_managerITApprove($id);
        redirect('approval_r_tool');
    }

    // Rejected Manager IT 
    public function rejectedManagerIT()
    {
        $id = $this->input->post('id_reject_IT');
        $this->M_approval_tool->M_managerITReject($id);
        redirect('approval_r_tool');
    }

    //  Approve VP NIT
    public function approvalVP_NIT()
    {
        $id = $this->input->post('id_approve_VP');
        $this->M_approval_tool->M_VP_NIT_Approve($id);
        redirect('approval_r_tool');
    }

    // Rejected VP  NIT 

    public function rejectedVP_NIT()
    {
        $id = $this->input->post('id_reject_VP');
        $this->M_approval_tool->M_VP_NITReject($id);
        redirect('approval_r_tool');
    }
}
