<?php
defined("BASEPATH") or exit("No direct script access allowed");

class AuthController extends CI_Controller{

    public function register(){
        $this->load->view("auth/register");
    }

    public function sigup(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[admin,handler,employee]');
        $this->form_validation->set_rules('department', 'Department', 'required|in_list[IT Support,Network Services,Information Security,Human Resources,Finance,Administration,Facilities Maintenance,Procurement]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[active,inactive]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("auth/register");
        } else {
          $username = $this->input->post('username');
          $email = $this->input->post('email');
          $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
          $role = $this->input->post('role');
          $department = $this->input->post('department');
          $status = $this->input->post('status');   

          $data = [
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "role" => $role,
            "department" => $department,
            "status" => $status
          ];
          
          $result = $this->User_model->insert_user($data);

			if ($result) {
				$user = $this->User_model->get_user_by_email($email);

				$newdata = [
				"user_id" => $user->id,
				"username" => $user->name,
				"email" => $user->email,
				"role" => $user->role,
				];

				$this->session->set_userdata($newdata);
			} else {
				redirect("auth/register");
			}
          redirect('auth/login');
        }
    }
    
    public function login(){
        $this->load->view("auth/login");
    }
}