<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
        $this->load->model('m_cuti', 'cuti');
        $this->load->model('m_form', 'form');

        $this->load->library('form_validation');
    }

    public function view_cuti($id_cuti)
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $s_id['id_karyawan'];

        $level = $this->session->userdata('level_user');
        if ($level == 'admin') {
            $data = array(
                'title' => ' Detail Karyawan',
                'list_cuti' => $this->cuti->view($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'admin/cuti',
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        }
        if ($level == 'direktur') {
            $data = array(
                'title' => ' Detail Karyawan',
                'list_cuti' => $this->cuti->view($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'direktur/cuti',
            );
            $this->load->view('layout/wrapper_direktur', $data, FALSE);
        }
        if ($level == 'manajer') {
            $data = array(
                'title' => ' Detail Karyawan',
                'list_cuti' => $this->cuti->view($id_cuti),
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'manajer/cuti',
            );
            $this->load->view('layout/wrapper_manajer', $data, FALSE);
        }
    }

    public function view_cuti_user($id_cuti = NULL)
    {
        $data = array(
            'title' => ' Detail Karyawan',
            'karyawan' => $this->karyawan->get_data($this->session->userdata('id_karyawan')),
            'list_cuti' => $this->karyawan->get_data_cuti_s($id_cuti),
            'isi' => 'user/cuti',
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }
}

/* End of file Form.php */
