<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{

    public function index()
    {

        $level = $this->session->userdata('level_user');

        if ($level != 'user') {
            if ($level == 'Direktur') {
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
            if ($level == 'Manajer') {
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
            }
        } else {
        }
    }
}

/* End of file Absen.php */
