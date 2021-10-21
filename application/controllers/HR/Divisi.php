<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_divisi');
        $this->load->model('m_users', 'users');
    }

    public function index()
    {
        $level = $this->session->userdata('level_user');
        if ($level == "HR") {

            $data = array(
                'title' => 'Divisi',
                'users' => $this->users->get_data($this->session->userdata('id_users')),
                'divisi' => $this->m_divisi->get_all_data(),
                'isi' => 'HR/Divisi',
            );

            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->user_login->logout();
        }
    }

    public function add()
    {
        $data = array(
            'nama_divisi' => $this->input->post('nama_divisi'),
        );

        $this->m_divisi->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambah !!! ');
        redirect('HR/Divisi');
    }

    public function edit($id_divisi = null)
    {
        $data = array(
            'id_divisi' => $id_divisi,
            'nama_divisi' => $this->input->post('nama_divisi')
        );
        $this->m_divisi->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('HR/Divisi');
    }

    public function delete($id_divisi = null)
    {
        $data = array('id_divisi' => $id_divisi);
        $this->m_divisi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('HR/Divisi');
    }

    // CRUD users di Divisi

    public function users($id_divisi)
    {
        $data = array(
            'title' => 'anggota devisi',
            'users' => $this->users->get_data($this->session->userdata('id_users')),
            'id_divisi' => $id_divisi,
            'divisi_users' => $this->users->get_data_d_users($id_divisi),
            'isi' => 'HR/divisi_users'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add_users($id_divisi = Null)
    {
        $this->form_validation->set_rules(
            'nama_users',
            'Nama Karang',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );

        $this->form_validation->set_rules(
            'tmpt_lahir',
            'Tempat Lahir',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );

        $this->form_validation->set_rules(
            'tgl_lahir',
            'Tanggal Lahir',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );

        $this->form_validation->set_rules(
            'alamat_ktp',
            'Alamat',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );

        $this->form_validation->set_rules(
            'no_hp',
            'Nomor Hp',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );

        $this->form_validation->set_rules(
            'email',
            'email',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );


        $this->form_validation->set_rules(
            'id_divisi',
            'id_divisi',
            'required',
            array('required' => '%s Harus di pilih !!!')
        );

        $this->form_validation->set_rules(
            'password',
            'password',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );

        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'title' => 'Tambah users',

                'users' => $this->users->get_data($this->session->userdata('id_users')),
                'role' => $this->users->get_all_role(),
                'divisi' => $this->m_divisi->get_data_divisi($id_divisi),
                'isi' => 'HR/add_users_divisi'
            );

            $this->load->view('layout/wrapper', $data, FALSE);
        } else {

            $config['upload_path'] = './assets/gambar/user';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']  = '2000';
            $this->upload->initialize($config);
            $field_name = "img";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Tambah users',
                    'users' => $this->users->get_all_data(),
                    'divisi' => $this->m_divisi->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'admin/add_users'
                );

                $this->load->view('layout/wrapper', $data, FALSE);
            } else {

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gb2';
                $config['source_image'] = './assets/gambar/user' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_users' => $this->input->post('nama_users'),
                    'mulai_bekerja' => $this->input->post('mulai_bekerja'),
                    'tmpt_lahir' => $this->input->post('tmpt_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'alamat_ktp' => $this->input->post('alamat_ktp'),
                    'alamat_domisili' => $this->input->post('alamat_domisili'),
                    'no_hp' => $this->input->post('no_hp'),
                    'no_hp_d' => $this->input->post('no_hp_d'),
                    'email' => $this->input->post('email'),
                    'id_divisi' => $this->input->post('id_divisi'),
                    'status_users' => $this->input->post('status_users'),
                    'job' => $this->input->post('job'),
                    'password' => $password,
                    'level' => $this->input->post('level'),
                    'gaji' => $this->input->post('gaji'),
                    'img' => $upload_data['uploads']['file_name'],
                    'sisa_cuti' => $this->input->post('sisa_cuti')
                );

                $this->users->add($data);
                $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
                redirect('HR/Divisi/users/' . $this->input->post('id_divisi'));
            }
        }
    }

    public function delete_users($id_users = NULL)
    {
        $data = array('id_users' => $id_users);
        $this->users->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('HR/divisi/');
    }
}

/* End of file divisi.php */
