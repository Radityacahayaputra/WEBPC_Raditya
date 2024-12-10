<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->helper('url');
    }

    public function index() {
        $data['products'] = $this->ProductModel->getAllProducts();
        $this->load->view('Templates/header',$data);
        $this->load->view('shop/shop', $data);
        $this->load->view('Templates/footer');
    }

    public function addToCart($id) {
        // Implementasi add to cart
        $product = $this->ProductModel->getProductById($id);
        
        $cart = array(
            'id'      => $product->id,
            'qty'     => 1,
            'price'   => $product->price,
            'name'    => $product->name
        );

        $this->cart->insert($cart);
        redirect('Shop');
    }

    public function viewCart() {
        $data['cart_items'] = $this->cart->contents();
        $data['total'] = $this->cart->total();
        $this->load->view('shop/cart', $data);
    }
}