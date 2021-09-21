<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class devisi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_devisi');
        
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Devisi',
            'devisi' => $this->m_devisi->get_all_data(),
            'isi' => 'admin/devisi',);

        $this->load->view('layout/wrapper', $data, FALSE);
        
    }

    public function add()
    {
        $data = array('
        nama_devisi' => $this->input->post('nama_devisi'),
        );
        
        $this->m_devisi->add($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambah !!! ');
        redirect('devisi');
    }

    public function edit( $id_devisi = null)
    {
        $data = array(
            'id_devisi' => $id_devisi,
            'nama_devisi' => $this->input->post('nama_devisi')
        );
        $this->m_devisi->edit($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil di Ubah');
        redirect('devisi');
        
    }

    public function delete($id_devisi = null)
    {
     $data = array ('id_devisi' => $id_devisi);
     $this->m_devisi->delete($data);
     $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!! ');
     redirect('devisi');
    }

}

/* End of file devisi.php */

?>