<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Form_Cuti',
            'isi' => 'user/form_cuti'
        );
        $this->load->view('layout/wrapper_user', $data, FALSE);
        
    }

}

/* End of file Form.php */

?>