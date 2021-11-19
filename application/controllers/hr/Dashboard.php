<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');

        checkauth($this->session->userdata('level_user'), 'HR');
    }

    public function index()
    {
        $s_id     = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $level    = $this->session->userdata('level_user');
        if ($level == 'HR') {

            $data['title'] = 'Dasboard';
            $data['users'] = $this->users->get_data($id_users);
            $data['isi']   = 'hr/Dashboard';

            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            echo "error";
            die;
            $this->user_login->logout();
        }
    }
}

/* End of file Dashboard.php */
