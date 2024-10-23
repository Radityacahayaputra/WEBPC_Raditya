<?php 

class Produk_model extends CI_Model {
    
    public function getAllProduk()
    {
        // Mengambil semua produk dari tabel produk
        return $this->db->get('produk')->result_array();
    }
    public function getAllTipe()
    {
        return $this->db->get('tipe')->result_array(); // Mengambil semua data dari tabel 'tipe'
    }
    public function cariDataProduk()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('merek', $keyword);
        $this->db->or_like('tipe', $keyword);
        return $this->db->get('produk')->result_array();
    }

    public function insertProduk($data)
    {
        $this->db->insert('produk', $data);
    }

    public function ubahDataProduk($id)
    {
        $data = [
            "kode" => $this->input->post('kode', true),
            "merek" => $this->input->post('merek', true),
            "tipe" => $this->input->post('tipe', true),
            "harga" => $this->input->post('harga', true),
        ];
        $this->db->where('id', $id); // Memperbarui data berdasarkan ID
        $this->db->update('produk', $data);
    }
    
    public function hapusDataProduk($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('produk');
    }
}
