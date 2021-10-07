<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_karyawan extends CI_Model
{

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi', 'left');
        $this->db->order_by('id_karyawan', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_data_sisacuti()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi', 'left');
        $this->db->order_by('id_karyawan', 'desc');
        return $this->db->get()->row();
    }

    public function get_data($id_karyawan)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi', 'left');
        $this->db->where('karyawan.id_karyawan', $id_karyawan);

        return $this->db->get()->row();
    }

    public function get_all_data_cuti()
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->order_by('id_cuti', 'desc');
        return $this->db->get()->result();
    }

    public function get_data_cuti($id_karyawan)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->where('cuti.id_karyawan', $id_karyawan);

        return $this->db->get()->result();
    }

    public function get_data_cuti_s($id_cuti)
    {
        $this->db->select('*');
        $this->db->from('cuti');
        $this->db->join('karyawan', 'karyawan.id_karyawan = cuti.id_karyawan', 'left');
        $this->db->where('cuti.id_cuti', $id_cuti);

        return $this->db->get()->row();
    }

    public function get_all_role()
    {
        $this->db->select('*');
        $this->db->from('users_role');
        $this->db->order_by('id_user', 'asc');
        return $this->db->get()->result();
    }


    public function get_data_d_karyawan($id_divisi)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('divisi', 'divisi.id_divisi = karyawan.id_divisi', 'left');
        $this->db->where('karyawan.id_divisi', $id_divisi);

        return $this->db->get()->result();
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

    public function edit_biodata($data)
    {
        $this->db->where('id_karyawan', $data['id_karyawan']);
        $this->db->update('karyawan', $data);
    }


    public function tambah_cuti_all($jumlah)
    {

        $query = $this->db->query("UPDATE `karyawan` SET `sisa_cuti`= `sisa_cuti` + $jumlah");
        return $query;
    }

    public function tambah_cuti($data)
    {

        $query = $this->db->query("UPDATE `karyawan` SET `sisa_cuti`= `sisa_cuti` + $data[tambah_cuti] WHERE id_karyawan = $data[id_karyawan]");
        return $query;
    }

    public function kurangi_cuti($data)
    {

        $query = $this->db->query("UPDATE `karyawan` SET `sisa_cuti`= `sisa_cuti` - $data[kurangi_cuti] WHERE id_karyawan = $data[id_karyawan]");
        return $query;
    }

    public function delete($data)
    {
        $this->db->where('id_karyawan', $data['id_karyawan']);
        $this->db->delete('karyawan', $data);
    }
}

/* End of file .php */
