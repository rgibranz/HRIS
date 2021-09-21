<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan');
        $this->load->model('m_devisi');
        
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Karyawan',
            'karyawan' => $this->m_karyawan->get_all_data(),
            'isi' =>'admin/karyawan'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

}

/* End of file karyawan.php */

?>