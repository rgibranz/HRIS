<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dasboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $level = $this->session->userdata('level_user');
        if ($level != 'user') {
            if ($level == 'manajer') {
                $data = array(
                    'title' => 'Dasboard',
                    'isi' => 'manajer/dasboard'
                );
                $this->load->view('layout/wrapper_manajer', $data, FALSE);
            }
            if ($level == 'direktur') {
                $data = array(
                    'title' => 'Dasboard',
                    'isi' => 'direktur/dasboard'
                );
                $this->load->view('layout/wrapper_direktur', $data, FALSE);
            }
            if ($level == 'admin') {
                $data = array(
                    'title' => 'Dasboard',
                    'isi' => 'admin/dasboard'
                );
                $this->load->view('layout/wrapper', $data, FALSE);
            }
        } else {
            redirect('Dasboard_user');
        }
    }
}

/* End of file Controllername.php */
