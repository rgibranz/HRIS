<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_divisi extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('divisi');
        $this->db->order_by('id_divisi', 'desc');
        return $this->db->get()->result();
    }

    public function get_data_divisi($id_divisi)
    {
        $this->db->select('*');
        $this->db->from('divisi');
        $this->db->where('id_divisi', $id_divisi);
        return $this->db->get()->row();
    }
    public function add($data)
    {
        $this->db->insert('divisi', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_divisi', $data['id_divisi']);
        $this->db->delete('divisi', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_divisi', $data['id_divisi']);
        $this->db->update('divisi', $data);
    }
}

/* End of file m_model.php */
