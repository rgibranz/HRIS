<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_users', 'users');
        $this->load->model('m_absen', 'absen');
        $this->load->model('m_cuti', 'cuti');

        checkauth($this->session->userdata('level_user'), 'direktur');
    }


    public function index()
    {
        $get_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $get_id['id_users'];

        $data = array(
            'title' => 'History Absen',
            'users' => $this->users->get_data($id_users),
            'absen' => $this->absen->get_data($id_users),
            'absen_end' => $this->absen->get_data_absen($id_users),
            'isi' => 'users/absen'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    public function masuk()
    {
        $get_id = $this->db->get_where('users', ['id_users' => $this->session->userdata('id_users')])->row_array();
        $id_users = $get_id['id_users'];
        $data = array(
            'title' => 'Absen Masuk',
            'absen' => $this->absen->get_data_absen($id_users),
            'users' => $this->users->get_data($id_users),
            'isi' => 'users/absen_masuk'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }


    public function add()
    {
        date_default_timezone_set('Asia/Jakarta');

        $id_users = $this->session->userdata('id_users');
        $nama_users = $this->session->userdata('nama_users');
        $status = $this->input->post('status');
        $tgl = date('y-m-d');
        $waktu = date('H:i:s');
        $date = array(
            'tgl' => $tgl,
            'waktu' => $waktu,
        );
        $this->session->set_userdata($date);

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
            'id_users' => $id_users,
            'nama_users' => $nama_users,
            'tgl' => $tgl,
            'waktu_datang' => $waktu,
            'img_absen' => $fileName,
        );
        $this->absen->add($data);
        redirect('karyawan/absen');
    }

    public function pulang($id_absen)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('H:i:s');
        $data = array(
            'id_absen' => $id_absen,
            'waktu_pulang' => $waktu,
        );
        $this->absen->update($data);
        redirect('karyawan/absen');
    }
}

/* End of file Absen.php */
