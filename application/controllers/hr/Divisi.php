<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_divisi');
        $this->load->model('m_users', 'users');

        checkauth($this->session->userdata('level_user'), 'HR');
    }

    public function index()
    {
        $level = $this->session->userdata('level_user');
        if ($level == "HR") {

            $data = array(
                'title' => 'Divisi',
                'users' => $this->users->get_data($this->session->userdata('id_users')),
                'divisi' => $this->m_divisi->get_all_data(),
                'isi' => 'hr/divisi',
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
        redirect('hr/divisi');
    }

    public function edit($id_divisi = null)
    {
        $data = array(
            'id_divisi' => $id_divisi,
            'nama_divisi' => $this->input->post('nama_divisi')
        );
        $this->m_divisi->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('hr/divisi');
    }

    public function delete($id_divisi = null)
    {
        $data = array('id_divisi' => $id_divisi);
        $this->m_divisi->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('hr/divisi');
    }

    // CRUD users di Divisi

    public function users($id_divisi)
    {
        $data = array(
            'title' => 'anggota divisi',
            'users' => $this->users->get_data($this->session->userdata('id_users')),
            'id_divisi' => $id_divisi,
            'divisi' => $this->m_divisi->get_data_divisi($id_divisi),
            'divisi_users' => $this->users->get_data_d_users($id_divisi),
            'isi' => 'hr/divisi_users'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function add_users($id_divisi)
    {
        $this->form_validation->set_rules(
            'email',
            'email',
            'required',
            array('required' => '%s Harus Diisi !!!')
        );
        $this->form_validation->set_rules(
            'level',
            'role user',
            'required',
            array('required' => '%s Harus Dipilih')
        );
        $this->form_validation->set_rules('email', 'email', 'is_unique[users.email]', array('is_unique' => '%s Email sudah terdaftar, silahkan masukan email lain'));


        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        if ($this->form_validation->run() == FALSE) {

            $data['title']  = 'Tambah Users';
            $data['users']  = $this->users->get_data($this->session->userdata('id_users'));
            $data['divisi'] = $this->m_divisi->get_data_divisi($id_divisi);
            $data['isi']    = 'hr/add_users_divisi';

            $this->load->view('layout/wrapper', $data, FALSE);
        } else {

            $config['upload_path'] = './assets/gambar/user';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']  = '2000';
            $this->upload->initialize($config);
            $field_name = "img";
            if (!$this->upload->do_upload($field_name)) {
                $data['nama_users']      = $this->input->post('nama_users');
                $data['mulai_bekerja']   = $this->input->post('mulai_bekerja');
                $data['tmpt_lahir']      = $this->input->post('tmpt_lahir');
                $data['tgl_lahir']       = $this->input->post('tgl_lahir');
                $data['alamat_ktp']      = $this->input->post('alamat_ktp');
                $data['alamat_domisili'] = $this->input->post('alamat_domisili');
                $data['no_hp']           = $this->input->post('no_hp');
                $data['no_hp_d']         = $this->input->post('no_hp_d');
                $data['email']           = $this->input->post('email');
                $data['id_divisi']       = $id_divisi;
                $data['status_users']    = $this->input->post('status_users');
                $data['job']             = $this->input->post('job');
                $data['password']        = $password;
                $data['level']           = $this->input->post('level');
                $data['gaji']            = $this->input->post('gaji');
                $data['img']             = "default-profile.png";
                $data['sisa_cuti']       = $this->input->post('sisa_cuti');

                $this->users->add($data);
                $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
                redirect('hr/divisi/users/' . $id_divisi);
            } else {

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gb2';
                $config['source_image'] = './assets/gambar/user' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);

                $data['nama_users']      = $this->input->post('nama_users');
                $data['mulai_bekerja']   = $this->input->post('mulai_bekerja');
                $data['tmpt_lahir']      = $this->input->post('tmpt_lahir');
                $data['tgl_lahir']       = $this->input->post('tgl_lahir');
                $data['alamat_ktp']      = $this->input->post('alamat_ktp');
                $data['alamat_domisili'] = $this->input->post('alamat_domisili');
                $data['no_hp']           = $this->input->post('no_hp');
                $data['no_hp_d']         = $this->input->post('no_hp_d');
                $data['email']           = $this->input->post('email');
                $data['id_divisi']       = $id_divisi;
                $data['status_users']    = $this->input->post('status_users');
                $data['job']             = $this->input->post('job');
                $data['password']        = $password;
                $data['level']           = $this->input->post('level');
                $data['gaji']            = $this->input->post('gaji');
                $data['img']             = $upload_data['uploads']['file_name'];
                $data['sisa_cuti']       = $this->input->post('sisa_cuti');

                $this->users->add($data);
                $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
                redirect('hr/divisi/users/' . $id_divisi);
            }
        }
    }

    public function delete_users($id_users = NULL)
    {
        $data = array('id_users' => $id_users);
        $this->users->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('hr/divisi/');
    }
}

/* End of file divisi.php */
