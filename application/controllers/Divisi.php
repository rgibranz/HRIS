<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_divisi');
        
    }
    
    public function index()
    {
        $data = array(
            'title' => 'divisi',
            'divisi' => $this->m_divisi->get_all_data(),
            'isi' => 'admin/divisi',);

        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

    public function add()
    {
        $data = array('
        nama_divisi' => $this->input->post('nama_divisi'),
        );
        
        $this->m_divisi->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambah !!! ');
        redirect('divisi');
    }

    public function edit( $id_divisi = null)
    {
        $data = array(
            'id_divisi' => $id_divisi,
            'nama_divisi' => $this->input->post('nama_divisi')
        );
        $this->m_divisi->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('divisi');
        
    }

    public function delete($id_divisi = null)
    {
     $data = array ('id_divisi' => $id_divisi);
     $this->m_divisi->delete($data);
     $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
     redirect('divisi');
    }

}

/* End of file divisi.php */

?>