<?php
defined("BASEPATH") or exit("No direct script access allowed");

class HandlerController extends CI_Controller{

    public function dashboard(){
        $this->load->view("handler/dashboard");
    }
}