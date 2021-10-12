<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_absen extends CI_Model
{

    public function add($data)
    {
        $this->db->insert('absen', $data);
    }

    public function get_data($id_karyawan)
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->where('absen.id_karyawan', $id_karyawan);
        $this->db->order_by('id_karyawan', 'desc');

        return $this->db->get()->result();
    }
}

/* End of file M_absen.php */
