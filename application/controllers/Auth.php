<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Auth
 *
 * @author Septem
 */
class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Auth_model');
    }

    public function showForm() {
        $data = ['title' => 'Logowanie'];

        $this->layout('header', $data);
        $this->layout('logins/showForm');
        $this->layout('footer');
    }

    public function checkUser() {
        $users = $this->Auth_model->getUsers();
        
        foreach ($users as $user) {
            if (($user->name === $_POST['login']) && ($user->password === $_POST['password'])) {
                $session_data = $user->name;
                $this->session->set_userdata('loggedin', $session_data);

                $data = ['title' => 'Logowanie'];

                $this->layout('header', $data);
                $this->layout('admin/addItems');
                $this->layout('footer');
            } else {
                $data = ['title' => 'Logowanie', 'users' => $users];

                $this->layout('header', $data);
                $this->layout('logins/showForm');
                $this->layout('footer');
            }
        }  
    }

}
