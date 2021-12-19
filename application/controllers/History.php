<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
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
        $this->load->model('M_history');

        date_default_timezone_set('Asia/Seoul');
        $this->load->helper('date');
    }

    public function add_role()
    {
        $nik = $this->session->userdata('nik');
        if ($this->session->userdata('nik') == '') {
            $this->load->view('login/login_v');
        } else {
            $uby = "";

            $data['query'] = $this->M_employee->selectEmploye($nik);
            $this->load->view('layouts/header', $data);

            $this->load->view('home', $data);

            $t = $this->db->query("SELECT * FROM tbl_request_log WHERE iby='$nik' ");
            $uby = $t->row()->uby;

            $data['query'] = $this->M_history->getRole_hist();

            // $flname = $this->db->query("SELECT * FROM tbl_employee WHERE nik='$uby' ");
            // $data['test']  = $flname->fullname;

            $this->load->view('history_role_v', $data);
            $this->load->view('layouts/footer');
        }
    }
}
