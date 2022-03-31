<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
         $this->load->library('session');


    }


    public function index()
    {
        if ($this->session->userdata('status') == 'login') {
            redirect(base_url("dashboard"));
        }

        $this->load->view('login/login_v');
    }

    function login_validation()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('pass', 'password', 'required');

        if ($this->form_validation->run() == true) {
            $this->process_login();
        } else {
            $this->load->view('login_v');
        }

        return true;
    }

    public function process_login()
    {
        $nik = $this->input->post('NIK');
        $password = $this->input->post('password');
        // b$password='12345';


        $password = md5($password);
        //  var_dump($encrypt);die();
        $w = array(
            'nik' => $nik,
            'pass' => $password,
        );

        $cek = $this->M_login->check_login("tbl_employee", $w)->num_rows();
        if ($cek > 0) {
            $this->M_login->getLoginData($nik);
            redirect(base_url("welcome"));
            $this->refresh_session($nik);
        } else {
            echo '<script> alert("Username and password not match ")   </script>';
            $this->load->view('login/login_v');
        }
    }

    public function logoutProcess()
    {
        $this->session->sess_destroy();
        redirect('login?message=logout', 'refresh');
    }



    public function refresh_session($nik)
    {

        if (!$nik) {
            $nik = $this->session->userdata('nik');
        }
        session_unset();
        $query = "SELECT *  FROM tbl_employee WHERE nik='$nik' AND isdeleted='0'";

        return $query;
    }


    /* End of file Login.php */
}
