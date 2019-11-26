<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {
    public function index() {
        $this->load->library('cart');
        $this->render('cart');
    }
    public function addToCart() {
        $this->load->library('cart');
        $data = array(
            'id'      => $this->input->post('sku'),
            'qty'     => $this->input->post('quantity'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name')
        );
    
        $this->cart->insert($data);
    }
}