<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
        $this->load->model('m_cuti', 'cuti');
        $this->load->library('form_validation');
        
        
        
    }
    
    public function ajukan_cuti()
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')]) -> row_array();
        $id_karyawan = $s_id['id_karyawan'];
        $data = array(
            'title' => 'Ajukan Cuti',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'isi' => 'user/form_cuti'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
        
    }

    public function cuti_add()
    {
        $this->form_validation->set_rules('mulai_bekerja', 'mulai_bekerja', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('jenis_cuti', 'jenis_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('lama_cuti', 'lama_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim', array('required' => 'Harus Di isi !!!'));
        $this->form_validation->set_rules('sisa_cuti', 'sisa_cuti', 'required|trim', array('required' => 'Harus Di isi !!!'));
        

        if ($this->form_validation->run() == false) 
        {
            $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')]) -> row_array();
            $id_karyawan = $s_id['id_karyawan'];
            $data = array(
                'title' => 'Form Cuti',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'isi' => 'user/form_cuti'
            );
            $this->load->view('layout/wrapper_user', $data, FALSE);
            
        
        } else {
            $row_tgl = $this->input->post("tanggal");
            $tgl = date_format(new DateTime($row_tgl),"Y-m-d");
            
            $data = array(
                'id_karyawan' => $this->input->post('id_karyawan'),
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                'mulai_bekerja' => $this->input->post('mulai_bekerja'),
                'jenis_cuti' => $this->input->post('jenis_cuti'),
                'lama_cuti' => $this->input->post('lama_cuti'),
                'tanggal' => $tgl,
                'sisa_cuti' => $this->input->post('sisa_cuti'),
                'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
                'status' => 'diajukan'
            );
    
                $this->cuti->add($data);
                $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
                redirect('dasboard_user');

        }
        

    }

    public function list_cuti()
    {
        $s_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')]) -> row_array();
        $id_karyawan = $s_id['id_karyawan'];
        $data = array(
            'title' => 'Ajukan Cuti',
            'list_cuti' => $this->karyawan->get_data_cuti($id_karyawan),
            'isi' => 'user/list_cuti'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
        
    }

    public function list_cuti_admin()
    {

        $data = array(
            'title' => 'Ajukan Cuti',
            'list_cuti' => $this->karyawan->get_all_data_cuti(),
            'isi' => 'admin/list_cuti'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

    public function view_cuti($id_cuti = NULL)
    {
        $data = array(
            'title' => ' view Karyawan',
            'list_cuti' => $this->karyawan->get_data_cuti_s($id_cuti),
            'isi' => 'admin/cuti',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

    public function view_cuti_user($id_cuti = NULL)
    {
        $data = array(
            'title' => ' view Karyawan',
            'list_cuti' => $this->karyawan->get_data_cuti_s($id_cuti),
            'isi' => 'user/cuti',
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
        
    }

    
    public function cuti_edit()
    {
        $data = array(
            'id_cuti' => $this->input->post('id_cuti'),
            'id_karyawan' => $this->input->post('id_karyawan'),
            'nama_karyawan' => $this->input->post('nama_karyawan'),
            'mulai_bekerja' => $this->input->post('mulai_bekerja'),
            'jenis_cuti' => $this->input->post('jenis_cuti'),
            'lama_cuti' => $this->input->post('lama_cuti'),
            'tanggal' => $this->input->post('tanggal'),
            'sisa_cuti' => $this->input->post('sisa_cuti'),
            'tgl_pengajuan' => $this->input->post('tgl_pengajuan'),
            'status' => $this->input->post('status')
        );
            $this->cuti->edit_cuti($data);
            $this->session->set_flashdata('pesan', 'Data Karyawan Berhasil Di buat');
            redirect('form/list_cuti_admin');
        
    }

    public function delete($id_cuti = null)
    {
     $data = array ('id_cuti' => $id_cuti);
     $this->cuti->delete($data);
     $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
     redirect('form/list_cuti');
    }

}

/* End of file Form.php */

?>