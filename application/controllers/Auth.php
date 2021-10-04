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
        $cek   = $this->db->get_where('karyawan', ['email' => $email])->row_array();
        if ($cek) {
            if (password_verify($password, $cek['password'])) {
                $level = $cek['level'];
                $nama_user = $cek['nama_karyawan'];
                if ($level == 'admin') {
                    $data = [
                        'id_karyawan' => $cek['id_karyawan'],
                        'email' => $cek['email'],
                        'level_user' => $level,
                        'nama_karyawan' => $nama_user,
                    ];
                    $this->session->set_userdata($data);
                    redirect('dasboard');
                } else {
                    $data = [
                        'id_karyawan' => $cek['id_karyawan'],
                        'email' => $cek['email'],
                        'level_user' => $level,
                        'nama_karyawan' => $nama_user,
                    ];
                    $this->session->set_userdata($data);
                    redirect('dasboard_user');
                }
            } else {
                $this->session->set_flashdata('error', 'Email atau Password salah');
                redirect('auth');
            }
        }
    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
}

/* End of file Auth.php */
