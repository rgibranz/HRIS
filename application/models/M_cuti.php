<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_cuti extends CI_Model
{

    public function get_data($id_cuti)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->where('id_cuti', $id_cuti);

        return $this->db->get()->row();
    }

    public function get_all_data()
    {
        return $this->db->get('cuti');
    }
    public function view($id_cuti)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->where('id_cuti', $id_cuti);
        $this->db->order_by('id_cuti', 'desc');

        return $this->db->get()->row();
    }

    public function get_cuti_users($id_users)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id_users', $id_users);
        $this->db->order_by('id_users', 'desc');

        return $this->db->get()->row();
    }


    public function get_all_data_cuti()
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->order_by('id_cuti', 'desc');
        return $this->db->get()->result();
    }


    public function get_data_cuti($id_users)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->where('cuti.id_users', $id_users);
        $this->db->order_by('id_cuti', 'desc');


        return $this->db->get()->result();
    }

    public function get_data_cuti_s($id_cuti)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->join('users', 'users.id_users = cuti.id_users', 'left');
        $this->db->where('cuti.id_cuti', $id_cuti);
        $this->db->order_by('id_cuti', 'desc');


        return $this->db->get()->row();
    }

    public function get_cuti_limit1($id_users)
    {
        $query = $this->db->query("SELECT * FROM `cuti` WHERE id_users = $id_users ORDER BY id_cuti DESC LIMIT 1");

        return $query->row();
    }


    public function add($data)
    {
        $this->db->insert('cuti', $data);
    }
    /**
     * untuk mengurangi cuti di tabel users
     */
    public function edit($sisa_data)
    {
        $this->db->where('id_users', $sisa_data['id_users']);
        $this->db->update('users', $sisa_data);
    }
    /**
     * end untuk mengurangi cuti di tabel users
     */

    public function edit_cuti($data)
    {
        $this->db->where('id_cuti', $data['id_cuti']);
        $this->db->update('cuti', $data);
    }


    public function delete($data)
    {
        $this->db->where('id_cuti', $data['id_cuti']);
        $this->db->delete('cuti', $data);
    }
}

/* End of file M_cuti.php */
