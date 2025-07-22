<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Auth_model extends CI_Controller{

    public function insert_user($data){               // register user
        return $this->db->insert('users', $data);
    }

    public function get_user($id){                    // get user by id
        return $this->db->get_where('users', ['id' => $id])->row();
    }

}