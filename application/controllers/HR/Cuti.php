<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_cuti', 'cuti');
    }


    public function index()
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $level = $this->session->userdata('level_user');
        if ($level == 'HR') {
            $data = array(
                'title' => 'list Cuti',
                'users' => $this->users->get_data($id_users),
                'list_cuti' => $this->users->get_all_data_cuti(),
                'isi' => 'HR/list_cuti'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->user_login->logout();
        }
    }

    public function view_cuti($id_cuti)
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];

        $data = array(
            'title' => ' Detail Karyawan',
            'list_cuti' => $this->cuti->view($id_cuti),
            'users' => $this->users->get_data($id_users),
            'isi' => 'HR/cuti',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Cuti.php */
