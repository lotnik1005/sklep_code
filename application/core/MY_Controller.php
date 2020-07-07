<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyController
 *
 * @author Septem
 */
class MY_Controller extends CI_Controller {
    public function layout($param, $arg='') {
        $this->load->view($param, $arg);
    }
}
