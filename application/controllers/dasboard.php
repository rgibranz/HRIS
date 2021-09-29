<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Dasboard',
            'isi' => 'admin/dasboard'
        );

        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function index_user()
    {
        $data = array(
            'title' => 'Dasboard',
            'isi' => 'user/dasboard'
        );

        $this->load->view('layout/wrapper_user', $data, FALSE);
    }
}

/* End of file Controllername.php */
