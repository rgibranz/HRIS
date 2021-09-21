<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class devisi_karyawan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_devisi');
        $this->load->model('m_karyawan');
        
        
    }
    

    public function index()
    {
        $data = array(
            'title' =>'List Karyawan',
            'karyawan' => $this->m_devisi->get_all_data(),
            'isi' => 'admin/devisi_karyawan'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

}

/* End of file devisi_karyawan.php */

?>