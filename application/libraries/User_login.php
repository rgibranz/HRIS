<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_login
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_auth');
    }

    


    public function proteksi_halaman()
    {
        if ($this->ci->session->userdata('email') == '') {
            $this->ci->session->unset_userdata('pesan');
            $this->ci->session->set_flashdata('error', 'Anda Belum Login');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->ci->session->unset_userdata('email');
        $this->ci->session->unset_userdata('nama_user');
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->unset_userdata('error');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
        redirect('auth/login');
    }
}

    /* End of file User_login.php */
