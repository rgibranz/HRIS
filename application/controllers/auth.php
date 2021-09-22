<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function login_user()
    {
        $this->form_validation->set_rules('username', 'username', 'required',  array(
            'required' => '%s Harus Diisi !!!'));

        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s Harus Diisi !!!'));
        
            if ($this->form_validation->run() == TRUE) {
                $username = $this->input->post('username');
                $passsword = $this->input->post('password');
                $this->user_login->login($username, $passsword);

            }else{
                $data = array(
                    'title' => 'login User',
                );
                
                $this->load->view('login_user', $data, FALSE);
            }
        

    }

    public function logout_user()
    {
        $this->user_login->logout();
    }
    

}

/* End of file Auth.php */
