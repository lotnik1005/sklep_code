<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Categories_model extends CI_Model {
  public function getCategories (){
 
   $query = $this->db->select('*')
                     ->get('categories');
   
   return $query->result();
  }
  
  public function saveCategory($name) {
      $query = "INSERT INTO categories(name) VALUES('$name')";
      $this->db->query($query);
  }
  
  public function deleteCategory($id) {
      $query = "DELETE FROM categories WHERE id=$id";
      $this->db->query($query);
  }
  
  public function getSingleCategory($id) {
      $query = "SELECT name FROM categories WHERE id=$id";
      $this->db->query($query);
  }
  
  public function updateCategory($id, $name) {
      $query = "UPDATE categories SET name='$name' WHERE id='$id'";
      $this->db->query($query);
  }

}

