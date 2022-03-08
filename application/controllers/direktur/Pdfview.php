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

        checkauth($this->session->userdata('level_user'), 'Direktur');
    }

    public function view($id_cuti = null)
    {
        $get_data = $this->db->get_where('cuti', ['id_cuti' => $id_cuti])->row_array();

        $data = array(
            'title' => "Form Cuti",
            'profile' => $this->cuti->get_data($id_cuti),
        );
        // $this->data['title'] = "Form Cuti " . $get_data['nama_users'];
        // filename dari pdf ketika didownload
        $file_pdf = "Form_Cuti_" . $get_data['nama_users'] . "_" . date('d-m-y');
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('direktur/cuti_pdf', $data, true);
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
