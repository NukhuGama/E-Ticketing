<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_approval');
        //  $this->load->library('session');
        date_default_timezone_set('Asia/Seoul');
        $this->load->helper('date');
    }

    public function numReq_role()
    {
        $query = $this->db->query("SELECT id FROM tbl_request_role WHERE is_deleted=0 ");

        return  $query->num_rows();
    }

    public function numReq_tools()
    {
        $query = $this->db->query("SELECT id FROM tbl_it_requestform WHERE is_deleted=0 ");

        return  $query->num_rows();
    }

    public function numReqRole_approval()
    {
        $query = $this->db->query("SELECT id FROM tbl_request_role WHERE status_req = 4 ");

        return  $query->num_rows();
    }

    public function numReqTools_approval()
    {
        $query = $this->db->query("SELECT id FROM tbl_it_requestform WHERE status_req = 4 ");

        return  $query->num_rows();
    }
}
