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
    }

    public function index()
    {
        $get_data = $this->db->get_where('cuti', ['id_cuti' => $this->input->post('id_cuti')])->row_array();

        $data = array(
            'title' => "Form Cuti",
            'profile' => $this->cuti->get_data($get_data['id_cuti']),
        );
        // $this->data['title'] = "Form Cuti " . $get_data['nama_users'];
        // filename dari pdf ketika didownload
        $file_pdf = "Form_Cuti_" . $get_data['nama_users'];
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = $this->load->view('hr/cuti_pdf', $data, true);
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
