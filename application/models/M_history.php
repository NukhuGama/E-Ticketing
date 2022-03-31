<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_history extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Seoul');
        $this->load->helper('date');
    }


    //  Get Role History List

    public function getRole_hist()
    {
        // return $this->db->select('e.nik, e.fullname, e.positionname, e.personalarea, e.email, e.hpnumber, e.address, r.id, 
        // r.requestform_name, r.role_access, r.remark, r.is_deleted,  r.iby, r.idt, r.uby, r.udt,  r.status_req, s.status_desc')
        //     ->where('e.nik = r.iby AND r.status_req=s.status_req')
        //     ->order_by('r.requestform_name')
        //     ->get('tbl_employee e, tbl_request_log r, tbl_requeststatus s')
        //     ->result();

        $query =  $this->db->query(" SELECT e.nik, e.fullname, e.positionname, e.personalarea, e.email, e.hpnumber, e.address, r.id, 
        r.requestform_name, r.role_access, r.remark, r.is_deleted,  r.iby, r.idt, r.uby, r.udt,  r.status_req
        FROM tbl_employee e, tbl_request_role r WHERE (e.nik = r.iby) ORDER BY r.idt");
        return $query->result();
    }




    // Insert Data For adding Request Role
    public function add_history_role($requestform_name, $role_access,  $is_deleted, $remark, $status_req, $iby, $idt)
    {
        $data = $this->db->query("INSERT INTO tbl_request_log( requestform_name, role_access, is_deleted, remark, status_req, iby, idt) 
      VALUES('$requestform_name', '$role_access', '$is_deleted', '$remark', '$status_req', '$iby', '$idt')");
        return $data;
    }

    // Insert Data Others
    public function insert_history_role($requestform_name, $role_access,  $is_deleted, $remark, $status_req, $iby, $idt, $uby, $udt)
    {
        $data = $this->db->query("INSERT INTO tbl_request_log( requestform_name, role_access, is_deleted, remark, status_req, iby, idt, uby, udt) 
        VALUES('$requestform_name', '$role_access', '$is_deleted', '$remark', '$status_req', '$iby', '$idt', '$uby', '$udt')");
        return $data;
    }

    // Select insert data

    public function select_dataInsert($id)
    {
        $query = $this->db->query(" SELECT  e.nik, e.fullname, e.positionname, e.personalarea, e.email, e.hpnumber, e.address, r.id, 
                r.requestform_name, r.role_access, r.remark, r.is_deleted,  r.iby, r.idt,  r.uby, r.udt, r.status_req, s.status_desc FROM tbl_employee AS e, tbl_request_role AS r, tbl_requeststatus AS s 
                WHERE e.nik = r.iby AND r.status_req=s.status_req AND r.id='$id' ");

        $requestform_name =  $query->row()->requestform_name;
        $role_access =  $query->row()->role_access;
        $is_deleted =  $query->row()->is_deleted;
        $remark  = $query->row()->remark;
        $status_req =  $query->row()->status_req;
        $iby =  $query->row()->iby;
        $idt = $query->row()->idt;

        // if ($query->row()->uby == null) {
        //     $uby = "";
        //     $udt = "";
        // } else {
        $uby = $query->row()->uby;
        $udt = $query->row()->udt;
        // }

        // $status_req = $query->row()->status_desc; 

        $data = $this->insert_history_role($requestform_name,  $role_access, $is_deleted, $remark, $status_req, $iby, $idt, $uby, $udt);

        return  $data;
    }
}
