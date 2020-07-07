<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Septem
 */
class Login extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Login_model', 'login');
        $this->load->library('cart');
        $this->load->library('session');
    }
    
    public function index() {
        $title = ['title', 'Logowanie'];
        
        $this->layout('header');
        $this->layout('logins/showForm');
        $this->layout('footer');
    }
    
    public function doLogin() {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        
        $check_login = $this->login->checkLogin($email, $password);
        
        if($check_login) {
            if($email == 'admin@gmail.com') {
                $data = [
                    'name' => 'Administrator',
                    'logged_in' => true
                ];
                
                $this->session->set_userdata($data);
                redirect(base_url().'admin/index');
            } else {
                $data = [
                    'name' => 'User',
                    'logged_in' => true
                ];
                
                $this->session->set_userdata('logged_in', true);
                redirect(base_url().'welcome');
            }
            
        } else {
            $this->session->set_userdata('logged_in', false);
            $this->session->set_flashdata('msg', 'Podaj prawidłowy login / hasło lub zarejestruj się');
            
            redirect(base_url().'login');
        }
    }
    
    public function logout() {
        $this->session->unset_userdata('logged_in');
        redirect(base_url().'login');
    }
}
