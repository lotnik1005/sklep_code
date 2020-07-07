<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart_model
 *
 * @author Septem
 */
class Cart_model extends CI_Model {
    public function update_cart($rowid, $qty, $price, $amount) {
        $data = array(
          'rowid'=>$rowid,
          'qty'=>$qty,
          'price'=>$price,
          'amount'=>$amount
        );
        
        $this->cart->update($data);
    }
}
