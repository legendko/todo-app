<?php

class Users extends CI_Controller {

    public function register() {
        $this->load->helper('security');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[50]|min_length[2]|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[50]|min_length[2]|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|max_length[100]|min_length[5]|xss_clean|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[20]|min_length[4]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[20]|min_length[6]|xss_clean');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|max_length[20]|min_length[6]|xss_clean|matches[password]');
        
        if ($this->form_validation->run() === FALSE) {
            $data['main_content'] = 'users/register';
            $this->load->view('templates/main', $data);
        } else {
            if($this->User_model->create_member()) {
                $this->session->set_flashdata('registered', 'You are now registered and can log in');
                redirect('home/index');
            }
        }
    }
    
    public function login() {
        $this->load->helper('security');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]|min_length[6]|xss_clean');
                
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('login_failed', 'Username/password are incorrect');
            redirect('home/index');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user_id = $this->User_model->login_user($username, $password);
            
            if($user_id) {
                $user_data = array(
                    'user_id'   => $user_id,
                    'username'  => $username,
                    'logged_in' => true
                );
                
                $this->session->set_userdata($user_data);
                
                $this->session->set_flashdata('login_success', 'You are now logged in!');
                redirect('home/index');
            } else {
                $this->session->set_flashdata('login_failed', 'Username/password are incorrect');
                redirect('home/index');
            }
        }
    }
    
    public function logout() {
        //Unset session data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
        redirect('home/index');
    }

}

