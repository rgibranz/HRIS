<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_cuti extends CI_Model {

    public function add($data)
    {
        $this->db->insert('cuti', $data);
        
    }

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

?>