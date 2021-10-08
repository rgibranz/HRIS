<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
    }

    public function index()
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $s_id['id_karyawan'];
        $level = $this->session->userdata('level_user');
        if ($level != 'user') {
            if ($level == 'manajer') {
                $data = array(
                    'title' => 'Dasboard',
                    'karyawan' => $this->karyawan->get_data($id_karyawan),
                    'isi' => 'manajer/dasboard'
                );
                $this->load->view('layout/wrapper_manajer', $data, FALSE);
            }
            if ($level == 'direktur') {
                $data = array(
                    'title' => 'Dasboard',
                    'karyawan' => $this->karyawan->get_data($id_karyawan),
                    'isi' => 'direktur/dasboard'
                );
                $this->load->view('layout/wrapper_direktur', $data, FALSE);
            }
            if ($level == 'admin') {
                $data = array(
                    'title' => 'Dasboard',
                    'karyawan' => $this->karyawan->get_data($id_karyawan),
                    'isi' => 'admin/dasboard'
                );
                $this->load->view('layout/wrapper', $data, FALSE);
            }
        } else {
            redirect('Dasboard_user');
        }
    }
}

/* End of file Controllername.php */
