<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_approval_tool extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_approval');
        //  $this->load->library('session');
        date_default_timezone_set('Asia/Seoul');
        $this->load->helper('date');
    }




    //      Approval  Request Tools
    //   ==================================
    public function get_approval_list()
    {
        return $this->db->select('e.nik, e.fullname, e.positionname, e.personalarea, e.email, e.hpnumber, e.address, r.id, 
        r.requestform_name, r.descrip, r.remark, r.status_req,  r.iby, r.idt, r.uby, r.udt')
            ->where('e.nik = r.iby AND r.is_deleted = 0 AND r.status_req<>0  ')
            ->order_by('r.requestform_name')
            ->get('tbl_employee e, tbl_it_requestform r')
            ->result();

        // $hasil=$this->db->get('tbl_it_requestform');
        // return $hasil->result();
    }


    public function getSelectRequestForm($id)
    {
        $query = $this->db->query(" SELECT * FROM tbl_employee e, tbl_it_requestform  r WHERE (r.id='$id' AND e.nik = r.iby) ");
        // $this->db->select('id, status_req, remark');
        // $this->db->from('tbl_it_requestform');
        // $this->db->where('id', $id);
        // $query = $this->db->get()->result_array();
        // $managerUser = $this->db->query("SELECT * FROM tbl_employee WHERE nik='2002');

        $data_array = array(
            'id' => $query->row()->id,
            'req_name' => $query->row()->requestform_name,
            'descrip' => $query->row()->descrip,
            // 'req_type' => $query->row()->request_type,
            'status_req' => $query->row()->status_req,
            'notes' => $query->row()->remark,
            'req_date' => $query->row()->idt,
            'fullname' => $query->row()->fullname,
            'nik' => $query->row()->nik,
            'address' => $query->row()->address,
            'phonenumber' => $query->row()->hpnumber,
            'email' => $query->row()->email,
            'positionname' => $query->row()->positionname


        );
        return  $data_array;
    }

    //   Approve form manager User
    function M_managerUserApprove($id)
    {
        $data = array(
            'status_req' => 2,
            'uby' => $this->session->userdata('nik'),
            'udt' => date("Y-m-d"),
        );
        $this->db->set($data);
        $this->db->where('id', $id);

        return $this->db->update('tbl_it_requestform');

        // Select All
        //     $query = $this->db->get();
        //     return $this->$query->result();
    }

    // Reject from Manager User 
    function M_managerUserReject($id)
    {
        $remark = $this->input->post('rejectNoteMuser');

        $data = array(
            'status_req' => -1,
            'remark' => $remark,
            'uby' => $this->session->userdata('nik'),
            'udt' => date("Y-m-d"),
        );

        $this->db->set($data);
        $this->db->where('id', $id);

        return $this->db->update('tbl_it_requestform');
    }

    // Approval From  Manager IT
    function M_managerITApprove($id)
    {
        $data = array(
            'status_req' => 3,
            'uby' => $this->session->userdata('nik'),
            'udt' => date("Y-m-d"),
        );
        $this->db->set($data);
        $this->db->where('id', $id);

        return $this->db->update('tbl_it_requestform');
    }
    // Reject from Manager IT
    function M_managerITReject($id)
    {
        $remark = $this->input->post('rejectNoteMIT');
        $data = array(
            'status_req' => -2,
            'remark' => $remark,
            'uby' => $this->session->userdata('nik'),
            'udt' => date("Y-m-d"),
        );

        $this->db->set($data);
        $this->db->where('id', $id);

        return $this->db->update('tbl_it_requestform');
    }

    // Approval VP  NIT
    function M_VP_NIT_Approve($id)
    {
        $data = array(
            'status_req' => 4,
            'uby' => $this->session->userdata('nik'),
            'udt' => date("Y-m-d"),
        );
        $this->db->set($data);
        $this->db->where('id', $id);

        return $this->db->update('tbl_it_requestform');
    }

    // Reject from VP NIT 
    function M_VP_NITReject($id)
    {
        $remark = $this->input->post('rejectNoteVP');
        $data = array(
            'status_req' => -3,
            'remark' => $remark,
            'uby' => $this->session->userdata('nik'),
            'udt' => date("Y-m-d"),
        );

        $this->db->set($data);
        $this->db->where('id', $id);

        return $this->db->update('tbl_it_requestform');
    }
}
