<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
        $this->load->model('m_divisi');
        $this->load->library('pagination');
        $this->load->helper('url');
    }


    public function index()
    {
    }


    public function divisi_karyawan($id_divisi)
    {
        $data = array(
            'title' => 'anggota devisi',
            'karyawan' => $this->karyawan->get_data($this->session->userdata('id_karyawan')),
            'id_divisi' => $id_divisi,
            'divisi_karyawan' => $this->karyawan->get_data_d_karyawan($id_divisi),
            'isi' => 'admin/divisi_karyawan'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
