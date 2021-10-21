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



    public function list_cuti()
    {
        $level = $this->session->userdata('level_user');
        if ($level == "manajer") {
        }
        if ($level == "direktur") {
        }
        if ($level == "admin") {
        }
        if ($level == "user") {
        }
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


    public function cuti_edit()
    {
        $status_manajer = $this->input->post('status_manajer');
        $status_direktur = $this->input->post('status_direktur');

        if ($status_direktur == "accept") {

            // $sisa_cuti = $this->input->post('sisa_cuti');
            // $lama_cuti = $this->input->post('lama_cuti');
            // $hasil = $sisa_cuti - $lama_cuti;

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_direktur' => $this->input->post('status_direktur'),
                'keterangan_direktur' => $this->input->post('keterangan_direktur'),
            );

            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti');
        }
        if ($status_direktur == "reject") {
            // jika di reject maka sisa cuti kembali.
            $sisa_cuti = $this->input->post('sisa_cuti');


            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_direktur' => $this->input->post('status_direktur'),
                'keterangan_direktur' => $this->input->post('keterangan_direktur'),
            );

            $sisa_data = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
                'sisa_cuti' => $sisa_cuti,
            );

            $this->cuti->edit_cuti($data);
            $this->form->edit($sisa_data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti');
        }
        if ($status_manajer == "accept") {

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_manajer' => $this->input->post('status_manajer'),
                'keterangan_manajer' => $this->input->post('keterangan_manajer'),
            );
            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti');
        }
        if ($status_manajer == "reject") {
            // jika di reject maka sisa cuti kembali.
            $sisa_cuti = $this->input->post('sisa_cuti');

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_manajer' => $this->input->post('status_manajer'),
                'keterangan_manajer' => $this->input->post('keterangan_manajer'),
            );

            $sisa_data = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
                'sisa_cuti' => $sisa_cuti,
            );

            $this->form->edit($sisa_data);
            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti');
        }
    }

    public function delete($id_cuti = null)
    {
        $data = array('id_cuti' => $id_cuti);
        $this->cuti->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('form/list_cuti');
    }
}

/* End of file Form.php */
