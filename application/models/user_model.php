<?php

class User_model extends CI_Model {

    public function create_member() {
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $data = array(
            'first_name'    => $this->input->post('first_name'),
            'last_name'     => $this->input->post('last_name'),
            'email'         => $this->input->post('email'),
            'username'      => $this->input->post('username'),
            'password'      => $password            
        );
        
        $query = $this->db->insert('users', $data);
        return $query;
    }
    
    public function login_user($username, $password) {
        $query = $this->db->query("SELECT id, password FROM users WHERE username = '$username'");
        $result = $query->result_array();
        if (!$result) {
            return false;
        }
        $hash = $result[0]['password'];
        if (password_verify($password, $hash)) {
            return $result[0]['id'];
        } else {
            return false;
        }
    }

}

