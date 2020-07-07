<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Basket
 *
 * @author Septem
 */
class Basket extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->library('cart');
    }
    
    public function showBasket() {
        $name = $_GET['name'];
        $price = $_GET['price'];
        $id = $_GET['id'];
        $data = [
          [
            'id'=>'sku1',
            'qty'=>34,
            'price'=>4567896,
            'name'=>'spodnie',
          ],
          [
            'id'=>'sku4',
            'qty'=>36,
            'price'=>34,
            'name'=>'bluzki',
          ],
          [
            'id'=>$id,
            'qty'=>36,
            'price'=>$price,
            'name'=>$name,
          ],
        ];
        
        
        
        $this->cart->update($data);
        
        $this->cart->insert($data);
        
        $this->layout('header');
        $this->layout('content/basket', $data);
        $this->layout('footer');
    }
}
