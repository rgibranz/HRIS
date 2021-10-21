<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_absen extends CI_Model
{

    public function add($data)
    {
        $this->db->insert('absen', $data);
    }

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('absen');

        return $this->db->get()->result();
    }

    // mengambil semua data per user
    public function get_data($id_users)
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->where('absen.id_users', $id_users);
        $this->db->order_by('id_absen', 'desc');

        return $this->db->get()->result();
    }

    //mengambil data terakhir yang masuk per user
    public function get_data_absen($id_users)
    {
        $query = $this->db->query("SELECT * FROM `absen` WHERE id_users = $id_users ORDER BY id_absen DESC LIMIT 1");

        return $query->row();
    }

    public function update($data)
    {
        $this->db->where('id_absen', $data['id_absen']);
        $this->db->update('absen', $data);
    }

    public function list_absen_admin($nama, $tahun, $bulan)
    {
        $query = $this->db->query("SELECT * FROM absen WHERE id_users = $nama AND YEAR(tgl) = $tahun AND MONTH(tgl) = $bulan");
        return $query->result();
    }

    /* End of file M_absen.php */
}
