<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('devisi', 'devisi.id_devisi = karyawan.id_devisi', 'left');
        $this->db->order_by('id_karyawan', 'desc');
        return $this->db->get()->result();
    }

    public function add()
    {
        
    }

    public function edit($data)
    {
        # code...
    }

    public function delete($data)
    {
        # code...
    }

}

/* End of file .php */

?>