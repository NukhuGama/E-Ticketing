<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_employee extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_approval');
        //  $this->load->library('session');
        date_default_timezone_set('Asia/Seoul');
        $this->load->helper('date');
    }

    //       Approval  Request Role 
    //  ====================================== 

    public function selectEmploye($nik)
    {
        $query = $this->db->query(" SELECT * FROM tbl_employee WHERE nik='$nik' ");

        $data_array = array(
            'fullname' => $query->row()->fullname,
            'positionname' => $query->row()->positionname,
            'nik' => $query->row()->nik,
            'address' => $query->row()->address,
            'phonenumber' => $query->row()->hpnumber,
            'email' => $query->row()->email,
            'imgemp' => $query->row()->imgemp



        );
        return  $data_array;
    }

    public function selectCurImg($nik)
    {
        $query = $this->db->query(" SELECT imgemp FROM tbl_employee WHERE nik='$nik' ");
        return $query;
    }

    public function editProfile($nik, $data)
    {

        $this->db->set($data);
        $this->db->where('nik', $nik);
        $query = $this->db->update('tbl_employee');

        return $query;
    }
}
