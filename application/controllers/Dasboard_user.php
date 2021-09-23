<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dasboard_user extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Dasboard',
            'isi' => 'user/dasboard');

            $this->load->view('layout/wrapper_user', $data, FALSE);
            
    }

}

/* End of file Controllername.php */

?>