<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login_user()
    {
        $this->form_validation->set_rules('email', 'email', 'required',  array(
            'required' => '%s Harus Diisi !!!'));

        $this->form_validation->set_rules('password', 'password', 'required', array(
            'required' => '%s Harus Diisi !!!'));
        
            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('email');
                $passsword = $this->input->post('password');
                $this->user_login->login($email, $passsword);

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
