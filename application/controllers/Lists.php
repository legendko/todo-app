<?php

class Lists extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if(!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('no_access', 'Sorry, you are not logged in!');
            redirect('home/index');
        }
    }
    
    public function index() {
        $user_id = $this->session->userdata('user_id');
        
        $data['lists'] = $this->List_model->get_all_lists($user_id);
        $data['main_content'] = 'lists/index';
        $this->load->view('templates/main', $data);
    }
    
    public function show($id) {
        //Get all lists from the model
        $data['list'] = $this->List_model->get_list($id);
        //Get all completed tasks for this list
        $data['active_tasks'] = $this->List_model->get_list_tasks($id, true);
        //Get all uncompleted tasks for this list
        $data['inactive_tasks'] = $this->List_model->get_list_tasks($id, false);
        
        //Load view and template
        $data['main_content'] = 'lists/show';
        $this->load->view('templates/main', $data);
    }
    
    public function add(){
        $this->load->helper('security');
        $this->form_validation->set_rules('list_name','List Name','trim|required|xss_clean');
        $this->form_validation->set_rules('list_body','List Body','trim|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            //Load view and layout
            $data['main_content'] = 'lists/add_list';
            $this->load->view('templates/main',$data);  
        } else {
            //Validation has ran and passed  
             //Post values to array
            $data = array(             
                'list_name'    => $this->input->post('list_name'),
                'list_body'    => $this->input->post('list_body'),
                'list_user_id' => $this->session->userdata('user_id')
            );
           if($this->List_model->create_list($data)){
                $this->session->set_flashdata('list_created', 'Your task list has been created!');
                //Redirect to index page with error above
                redirect('lists/index');
           }
        }
    }
    
    public function edit($list_id){
        $this->load->helper('security');
        $this->form_validation->set_rules('list_name','List Name','trim|required|xss_clean');
        $this->form_validation->set_rules('list_body','List Body','trim|xss_clean');
        
        if($this->form_validation->run() === FALSE){
            //Get the current list info
            $data['this_list'] = $this->List_model->get_list_data($list_id);
            //Load view and layout
            $data['main_content'] = 'lists/edit_list';
            $this->load->view('templates/main',$data);  
        } else {
            //Validation has ran and passed  
             //Post values to array
            $data = array(             
                'list_name'    => $this->input->post('list_name'),
                'list_body'    => $this->input->post('list_body'),
                'list_user_id' => $this->session->userdata('user_id')
            );
           if($this->List_model->edit_list($list_id,$data)){      
                $this->session->set_flashdata('list_updated', 'Your task list has been updated!');
                //Redirect to index page with error above
                redirect('lists/index');
           }
        }
    }
    
    public function delete($list_id) {
        $this->List_model->delete_list($list_id);
        
        $this->session->set_flashdata('list_deleted', 'Your list has been deleted!');
        redirect('lists/index');
    }

}

