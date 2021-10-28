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
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('login_user', $data, FALSE);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        $cek = $this->db->get_where('users', ['email' => $email])->row_array();


        if ($cek) {
            if (password_verify($password, $cek['password'])) {
                $level     = $cek['level'];
                $nama_user = $cek['nama_users'];

                $data['id_users']   = $cek['id_users'];
                $data['email']      = $cek['email'];
                $data['level_user'] = $level;
                $data['nama_users'] = $nama_user;

                $this->session->set_userdata($data);

                if ($level == 'HR') {
                    redirect('hr/dashboard');
                }
                if ($level == 'Direktur') {
                    redirect('direktur/dashboard');
                }
                if ($level == 'Manajer') {
                    redirect('manajer/dashboard');
                } else {
                    redirect('karyawan/dashboard');
                }
            } else {
                $this->session->set_flashdata('error', 'Email atau Password salah');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('login_error', 'Email atau password tidak terdaftar');
            redirect('auth/login');
        }
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
}

/* End of file Auth.php */
