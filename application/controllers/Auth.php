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


        $this->form_validation->set_rules('email', 'email', 'required',  array(
            'required' => '%s Harus Diisi !!!'
        ));

        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s Harus Diisi !!!'
        ));


        if ($this->form_validation->run() == false) {
            $data = array(
                'title' => 'login User',
            );

            $this->load->view('login_user', $data, FALSE);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email  = $this->input->post('email');
        $password  = $this->input->post('password');
        $cek   = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($cek) {
            if (password_verify($password, $cek['password'])) {
                $level = $cek['level'];
                $nama_user = $cek['nama_users'];
                if ($level == 'HR') {
                    $data = [
                        'id_users' => $cek['id_users'],
                        'email' => $cek['email'],
                        'level_user' => $level,
                        'nama_users' => $nama_user,
                    ];
                    $this->session->set_userdata($data);
                    redirect('hr/dashboard');
                }
                if ($level == 'Direktur') {
                    $data = [
                        'id_users' => $cek['id_users'],
                        'email' => $cek['email'],
                        'level_user' => $level,
                        'nama_users' => $nama_user,
                    ];
                    $this->session->set_userdata($data);
                    redirect('direktur/dashboard');
                }
                if ($level == 'Manajer') {
                    $data = [
                        'id_users' => $cek['id_users'],
                        'email' => $cek['email'],
                        'level_user' => $level,
                        'nama_users' => $nama_user,
                    ];
                    $this->session->set_userdata($data);
                    redirect('manajer/dashboard');
                } else {
                    $data = [
                        'id_users' => $cek['id_users'],
                        'email' => $cek['email'],
                        'level_user' => $level,
                        'nama_users' => $nama_user,
                    ];
                    $this->session->set_userdata($data);
                    redirect('Karyawan/dashboard');
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
