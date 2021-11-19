<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_absen', 'absen');

        checkauth($this->session->userdata('level_user'), 'HR');
    }

    public function index()
    {
        $get_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $get_id['id_users'];
        $level = $this->session->userdata('level_user');
        if ($level == 'HR') {
            $data = array(
                'title' => 'History Absen',
                'users' => $this->users->get_data($id_users),
                'all_absen' => $this->absen->get_all_data($id_users),
                'all_users' => $this->users->get_all_data(),
                'absen_end' => $this->absen->get_data_absen($id_users),
                'isi' => 'hr/absen'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->user_login->logout();
        }
    }

    public function list_absen()
    {

        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $nama = $this->input->post('nama');
        $data = array(
            'title' => 'List Absen Pekerja',
            'users' => $this->users->get_data($this->session->userdata('id_users')),
            'list_absen' => $this->absen->list_absen_admin($nama, $tahun, $bulan),
            'isi' => 'hr/list_absen'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Absen.php */
