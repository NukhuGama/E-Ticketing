<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  function check_login($table, $where)
  {
    return $this->db->get_where($table, $where);
  }

  function getLoginData($nik)
  {
    $query = $this->db->query("SELECT * FROM tbl_employee WHERE nik='$nik' ");
    $query1 = $this->db->query(" SELECT * FROM tbl_request_role  WHERE iby='$nik'  ");
    // return $query->row();
    $nik          = $query->row()->nik;
    $fullname     = $query->row()->fullname;
    $positionname = $query->row()->positionname;
    $personalarea = $query->row()->personalarea;
    $address      = $query->row()->address;
    $email        = $query->row()->email;
    $phonenumber  = $query->row()->hpnumber;

    $role_access  = $query1->row()->role_access;
    $status_req   = $query1->row()->status_req;

    $data_session = array(
      'nik'          => $nik,
      'fullname'     => $fullname,
      'positionname' => $positionname,
      'personalarea' => $personalarea,
      'address'      => $address,
      'phonenumber'  => $phonenumber,
      'email'        => $email,
      'role_access'  => $role_access,
      'status_req'   => $status_req,
      'status'       => "login",

    );

    $this->session->set_userdata($data_session);
  }
}
