<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approval_detail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_employee');

        $this->load->model('M_approval');
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
    // public function index()
    // {
    //     if ($this->session->userdata('nik') == '') {
    //         $this->load->view('login/login_v');
    //     } else {
    //         $this->load->view('layouts/header');
    //         $this->load->view('home');
    //         $this->var['query'] = $this->M_approval->get_requesttools_list();
    //         $this->load->view('approval_v', $this->var);
    //         $this->load->view('layouts/footer');
    //     }


    //     // $this->load->view('index');
    // }

    public function test()
    {
        // redirect('approval');
        // $id = $this->input->post('id');
        $this->load->view('layouts/header');
        $this->load->view('home');
        $this->load->view('detail_approval_v');
        // $this->var['query'] = $this->M_approval->get_requesttools_list();

        $this->load->view('layouts/footer');
    }

    public function approvalManagerUser()
    {

        return True;
    }

    public function approvalManagerIT()
    {

        return True;
    }

    public function approvalVP_NIT()
    {

        return True;
    }
}
