<?php

class Task_model extends CI_Model {

    public function get_task($id) {
        $user = $this->session->userdata('user_id');
        $this->db->select('
            tasks.task_name,
            tasks.id,
            tasks.create_date,
            tasks.due_date,
            tasks.task_body,
            tasks.is_completed,
            lists.id as list_id,
            lists.list_name,
            lists.list_body,
                ');
        $this->db->from('tasks');
        $this->db->join('lists', 'lists.id = tasks.list_id', 'LEFT');
        
        $this->db->where('lists.list_user_id', $user);
        $this->db->where('tasks.id', $id);
        $query = $this->db->get();
        if ($query->num_rows() != 1) {
            show_404();
        } else {
            return $query->row();
        }
    }
    
    public function get_list_name($list_id) {
        $user = $this->session->userdata('user_id');
        $this->db->where('list_user_id', $user);
        $this->db->where('id', $list_id);
        $query = $this->db->get('lists');
        if ($query->num_rows() != 1) {
            show_404();
        } else {
            return $query->row()->list_name;
        }
    }
    
    public function create_task($data) {
        $query = $this->db->insert('tasks', $data);
        return $query;
    }
    
    public function get_task_list_id($task_id) {
        $this->db->where('id', $task_id);
        $query = $this->db->get('tasks');
        if ($query->num_rows() != 1) {
            show_404();
        } else {
            return $query->row()->list_id;
        }
    }
    
    public function get_task_data($task_id) {
        $this->db->where('id', $task_id);
        $query = $this->db->get('tasks');
        return $query->row();
    }
    
    public function edit_task($task_id, $data) {
        $this->db->where('id', $task_id);
        $this->db->update('tasks', $data);
        return TRUE;
    }
    
    public function delete_task($task_id) {
        $user = $this->session->userdata('user_id');
        $this->db->where('id', $task_id);
        $this->db->where('task_user_id', $user);
        $this->db->delete('tasks');
        if ($this->db->affected_rows() != 1) {
            show_404();
        } else {
            return;
        }
    }
    
    public function mark_new($task_id) {
        $user = $this->session->userdata('user_id');
        $this->db->set('is_completed', 0);
        $this->db->where('task_user_id', $user);
        $this->db->where('id', $task_id);
        $this->db->update('tasks');
        if ($this->db->affected_rows() != 1) {
            show_404();
        } else {
            return TRUE;
        }
    }
    
    public function mark_complete($task_id) {
        $user = $this->session->userdata('user_id');
        $this->db->set('is_completed', 1);
        $this->db->where('task_user_id', $user);
        $this->db->where('id', $task_id);
        $this->db->update('tasks');
        if ($this->db->affected_rows() != 1) {
            show_404();
        } else {
            return TRUE;
        }
    }
    
    function get_users_tasks($user_id) {
        $this->db->where('list_user_id', $user_id);
        $this->db->join('tasks', 'lists.id = tasks.list_id');
        $this->db->order_by('tasks.create_date', 'asc');
        $query = $this->db->get('lists');
        return $query->result();
    }
    
}

