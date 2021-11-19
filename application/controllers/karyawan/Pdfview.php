<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdfview extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdfgenerator');
        $this->load->model('m_users', 'users');
        $this->load->model('m_cuti', 'cuti');

        checkauth($this->session->userdata('level_user'), 'direktur');
    }

    public function index()
    {
        $id_users = $this->session->userdata('id_users');
        $tahun = $this->input->post('tahun');
        $this->form_validation->set_rules('tahun', 'tahun', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'title' => 'Kartu Cuti',
                'users' => $this->users->get_data($this->session->userdata('id_users')),
                'isi' => 'users/select_datecuti'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $data = array(
                'title' => "KARTU CUTI",
                'users' => $this->users->get_data($this->session->userdata('id_users')),
                'list_cuti' => $this->cuti->select_date($id_users, $tahun),
                'limite' => $this->cuti->select_limit($id_users, $tahun),
                'cek' => $this->cuti->get_cuti_limit1($this->session->userdata('id_users')),
                'tahun' => $tahun

            );
            // $this->data['title'] = "Form Cuti " . $get_data['nama_users'];
            // filename dari pdf ketika didownload
            $file_pdf = "Kartu_Cuti_" . $this->session->userdata('nama_users');
            // setting paper
            $paper = 'A4';
            //orientasi paper potrait / landscape
            $orientation = "portrait";

            $html = $this->load->view('users/kartucuti_pdf', $data, true);
            // run dompdf
            $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        }
    }
}
