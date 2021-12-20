<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_employee');
        $this->load->model('M_dashboard');
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


            // $this->var['query'] = $this->M_approval_tool->get_approval_list();
            $data['num_reqRole'] = $this->M_dashboard->numReq_role();
            $data['num_reqTools'] = $this->M_dashboard->numReq_tools();
            $data['num_ApprovalReqRole'] = $this->M_dashboard->numReqRole_approval();
            $data['num_ApprovalReqTools'] = $this->M_dashboard->numReqTools_approval();


            $this->load->view('dashboard_v', $data);
            $this->load->view('layouts/footer');
        }
    }
}
