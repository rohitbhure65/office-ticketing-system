<?php
defined("BASEPATH") or exit("No direct script access allowed");

class AdminController extends CI_Controller{

    public function dashboard(){
        $this->load->view("admin/dashboard");
    }

    public function categories(){
        $this->load->view("admin/categories");
    }

    public function map_hadlers(){
        $this->load->view("admin/map_handlers");
    }

    public function registser_user(){
        $this->load->view("admin/register_user");
    }
}