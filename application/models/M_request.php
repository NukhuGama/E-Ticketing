<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_request extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Seoul');
    $this->load->helper('date');
  }


  // Request Tools
  public function get_requesttools_list()
  {
    return $this->db->select('e.nik, e.fullname, e.positionname, e.personalarea, e.email, e.hpnumber, e.address, r.id, 
      r.requestform_name, r.descrip, r.remark, r.status_req,  r.iby, r.idt, r.udt')
      ->where('e.nik = r.iby AND r.is_deleted = 0')
      ->order_by('r.requestform_name')
      ->get('tbl_employee e, tbl_it_requestform r')
      ->result();

    // $hasil=$this->db->get('tbl_it_requestform');
    // return $hasil->result();
  }

  public function getIDreqForm($id = '')
  {
    return $this->db->get_where('tbl_it_requestform', array('id' => $id))->row();
  }


  public function add_request_tools($projectName, $description,  $is_deleted, $itNotes, $iby, $reqDate)
  {

    $data = $this->db->query("INSERT INTO tbl_it_requestform( requestform_name, descrip, is_deleted, remark, iby, idt) 
             VALUES('$projectName', '$description', '$is_deleted', '$itNotes', '$iby', '$reqDate')");
    return $data;
  }


  public function update_req_tools($id)
  {
    $data = array(
      'requestform_name' => $this->input->post('projectName'),
      'descrip' => $this->input->post('description'),
      // 'request_type' => $this->input->post('requestType'),
      'remark' => $this->input->post('itNotes'),
      // 'idt' => $this->input->post('reqDate')
      'uby' => $this->session->userdata('nik'),
      'udt' =>   date("Y-m-d")
    );

    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->update('tbl_it_requestform');

    return $query;
  }

  //Delete request tools database 
  function delete_req_tools($id)
  {

    $data = array(
      'is_deleted' => 1,
      'dby' => $this->session->userdata('nik'),
      'ddt' =>   date("Y-m-d")
    );
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('tbl_it_requestform');
  }

  function submit_req_tools($id)
  {
    $data = array(
      'status_req' => 1,
      'uby' => $this->session->userdata('nik'),
      'udt' =>   date("Y-m-d")
    );
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('tbl_it_requestform');
  }



  // Request Role Accessibilty
  public function get_request_role_list()
  {
    return $this->db->select('e.nik, e.fullname, e.positionname, e.personalarea, e.email, e.hpnumber, e.address, r.id, 
      r.requestform_name, r.role_access, r.remark, r.status_req,  r.iby, r.idt')
      ->where('e.nik = r.iby AND r.is_deleted = 0')
      ->order_by('r.requestform_name')
      ->get('tbl_employee e, tbl_request_role r')
      ->result();

    // $hasil=$this->db->get('tbl_it_requestform');
    // return $hasil->result();
  }

  public function add_request_role($projectName, $role_access,  $is_deleted, $itNotes, $status_req,  $iby, $reqDate)
  {

    $data = $this->db->query("INSERT INTO tbl_request_role( requestform_name, role_access, is_deleted, remark, status_req, iby, idt) 
             VALUES('$projectName', '$role_access', '$is_deleted', '$itNotes', '$status_req' ,'$iby', '$reqDate')");
    return $data;
  }

  public function update_req_role($id)
  {
    $data = array(
      'requestform_name' => $this->input->post('nameApp'),
      'role_access' => $this->input->post('role_access'),
      'remark' => $this->input->post('itNotes'),
      // 'idt' => $this->input->post('req_date')
      'uby' => $this->session->userdata('nik'),
      'udt' =>   date("Y-m-d")
      // 'idt' =>   date("Y-m-d")
    );

    $this->db->set($data);
    $this->db->where('id', $id);
    $query = $this->db->update('tbl_request_role');

    return $query;
  }

  public function delete_req_role($id)
  {
    $data = array(
      'is_deleted' => 1,
      'dby' => $this->session->userdata('nik'),
      'ddt' =>   date("Y-m-d")
    );
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('tbl_request_role');
  }

  public function submit_request_role($id)
  {
    $data = array(
      'status_req' => 1,
      'uby' => $this->session->userdata('nik'),
      'udt' =>   date("Y-m-d")
    );
    $this->db->set($data);
    $this->db->where('id', $id);
    return $this->db->update('tbl_request_role');
  }
}
