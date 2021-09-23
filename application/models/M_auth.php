<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function login_user($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array(
            'email' =>$email,
            'password' =>$password
        ));
        return $this->db->get()->row();
        
        
    }

}

/* End of file M_auth.php */

?>