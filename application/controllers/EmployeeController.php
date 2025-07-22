<?php
defined("BASEPATH") or exit("No direct script access allowed");

class EmployeeController extends CI_Controller{

    public function dashboard(){
        $this->load->view("employee/dashboard");
    }

    public function file_complaint(){
        $this->load->view("employee/file_complaint");
    }

    public function track_complaints(){
        $this->load->view("employee/track_complaints");
    }
}