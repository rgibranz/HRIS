<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_cuti', 'cuti');
    }


    public function index()
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $data = array(
            'title' => 'list Cuti',
            'users' => $this->users->get_data($id_users),
            'list_cuti' => $this->cuti->get_all_data_cuti(),
            'isi' => 'manajer/list_cuti'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function view_cuti($id_cuti)
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $data = array(
            'title' => ' Detail users',
            'list_cuti' => $this->cuti->view($id_cuti),
            'users' => $this->users->get_data($id_users),
            'isi' => 'manajer/cuti',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function edit()
    {
        $status_manajer = $this->input->post('status_manajer');

        if ($status_manajer == "accept") {

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'status_manajer' => $this->input->post('status_manajer'),
                'keterangan_manajer' => $this->input->post('keterangan_manajer'),
            );
            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data karyawan Berhasil Di buat');
            redirect('manajer/cuti');
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
                'id_users' => $this->input->post('id_users'),
                'sisa_cuti' => $sisa_cuti,
            );

            $this->form->edit($sisa_data);
            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('manajer/cuti');
        }
    }
}

/* End of file Cuti.php */
