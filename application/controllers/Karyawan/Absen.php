<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user', 'users');
    }


    public function index()
    {
        $get_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $get_id['id_users'];

        $data = array(
            'title' => 'History Absen',
            'users' => $this->users->get_data($id_users),
            'absen' => $this->absen->get_data($id_users),
            'absen_end' => $this->absen->get_data_absen($id_users),
            'isi' => 'karyawan/absen'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Absen.php */
