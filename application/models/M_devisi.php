<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_devisi extends CI_Model {

    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('devisi');
        $this->db->order_by('id_devisi', 'desc');
        return $this->db->get()->result();
    }
    public function add($data)
    {
        $this->db->insert('devisi', $data);
    }

    public function delete($data)
    {
        $this->db->where('id_devisi', $data['id_devisi']);
        $this->db->delete('devisi', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_devisi', $data['id_devisi']);
        $this->db->update('devisi', $data);
        
        
    }

}

/* End of file m_model.php */

?>