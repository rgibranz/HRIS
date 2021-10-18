<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_divisi');
        $this->load->model('m_karyawan', 'karyawan');
    }

    public function index()
    {
        $level = $this->session->userdata('level_user');
        if ($level == "admin" || $level == "manajer" || $level == "direktur") {


            $data = array(
                'title' => 'Divisi',
                'karyawan' => $this->karyawan->get_data($this->session->userdata('id_karyawan')),
                'divisi' => $this->m_divisi->get_all_data(),
                'isi' => 'admin/divisi',
            );

            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            redirect('Dasboard_user');
        }
    }

    public function add()
    {
        $data = array(
            '
        nama_divisi' => $this->input->post('nama_divisi'),
        );

        $this->m_divisi->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambah !!! ');
        redirect('divisi');
    }

    public function edit($id_divisi = null)
    {
        $data = array(
            'id_divisi' => $id_divisi,
            'nama_divisi' => $this->input->post('nama_divisi')
        );
        $this->m_divisi->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('divisi');
    }

    public function delete($id_divisi = null)
    {
        $data = array('id_divisi' => $id_divisi);
        $this->m_divisi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('divisi');
    }

    public function delete_karyawan($id_karyawan = NULL)
    {
        $data = array('id_karyawan' => $id_karyawan);
        $this->karyawan->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('divisi/karyawan/divisi_karyawan/');
    }
}

/* End of file divisi.php */
