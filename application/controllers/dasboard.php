<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dasboard extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Dasboard',
            'isi' => 'admin/dasboard');

            $this->load->view('layout/wrapper', $data, FALSE);
            
    }

}

/* End of file Controllername.php */

?>