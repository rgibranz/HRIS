<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{

    public function index()
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $s_id['id_karyawan'];
        $data = array(
            'title' => 'list Cuti',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'list_cuti' => $this->karyawan->get_all_data_cuti(),
            'isi' => 'manajer/list_cuti'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Cuti.php */
