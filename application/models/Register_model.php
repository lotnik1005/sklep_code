<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Register_model
 *
 * @author Septem
 */
class Register_model extends CI_Model {
    public function add_user($data) {
        return $this->db->insert('users', $data);
    }
}
