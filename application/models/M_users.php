<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_users extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('divisi', 'divisi.id_divisi = users.id_divisi', 'left');
        $this->db->order_by('id_users', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_data_sisacuti()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('divisi', 'divisi.id_divisi = users.id_divisi', 'left');
        $this->db->order_by('id_users', 'desc');
        return $this->db->get()->row();
    }

    public function get_data($id_users)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('divisi', 'divisi.id_divisi = users.id_divisi', 'left');
        $this->db->where('users.id_users', $id_users);

        return $this->db->get()->row();
    }

    public function get_all_role()
    {
        $this->db->select('*');
        $this->db->from('users_role');
        $this->db->order_by('id_user', 'asc');
        return $this->db->get()->result();
    }

    public function get_data_d_users($id_divisi)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('divisi', 'divisi.id_divisi = users.id_divisi', 'left');
        $this->db->where('users.id_divisi', $id_divisi);

        return $this->db->get()->result();
    }

    public function add($data)
    {
        $this->db->insert('users', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_users', $data['id_users']);
        $this->db->update('users', $data);
    }

    public function edit_biodata($data)
    {
        $this->db->where('id_users', $data['id_users']);
        $this->db->update('users', $data);
    }

    /**
     * TAMBAH KURANG CUTI
     */

    public function tambah_cuti_all($jumlah)
    {

        $query = $this->db->query("UPDATE `users` SET `sisa_cuti`= `sisa_cuti` + $jumlah");
        return $query;
    }

    public function tambah_cuti($data)
    {

        $query = $this->db->query("UPDATE `users` SET `sisa_cuti`= `sisa_cuti` + $data[tambah_cuti] WHERE id_users = $data[id_users]");
        return $query;
    }

    public function kurangi_cuti($data)
    {

        $query = $this->db->query("UPDATE `users` SET `sisa_cuti`= `sisa_cuti` - $data[kurangi_cuti] WHERE id_users = $data[id_users]");
        return $query;
    }

    public function delete($data)
    {
        $this->db->where('id_users', $data['id_users']);
        $this->db->delete('users', $data);
    }
}

/* End of file .php */
