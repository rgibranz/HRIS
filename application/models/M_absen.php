<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_absen extends CI_Model
{

    public function add($data)
    {
        $this->db->insert('absen', $data);
    }

    // mengambil semua data per user
    public function get_data($id_karyawan)
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->where('absen.id_karyawan', $id_karyawan);
        $this->db->order_by('id_absen', 'desc');

        return $this->db->get()->result();
    }

    //mengambil data terakhir yang masuk per user
    public function get_data_absen($id_karyawan)
    {
        $query = $this->db->query("SELECT * FROM `absen` WHERE id_karyawan = $id_karyawan ORDER BY id_absen DESC LIMIT 1");

        return $query->row();
    }

    public function update($data)
    {
        $this->db->where('id_absen', $data['id_absen']);
        $this->db->update('absen', $data);
    }
}

/* End of file M_absen.php */
