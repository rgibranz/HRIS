<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data['title'] = 'Login';
        $this->load->view('login_user', $data);
    }

    public function auth()
    {
        // mengambil data hasil inputan user
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        // mengecek apakah akun user ada?
        $user =  $this->db->get_where('users', ['email' => $email])->num_rows();

        if ($user > 0) {
            $data_user = $this->db->get_where('users', ['email' => $email])->row();

            // mengecek apakah password benar
            if (password_verify($password, $data_user->password)) {

                // set data user yang akan di masukan ke session
                $data['id_users']   = $data_user->id_users;
                $data['id_divisi']  = $data_user->id_divisi;
                $data['email']      = $data_user->email;
                $data['level_user'] = $data_user->level;
                $data['nama_users'] = $data_user->nama_users;
                $data['data_user']  = $data_user;

                $this->session->set_userdata($data);

                if (
                    $data_user->level == 'HR'
                ) {
                    redirect('hr/dashboard');
                }
                if ($data_user->level == 'Direktur') {
                    redirect('direktur/dashboard');
                }
                if ($data_user->level == 'Manajer') {
                    redirect('manajer/dashboard');
                } else {
                    redirect('karyawan/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Password salah');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Akun Tidak Terdaftar');
            redirect('login', 'refresh');
        }
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
}

/* End of file Auth.php */
