<?php

defined('BASEPATH') or exit('No direct script access allowed');




class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        checkauth($this->session->userdata('level_user'), 'Direktur');
    }

    public function index()
    {
        $s_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $s_id['id_users'];
        $level = $this->session->userdata('level_user');
        if ($level == 'Direktur') {
            $data = array(
                'title' => 'Dashboard',
                'users' => $this->users->get_data($id_users),
                'isi' => 'direktur/dashboard'
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $this->user_login->logout();
        }
    }
}

/* End of file Dashboard.php */
