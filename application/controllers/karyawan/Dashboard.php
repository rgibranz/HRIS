<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_cuti', 'cuti');

        if ($this->session->userdata('level_user') != 'Karyawan') {
            echo '<script>alert("Anda Tidak Memiliki Akses Ke Halaman Karyawan")</script>';

            if ($this->session->userdata('level_user') == 'Direktur') {
                redirect('direktur');
            }
            if ($this->session->userdata('level_user') == 'Karyawan') {
                redirect('karyawan');
            }
            if ($this->session->userdata('level_user') == 'Manajer') {
                redirect('manajer');
            }
            if ($this->session->userdata('level_user') == 'HR') {
                redirect('hr');
            }
        }
    }

    public function index()
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $data = array(
            'title' => 'Dashboard',
            'users' => $this->users->get_data($id_users),
            'isi' => 'users/dashboard'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php */
