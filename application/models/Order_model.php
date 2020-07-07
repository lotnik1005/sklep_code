<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Order_model
 *
 * @author Septem
 */
class Order_model extends CI_Model {
    public function insert_customer($data) {
        $this->db->insert('customers', $data);
        $id = $this->db->insert_id();
        
        return (isset($id) ? $id : false);
    }
    
    public function insert_order($data) {
        $this->db->insert('orders', $data);
        $id = $this->db->insert_id();
        
        return (isset($id) ? $id : false);
    }
    
    public function insert_order_detail($data) {
        $this->db->insert('order_detail', $data);
    }
    
    public function get_order() {
        $this->db->select('orders.id, orders.date, customers.name');
        $this->db->from('orders');
        $this->db->join('customers', 'orders.customerid = customers.id');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_details($id) {
        $this->db->select('orders.id, orders.date, customers.name as custname, customers.email, customers.address, customers.phone, order_detail.quantity, products.name, products.price');
        $this->db->from('orders');
        $this->db->join('customers', 'orders.customerid = customers.id');
        $this->db->join('order_detail', 'order_detail.orderid = orders.id');
        $this->db->join('products', 'order_detail.productid = products.id');
        $this->db->where('orders.id', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
