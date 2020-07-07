<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author Septem
 */
class Contact extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->library('cart');
    }
    
    public function index() {
        
        $title = ['title'=>'Kontakt'];
        
        $this->layout('header', $title);
        $this->layout('content/contact');
        $this->layout('footer');
    }
}
