<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cart_model');
		$this->load->library('cart');
	}

	public function index()
	{	
		$this->data['title'] = 'Koszyk';

		if (!$this->cart->contents()){
			$this->data['message'] = '<p>Twój koszyk jest pusty</p>';
		}else{
			$this->data['message'] = $this->session->flashdata('message');
		}

                $this->layout('header');
		$this->layout('content/cart', $this->data);
                $this->layout('footer');
	}

	public function add()
	{
		// $this->load->model('Cart_model');
	
		$insert_cart = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'qty' => 1
		);		

		$this->cart->insert($insert_cart);
			
		redirect('cart');
	}
	
	function remove($rowid) {
		if ($rowid=="all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);

			$this->cart->update($data);
		}
		
		redirect('cart');
	}
        
        function remove_order_cart() {
            $this->cart->destroy();
            
            redirect('home');
        }

	function update_cart(){
 		foreach($_POST['cart'] as $id => $cart)
		{			
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			
			$this->Cart_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
		}
		
		redirect('cart');
	}	
}
