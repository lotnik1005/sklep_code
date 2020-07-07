<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Septem
 */
class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Categories_model');
        $this->load->model('Products_model');
        $this->load->model('Order_model');

        $this->load->library('cart');
        $this->load->library('session');
    }

    public function index() {
        $categories = $this->Categories_model->getCategories();
        $orders = $this->Order_model->get_order();
        $products = $this->Products_model->getProducts();
        $data = ['title' => 'Panel administracyjny', 'categories' => $categories, 'orders' => $orders, 'products'=>$products];

        if ($this->session->userdata('name') == 'Administrator') {
            $this->layout('header');
            $this->layout('admin/adminPanel', $data);
            $this->layout('footer');
        } else {
            redirect('home');
        }
    }

    public function insertCategory() {
        $categoryName = $this->input->post('category_name');
        $this->Categories_model->saveCategory($categoryName);

        redirect(base_url() . 'admin/index');
    }

    public function insertProduct() {
        $productName = $this->input->post('product_name');
        $productDescription = $this->input->post('product_description');
        $productPrice = $this->input->post('product_price');
        $productCategoryId = $this->input->post('product_category_id');
        $photoUrl = base_url() . 'images/placeholder.jpg';

        $this->Products_model->saveProduct($productName, $productDescription, $productPrice, $productCategoryId, $photoUrl);

        redirect(base_url() . 'admin/index');
    }

    public function get_orders() {
        $orders = $this->Order_model->get_order();

        $data = ['title' => 'Zamówienia klientów', 'orders' => $orders];

        $this->layout('header', $data);
        $this->layout('admin/adminPanel', $data);
        $this->layout('footer');
    }

    public function get_order_details() {
        $id = $this->input->get('id');

        $order = $this->Order_model->get_details($id);

        $data = ['title' => 'Szczegóły zamówienia', 'order' => $order];

        $this->layout('header', $data);
        $this->layout('admin/singleOrder', $data);
        $this->layout('footer');
    }

    public function modify_category() {
        $action = $this->input->post('changeCategory');
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        // $this->Categories_model->getSingleCategory($id);

  
        
        if ($action == 'categoryDelete') {
            $this->Categories_model->deleteCategory($id);
            $title = "Usuwanie kategorii";

            $this->layout('header', $title);
            $this->layout('admin/deleteCategory', $id);
            $this->layout('footer');
        }

        if ($action == 'categoryUpdate') {
            $this->Categories_model->updateCategory($id, $name);
            
            redirect('admin/index');
        }
    }
    
    public function modify_product() {
        $action = $this->input->post('changeProduct');
        $id = $this->input->post('id');
        
        switch($action) {
            case 'productDelete':
                $this->Products_model->deleteProduct($id);
                $title = "Usuwanie produktu";
                $this->layout('header', $title);
                $this->layout('admin/deleteProduct', $id);
                $this->layout('footer');
                break;
            case 'productUpdate':
                $product = $this->Products_model->getSingleProduct($id);
                $categories = $this->Categories_model->getCategories();
                $title = "Update produktu";
                $this->layout('header', $title);
                $this->layout('admin/updateProduct', ['product'=>$product, 'categories'=>$categories]);
                $this->layout('footer');
                break;
            default:
                redirect('home');
        }
        
        /*if($action == 'productDelete') {
            $this->Products_model->deleteProduct($id);
            $title = "Usuwanie produktu";
            
            $this->layout('header', $title);
            $this->layout('admin/deleteProduct', $id);
            $this->layout('footer');
            
            exit();
        }*/
        
        /*if($action == 'productUpdate') {
            $product = $this->Products_model->getSingleProduct($id);
            $title = 'Edycja produktu';
            $data = ['name'=>'Coś'];
                    
            $this->layout('header');
            $this->layout('admin/updateProduct', $data);
            $this->layout('footer');
        }*/
    }
    
    public function saveUpdateProduct() {
        $id = $this->input->post('product_id');
        $name = $this->input->post('product_name');
        $description = $this->input->post('product_description');
        $price = $this->input->post('product_price');
        $categoryId = $this->input->post('category_id');
        $photoUrl = $photoUrl = base_url() . 'images/placeholder.jpg';
        
        $this->Products_model->updateProduct($id, $name, $description, $price, $categoryId, $photoUrl);
        
        redirect('admin/index');
    }

}
