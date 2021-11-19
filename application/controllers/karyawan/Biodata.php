<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Biodata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_divisi');
        $this->load->model('m_cuti', 'cuti');

        checkauth($this->session->userdata('level_user'), 'direktur');
    }


    public function index()
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $data = array(
            'title' => 'Biodata',
            'users' => $this->users->get_data($id_users),
            'isi' => 'users/biodata',

        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }


    public function edit_biodata($id_users = NULL)
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $data = array(
            'title' => 'edit Biodata',
            'users' => $this->users->get_data($id_users),
            'divisi' => $this->m_divisi->get_all_data(),
            'error_upload' => $this->upload->display_errors(),
            'isi' => 'users/edit_biodata',

        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function edit_biodata_aksi($id_users = NULL)
    {

        $config['upload_path'] = './assets/gambar/user';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = time();
        $config['max_size']  = '2000';
        $this->upload->initialize($config);
        $field_name = "img";
        if (!$this->upload->do_upload($field_name)) {
            $data = array(
                'id_users' => $id_users,
                'nama_users' => $this->input->post('nama_users'),
                'tmpt_lahir' => $this->input->post('tmpt_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat_ktp' => $this->input->post('alamat_ktp'),
                'alamat_domisili' => $this->input->post('alamat_domisili'),
                'no_hp' => $this->input->post('no_hp'),
                'no_hp_d' => $this->input->post('no_hp_d'),
                'email' => $this->input->post('email'),
                'id_divisi' => $this->input->post('id_divisi'),
                'job' => $this->input->post('job'),
                'level' => $this->input->post('level'),
                'gaji' => $this->input->post('gaji'),
            );
            $this->users->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('karyawan/biodata');


            $this->load->view('layout/wrapper', $data, FALSE);
        } else {

            $gambar = $this->users->get_data($id_users);
            if ($gambar->gambar != "") {
                unlink('./assets/gambar/user/' . $gambar->img);
            }

            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gb2';
            $config['source_image'] = './assets/gambar/user' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_users' => $id_users,
                'nama_users' => $this->input->post('nama_users'),
                'tmpt_lahir' => $this->input->post('tmpt_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat_ktp' => $this->input->post('alamat_ktp'),
                'alamat_domisili' => $this->input->post('alamat_domisili'),
                'no_hp' => $this->input->post('no_hp'),
                'no_hp_d' => $this->input->post('no_hp_d'),
                'email' => $this->input->post('email'),
                'id_divisi' => $this->input->post('id_divisi'),
                'job' => $this->input->post('job'),
                'level' => $this->input->post('level'),
                'gaji' => $this->input->post('gaji'),
                'img' => $upload_data['uploads']['file_name'],
            );
            $this->users->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
            redirect('karyawan/biodata');
        }
    }
}

/* End of file Biodata.php */
