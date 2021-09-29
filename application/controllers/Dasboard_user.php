<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard_user extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
        
    }
    
	
     
    
     
    public function index()
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')]) -> row_array();
        $id_karyawan = $s_id['id_karyawan'];
        $data = array(
            'title' => 'Dasboard',
            'karyawan'=> $this->karyawan->get_data($id_karyawan),
            'isi' => 'user/dasboard');

            $this->load->view('layout/wrapper_user', $data, FALSE);
            
    }

}

/* End of file Controllername.php */

?>