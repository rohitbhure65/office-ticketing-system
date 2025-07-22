<?php
defined("BASEPATH") or exit("No direct script access allowed");

class EmployeeController extends CI_Controller{

    public function dashboard(){
        $this->load->view("employee/dashboard");
    }
}