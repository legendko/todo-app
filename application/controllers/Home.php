<?php

class Home extends CI_Controller {

    function index() {
        if($this->session->userdata('logged_in')) {
            //get the logged in users id
            $user_id = $this->session->userdata('user_id');
            //get all lists from the model
            $data['lists'] = $this->List_model->get_all_lists($user_id);
            $data['tasks'] = $this->Task_model->get_users_tasks($user_id);
        }
        $data['main_content'] = 'home';
        $this->load->view('templates/main', $data);
    }

}

