<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Products_model
 *
 * @author Septem
 */
class Products_model extends CI_Model {
    public function getProducts (){
        $query = $this->db->select('*')
                     ->get('products');
   
        return $query->result();
    }
    
    public function getSingleProduct($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        $result = $query->result();
        
        return $result;
    }
    
    public function getProductsCategory($id) {
        $this->db->where('category_id', $id);
        $query = $this->db->get('products');
        $result = $query->result();
        
        return $result;
    }
    
    public function saveProduct($name, $description, $price, $categoryId, $photoUrl) {
        $query = "INSERT INTO products (name, description, price, category_id, photo_url) VALUES ('$name', '$description', '$price', '$categoryId', '$photoUrl')";
        $this->db->query($query);
    }
    
    public function deleteProduct($id) {
        $query = "DELETE FROM products WHERE id=$id";
        $this->db->query($query);
    }
    
    public function updateProduct($id, $name, $description, $price, $categoryId, $photoUrl) {
        $query = "UPDATE products SET name='$name', description='$description', price='$price', category_id='$categoryId', photo_url='$photoUrl' WHERE id='$id'";
        $this->db->query($query);
    }
}
