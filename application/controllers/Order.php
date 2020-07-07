<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order
 *
 * @author Septem
 */
class Order extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Order_model');
        $this->load->library('cart');
    }
    
    public function index() {
        $this->data['title'] = 'Zamówienie';
        
        $this->layout('header');
        $this->layout('content/order', $this->data);
        $this->layout('footer');
    }
    
    public function save_order() {
        $customer = array(
          'name'=>$this->input->post('name'),
          'email'=>$this->input->post('email'),
          'address'=>$this->input->post('address'),
          'phone'=>$this->input->post('phone')
        );
        
        $customer_id = $this->Order_model->insert_customer($customer);
        
        $order = array(
          'date'=>date('Y-m-d'),
          'customerid'=>$customer_id
        );
        
        $order_id = $this->Order_model->insert_order($order);
        
        if($cart = $this->cart->contents()) {
            foreach($cart as $item) {
                $order_detail = array(
                  'orderid'=>$order_id,
                  'productid'=>$item['id'],
                  'quantity'=>$item['qty'],
                  'price'=>$item['price']
                );
                
                $cust_id = $this->Order_model->insert_order_detail($order_detail);
            }
        }
        
        $this->layout('header');
        $this->layout('content/sumCart');
        $this->layout('footer');
    }
}
