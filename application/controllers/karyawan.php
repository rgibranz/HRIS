<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
        $this->load->model('m_divisi');
    }

    public function index()
    {
        $data = array(
            'title' => 'Karyawan',
            'karyawan' => $this->karyawan->get_all_data(),
            'isi' => 'admin/karyawan'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }


    public function divisi_karyawan($id_divisi = NULL)
    {
        $data = array(
            'title' => 'anggota devisi',
            'karyawan' => $this->karyawan->get_data_d_karyawan($id_divisi),
            'isi' => 'admin/divisi_karyawan'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add()
    {

        $this->form_validation->set_rules(
            'nama_karyawan',
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
                'title' => 'Tambah Karyawan',
                'karyawan' => $this->karyawan->get_all_data(),
                'divisi' => $this->m_divisi->get_all_data(),
                'isi' => 'admin/add_karyawan'
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
                    'title' => 'Tambah Karyawan',
                    'karyawan' => $this->karyawan->get_all_data(),
                    'divisi' => $this->m_divisi->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'admin/add_karyawan'
                );

                $this->load->view('layout/wrapper', $data, FALSE);
            } else {

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gb2';
                $config['source_image'] = './assets/gambar/user' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_karyawan' => $this->input->post('nama_karyawan'),
                    'tmpt_lahir' => $this->input->post('tmpt_lahir'),
                    'tgl_lahir' => $this->input->post('tgl_lahir'),
                    'alamat_ktp' => $this->input->post('alamat_ktp'),
                    'alamat_domisili' => $this->input->post('alamat_domisili'),
                    'no_hp' => $this->input->post('no_hp'),
                    'no_hp_d' => $this->input->post('no_hp_d'),
                    'email' => $this->input->post('email'),
                    'id_divisi' => $this->input->post('id_divisi'),
                    'job' => $this->input->post('job'),
                    'password' => $password,
                    'level' => $this->input->post('level'),
                    'gaji' => $this->input->post('gaji'),
                    'img' => $upload_data['uploads']['file_name']
                );

                $this->karyawan->add($data);
                $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
                redirect('karyawan');
            }
        }
    }

    public function detail_biodata()
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $s_id['id_karyawan'];

        $data = array(
            'title' => 'Biodata',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'divisi' => $this->m_divisi->get_all_data(),
            'error_upload' => $this->upload->display_errors(),
            'isi' => 'user/biodata',

        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }

    public function edit_biodata($id_karyawan = NULL)
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $s_id['id_karyawan'];
        $data = array(
            'title' => 'edit Biodata',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'divisi' => $this->m_divisi->get_all_data(),
            'error_upload' => $this->upload->display_errors(),
            'isi' => 'user/edit_biodata',

        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }

    public function edit_biodata_aksi($id_karyawan = NULL)
    {

        $this->form_validation->set_rules(
            'img',
            'img',
            'trim',
        );


        if ($this->form_validation->run() == FALSE) {


            $data = array(
                'title' => 'Edit Biodata',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'divisi' => $this->m_divisi->get_all_data(),
                'isi' => 'user/edit_biodata',

            );
            $this->load->view('layout/wrapper_user', $data, FALSE);
        } else {

            $config['upload_path'] = './assets/gambar/user';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['file_name'] = time();
            $config['max_size']  = '2000';
            $this->upload->initialize($config);
            $field_name = "img";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Biodata',
                    'karyawan' => $this->karyawan->get_data($id_karyawan),
                    'divisi' => $this->m_divisi->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'user/edit_biodata'
                );

                $this->load->view('layout/wrapper_user', $data, FALSE);
            } else {

                $gambar = $this->karyawan->get_data($id_karyawan);
                if ($gambar->gambar != "") {
                    unlink('./assets/gambar/user/' . $gambar->img);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gb2';
                $config['source_image'] = './assets/gambar/user' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'id_karyawan' => $id_karyawan,
                    'nama_karyawan' => $this->input->post('nama_karyawan'),
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
                $this->karyawan->edit_biodata($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
                redirect('karyawan/detail_biodata');
            }
        }
    }


    public function edit($id_karyawan = NULL)
    {
        $data = array(
            'title' => 'edit Karyawan',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'divisi' => $this->m_divisi->get_all_data(),
            'error_upload' => $this->upload->display_errors(),
            'isi' => 'admin/edit_karyawan',

        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function edit_aksi($id_karyawan = NULL)
    {
        $this->form_validation->set_rules(
            'nama_karyawan',
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
            'img',
            'img',
            'trim',
        );


        if ($this->form_validation->run() == FALSE) {


            $data = array(
                'title' => 'edit Karyawan',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'divisi' => $this->m_divisi->get_all_data(),
                'isi' => 'admin/edit_karyawan',

            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {

            $config['upload_path'] = './assets/gambar/user';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['file_name'] = time();
            $config['max_size']  = '2000';
            $this->upload->initialize($config);
            $field_name = "img";
            if (!$this->upload->do_upload($field_name)) {
                $data = array(
                    'title' => 'Edit Karyawan',
                    'karyawan' => $this->karyawan->get_data($id_karyawan),
                    'divisi' => $this->m_divisi->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'admin/edit_karyawan'
                );

                $this->load->view('layout/wrapper', $data, FALSE);
            } else {

                $gambar = $this->karyawan->get_data($id_karyawan);
                if ($gambar->gambar != "") {
                    unlink('./assets/gambar/user/' . $gambar->img);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gb2';
                $config['source_image'] = './assets/gambar/user' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                if ($this->input->post('password') == '') {
                    $data = array(
                        'id_karyawan' => $id_karyawan,
                        'nama_karyawan' => $this->input->post('nama_karyawan'),
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
                    $this->karyawan->edit($data);
                    $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
                    redirect('karyawan');
                } else {
                    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $data = array(
                        'id_karyawan' => $id_karyawan,
                        'nama_karyawan' => $this->input->post('nama_karyawan'),
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
                        'password' => $password,
                        'img' => $upload_data['uploads']['file_name'],
                    );
                    $this->karyawan->edit()($data);
                    $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
                    redirect('karyawan');
                }
            }
        }
        //end
    }

    public function delete($id_karyawan = NULL)
    {
        $data = array('id_karyawan' => $id_karyawan);
        $this->karyawan->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('karyawan');
    }
}
