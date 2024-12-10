<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {
    
    private $table = 'products';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAllProducts() {
        return $this->db->get($this->table)->result();
    }

    public function getProductById($id) {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function addProduct($data) {
        return $this->db->insert($this->table, $data);
    }

    public function updateProduct($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function deleteProduct($id) {
        return $this->db->where('id', $id)->delete($this->table);
    }
}