<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_karyawan', 'karyawan');
        $this->load->model('m_absen', 'absen');
    }

    public function index()
    {
        $get_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $get_id['id_karyawan'];
        $data = array(
            'title' => 'History Absen',
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'absen' => $this->absen->get_data($id_karyawan),
            'isi' => 'user/absen'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }

    public function masuk()
    {
        $data = array(
            'title' => 'Absen Masuk',
            'isi' => 'user/absen_masuk'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }

    public function pulang()
    {
        $data = array(
            'title' => 'Absen Pulang',
            'isi' => 'user/absen_pulang'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
    }
    public function add()
    {
        date_default_timezone_set('Asia/Jakarta');

        $id_karyawan = $this->session->userdata('id_karyawan');
        $nama_karyawan = $this->session->userdata('nama_karyawan');
        $status = $this->input->post('status');
        $tgl = date('y-m-d');
        $waktu = date('h:i:sa');
        $img = $_POST['image'];
        $folderPath =  "assets/gambar/absen/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = 'img_' . uniqid() . '.png';

        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        // print_r($fileName);
        $data = array(
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'tgl' => $tgl,
            'waktu' => $waktu,
            'status' => $status
        );
        $this->absen->add($data);
        redirect('absen');
    }
}

/* End of file Absen.php */
