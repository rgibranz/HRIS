<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi', 'left');
        $this->db->order_by('id_karyawan', 'desc');
        return $this->db->get()->result();
    }

    public function get_data($id_karyawan)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi', 'left');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);

        return $this->db->get()->row();
    }


    public function add($data)
    {
        $this->db->insert('karyawan', $data);

    }

    public function edit($data)
    {
        $this->db->where('id_karyawan', $data['id_karyawan']);
        $this->db->update('karyawan', $data);

    }

    public function delete($data)
    {
        $this->db->where('id_karyawan', $data['id_karyawan']);
        $this->db->delete('karyawan', $data);
    }

}

/* End of file .php */

?>