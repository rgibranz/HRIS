<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_form extends CI_Model {

    public function edit($sisa_data)
    {
        $this->db->where('id_karyawan', $sisa_data['id_karyawan']);
        $this->db->update('karyawan', $sisa_data);
    }

    

}

/* End of file M_form.php */
?>