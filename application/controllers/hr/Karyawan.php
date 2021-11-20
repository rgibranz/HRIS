<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_divisi', 'divisi');

        checkauth($this->session->userdata('level_user'), 'HR');
    }

    public function index()
    {
        $level = $this->session->userdata('level_user');
        if ($level == 'HR') {
            $data = array(
                'title' => 'Karyawan',
                'all_users' => $this->users->get_all_data(),
                'users' => $this->users->get_data($this->session->userdata('id_users')),
                // 'role' => $this->users->get_all_role(),
                'isi' => 'hr/karyawan'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->user_login->logout();
        }
    }

    public function add()
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
            $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
            $id_users = $s_id['id_users'];
            $data = array(
                'title' => 'Tambah users',
                'users' => $this->users->get_data($id_users),
                'divisi' => $this->divisi->get_all_data(),
                'isi' => 'hr/add_users'
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
                    'divisi' => $this->divisi->get_all_data(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi' => 'hr/add_users'
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
                    'img' => $upload_data['uploads']['file_name'],
                    'sisa_cuti' => $this->input->post('sisa_cuti')
                );

                $this->users->add($data);
                $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
                redirect('hr/karyawan');
            }
        }
    }


    public function edit($id_users = NULL)
    {
        $this->form_validation->set_rules(
            'nama_users',
            'Nama users',
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
                'title' => 'edit users',
                'users' => $this->users->get_data($id_users),
                'divisi' => $this->divisi->get_all_data(),
                'isi' => 'hr/edit_users',

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
                if ($this->input->post('password') == '') {
                    $data = array(
                        'id_users' => $id_users,
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
                        'level' => $this->input->post('level'),
                    );
                    $this->users->edit($data);
                    $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
                    redirect('hr/karyawan');
                } else {
                    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $data = array(
                        'id_users' => $id_users,
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
                        'level' => $this->input->post('level'),
                        'password' => $password,
                    );
                    $this->users->edit($data);
                    $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
                    redirect('hr/karyawan');
                }
            } else {

                $gambar = $this->users->get_data($id_users);
                if ($gambar->img != "") {
                    unlink('./assets/gambar/user/' . $gambar->img);
                }

                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gb2';
                $config['source_image'] = './assets/gambar/user' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                if ($this->input->post('password') == '') {
                    $data = array(
                        'id_users' => $id_users,
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
                        'level' => $this->input->post('level'),
                        'img' => $upload_data['uploads']['file_name'],
                    );
                    $this->users->edit($data);
                    $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
                    redirect('hr/karyawan');
                } else {
                    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $data = array(
                        'id_users' => $id_users,
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
                        'level' => $this->input->post('level'),
                        'password' => $password,
                        'img' => $upload_data['uploads']['file_name'],
                    );
                    $this->users->edit($data);
                    $this->session->set_flashdata('pesan', 'Data users Berhasil Di buat');
                    redirect('hr/karyawan');
                }
            }
        }
        //end
    }

    public function delete($id_users = NULL)
    {
        $data = array('id_users' => $id_users);
        $this->users->delete($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
        redirect('hr/karyawan');
    }

    ////////// Tambah Kurang Cuti Karyawan //////////////////////////
    public function tambah_cuti_all()
    {
        $this->users->tambah_cuti_all($this->input->post('tambah_cuti'));
        redirect('hr/karyawan');
    }

    public function kurangi_cuti_all()
    {
        $kurangi_cuti = intval($this->input->post('kurangi_cuti'));
        $users = $this->users->get_all_data();

        foreach ($users as $key) {
            $sisa_cuti = intval($key->sisa_cuti);

            if ($sisa_cuti <= $kurangi_cuti) {
                // jika cuti kurang
                $data = array(
                    'id_users' => $key->id_users,
                    'kurangi_cuti' => $sisa_cuti,
                );
                $this->users->kurangi_cuti($data);
            } else {
                // jika cuti bisa di kurang
                $data = array(
                    'id_users' => $key->id_users,
                    'kurangi_cuti' => $kurangi_cuti,
                );
                $this->users->kurangi_cuti($data);
            }
        }
        redirect('hr/karyawan');
        // $this->karyawan->kurangi_cuti_all($this->input->post('kurangi_cuti'));

    }

    public function kurangi_cuti()
    {
        $id_users = intval($this->input->post('id_users'));
        $kurangi_cuti = intval($this->input->post('kurangi_cuti'));
        $users = $this->users->get_data($id_users);
        $sisa_cuti = $users->sisa_cuti;
        if ($sisa_cuti <= $kurangi_cuti) {
            $data = array(
                'id_users' => $id_users,
                'kurangi_cuti' => $sisa_cuti,
            );
            $this->users->kurangi_cuti($data);
            redirect('hr/karyawan');
        } else {
            $data = array(
                'id_users' => $id_users,
                'kurangi_cuti' => $kurangi_cuti,
            );
            $this->users->kurangi_cuti($data);
            redirect('hr/karyawan');
        }
    }

    public function tambah_cuti()
    {
        $id_users = intval($this->input->post('id_users'));
        $tambah_cuti = intval($this->input->post('tambah_cuti'));
        $data = array(
            'id_users' => $id_users,
            'tambah_cuti' => $tambah_cuti
        );

        $this->users->tambah_cuti($data);
        redirect('hr/karyawan');
    }


    public function reset()
    {
        $users = $this->users->get_all_data();
        foreach ($users as $key) {
            $sisa_cuti = intval($key->sisa_cuti);

            $data = array(
                'id_users' => $key->id_users,
                'sisa_cuti' => $sisa_cuti,
            );

            $this->users->reset($data);
        }
        redirect('hr/karyawan');
    }
}

/* End of file Pekerja.php */
