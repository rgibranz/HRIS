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

        $level = $this->session->userdata('level_user');

        if ($level != 'user') {
            if ($level == 'direktur') {
                $get_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
                $id_karyawan = $get_id['id_karyawan'];
                $data = array(

                    'title' => 'History Absen',
                    'karyawan' => $this->karyawan->get_data($id_karyawan),
                    'absen' => $this->absen->get_data($id_karyawan),
                    'absen_end' => $this->absen->get_data_absen($id_karyawan),
                    'isi' => 'direktur/absen'
                );
                $this->load->view('layout/wrapper_direktur', $data, FALSE);
            }
            if ($level == 'manajer') {
                $get_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
                $id_karyawan = $get_id['id_karyawan'];
                $data = array(
                    'title' => 'History Absen',
                    'karyawan' => $this->karyawan->get_data($id_karyawan),
                    'absen' => $this->absen->get_data($id_karyawan),
                    'absen_end' => $this->absen->get_data_absen($id_karyawan),
                    'isi' => 'manajer/absen'
                );
                $this->load->view('layout/wrapper_manajer', $data, FALSE);
            }
            if ($level == 'admin') {
                $get_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
                $id_karyawan = $get_id['id_karyawan'];
                $data = array(
                    'title' => 'History Absen',
                    'karyawan' => $this->karyawan->get_data($id_karyawan),
                    'all_absen' => $this->absen->get_all_data($id_karyawan),
                    'all_karyawan' => $this->karyawan->get_all_data(),
                    'bulan' => $this->absen->get_bulan(),
                    'absen_end' => $this->absen->get_data_absen($id_karyawan),
                    'isi' => 'admin/absen'
                );
                $this->load->view('layout/wrapper', $data, FALSE);
            }
        } else {
            $get_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
            $id_karyawan = $get_id['id_karyawan'];

            $data = array(
                'title' => 'History Absen',
                'karyawan' => $this->karyawan->get_data($id_karyawan),
                'absen' => $this->absen->get_data($id_karyawan),
                'absen_end' => $this->absen->get_data_absen($id_karyawan),
                'isi' => 'user/absen'
            );
            $this->load->view('layout/wrapper_user', $data, FALSE);
        }
    }

    public function masuk()
    {
        $get_id = $this->db->get_where('karyawan', ['id_karyawan' => $this->session->userdata('id_karyawan')])->row_array();
        $id_karyawan = $get_id['id_karyawan'];
        $data = array(
            'title' => 'Absen Masuk',
            'absen' => $this->absen->get_data_absen($id_karyawan),
            'karyawan' => $this->karyawan->get_data($id_karyawan),
            'isi' => 'user/absen_masuk'
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
        $waktu = date('h:i:s');
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
            'id_karyawan' => $id_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'tgl' => $tgl,
            'waktu_datang' => $waktu,
        );
        $this->absen->add($data);
        redirect('absen');
    }

    public function pulang($id_absen)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('h:i:s');
        $data = array(
            'id_absen' => $id_absen,
            'waktu_pulang' => $waktu,
        );
        $this->absen->update($data);
        redirect('absen');
    }

    public function list_absen()
    {

        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $nama = $this->input->post('nama');
        $data = array(
            'title' => 'List Absen Karyawan',
            'karyawan' => $this->karyawan->get_data($this->session->userdata('id_karyawan')),
            'list_absen' => $this->absen->list_absen_admin($nama, $tahun, $bulan),
            'isi' => 'admin/list_absen'
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}

/* End of file Absen.php */
