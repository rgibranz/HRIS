<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
    }

    public function index()
    {
        $get_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $get_id['id_karyawan'];
        $data = array(
            'title' => 'Absen_webcam',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'isi' => 'user/absen_webcam'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }

    public function dami()
    {
        $id_karyawan = $this->input->post('id_karyawan', true);
        $nama_karyawan = $this->input->post('nama_karyawan', true);
        $image = $this->input->post('image');
        $image = str_replace('data:image/jpeg;base64,', '', $image);
        $image = base64_decode($image);
        $filename = 'image_' . time() . '.png';
        file_put_contents(FCPATH . '/assets/gambar/absen/' . $filename, $image);

        $data = array(
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'image' => $filename,
        );

        var_dump($image);
    }
}

/* End of file Absen.php */
