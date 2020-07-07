<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomePage
 *
 * @author Septem
 */
class Home extends MY_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Categories_model');
        $this->load->model('Products_model');
        $this->load->model('Cart_model');
        $this->load->library('cart');
    }
    
    public function index() {
        $categories = $this->Categories_model->getCategories();
        $products = $this->Products_model->getProducts();
        
        $data = ['title'=>'Strona główna', 'categories'=>$categories, 'products'=>$products];
        
        $this->layout('header');
        $this->layout('content/home', $data);
        $this->layout('footer');
    }
    
    public function showProductsCategory() {
        $id = $_GET['id'];
        
        $products = $this->Products_model->getProductsCategory($id);
        $categories = $this->Categories_model->getCategories();
        
        $data = ['title'=>'Produkty', 'products'=>$products, 'categories'=>$categories];
        
        $this->layout('header');
        $this->layout('content/productsCategory', $data);
        $this->layout('footer');
    }
    
    public function showSingleProduct() {
        $id = $_GET['id'];
        
        $product = $this->Products_model->getSingleProduct($id);
        $categories = $this->Categories_model->getCategories();
        
        $data = ['title'=>'Pojedynczy produkt', 'product'=>$product, 'categories'=>$categories];
        
        $this->layout('header');
        $this->layout('content/singleProduct', $data);
        $this->layout('footer');
    }
    
    public function ajaxSingleProduct() {
        $id = $_POST['id'];
        $product = $this->Products_model->getSingleProduct($id);
        $data = [];
        
        foreach($product as $value=>$val) {
            echo json_encode($val);
        }
    }
    
    public function showBasket() {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $id = $_POST['id'];
        $quantity = $_POST['quantity'];
        $data = [
            'id'=>$id,
            'qty'=>$quantity,
            'price'=>$price,
            'name'=>$name,
        ];
        
        
        
        $this->cart->update($data);
        
        $this->cart->insert($data);
        
        $this->layout('header');
        $this->layout('content/basket', $data);
        $this->layout('footer');
    }
}
