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
        if ($level == "admin" || $level == "manajer" || $level == "direktur") {
            if ($level == "manajer") {
                $data = array(
                    'title' => 'Dasboard',
                    'isi' => 'manajer/dasboard'
                );
                $this->load->view('layout/wrapper_manajer', $data, FALSE);
    
            }if ($level == "direktur") {
                $data = array(
                    'title' => 'Dasboard',
                    'isi' => 'direktur/dasboard'
                );
                $this->load->view('layout/wrapper_direktur', $data, FALSE);
    
            }else{
                $data = array(
                    'title' => 'Dasboard',
                    'isi' => 'admin/dasboard'
                );
                $this->load->view('layout/wrapper', $data, FALSE);
    
            }
        }else{
            redirect('Dasboard_user');
        }

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
