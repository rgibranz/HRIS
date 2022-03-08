<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_cuti', 'cuti');
        checkauth($this->session->userdata('level_user'), 'Direktur');
    }


    public function index()
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $data = array(
            'title' => 'list Cuti',
            'users' => $this->users->get_data($id_users),
            'list_cuti' => $this->cuti->get_all_data_cuti(),
            'isi' => 'direktur/list_cuti'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function view_cuti($id_cuti)
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $data = array(
            'title' => ' Detail Pengajuan Cuti',
            'list_cuti' => $this->cuti->view($id_cuti),
            'users' => $this->users->get_data($id_users),
            'isi' => 'direktur/cuti',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function edit()
    {
        $status_direktur = $this->input->post('status_direktur');

        if ($status_direktur == "accept") {

            // $sisa_cuti = $this->input->post('sisa_cuti');
            // $lama_cuti = $this->input->post('lama_cuti');
            // $hasil = $sisa_cuti - $lama_cuti;

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'nama_direktur' => $this->session->userdata('nama_users'),
                'status_direktur' => $this->input->post('status_direktur'),
                'keterangan_direktur' => $this->input->post('keterangan_direktur'),
            );

            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
            redirect('direktur/cuti');
        }
        if ($status_direktur == "reject") {
            // jika di reject maka sisa cuti kembali.
            $sisa_cuti = $this->input->post('sisa_cuti');
            $lama_cuti = $this->input->post('lama_cuti');
            $hasil = $sisa_cuti + $lama_cuti;

            $data = array(
                'id_cuti' => $this->input->post('id_cuti'),
                'nama_direktur' => $this->session->userdata('nama_users'),
                'status_direktur' => $this->input->post('status_direktur'),
                'keterangan_direktur' => $this->input->post('keterangan_direktur'),
            );

            $sisa_data = array(
                'id_users' => $this->input->post('id_users'),
                'sisa_cuti' => $hasil,
            );

            $this->cuti->edit_cuti($data);
            $this->users->edit($sisa_data);
            $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
            redirect('direktur/cuti');
        }
    }
}

/* End of file Cuti.php */
