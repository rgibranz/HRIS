<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function login_user($email)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->where(array(
            'email' =>$email,
        ));
        return $this->db->get()->row();
        
        
    }

}

/* End of file M_auth.php */

?>