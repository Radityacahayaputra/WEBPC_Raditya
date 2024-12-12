<?php
class Produk_model extends CI_Model
{   
    // Fungsi untuk menghitung jumlah total produk
public function countTotalProduk()
{
    return $this->db->count_all('produk'); // Menghitung jumlah produk di tabel produk
}

    public function getTotalProduk()
    {
        return $this->db->count_all('produk'); // Menghitung jumlah data di tabel produk
    }
    // Mendapatkan semua produk
    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array(); // Sudah benar menggunakan result_array()
    }

    // Mendapatkan semua tipe produk
    public function getAllTipe()
    {
        return $this->db->get('tipe')->result_array(); // Sudah benar
    }

    // Menyisipkan data produk baru ke database
    public function insertProduk($data)
    {
        return $this->db->insert('produk', $data); // Sudah benar
    }

    // Mendapatkan produk berdasarkan ID
    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id' => $id])->row_array(); // Sudah benar
    }

    // Mengubah data produk berdasarkan ID
    public function ubahDataProduk($id, $data)
    {
        // Perbarui data produk di database berdasarkan ID
        $this->db->where('id', $id);
        return $this->db->update('produk', $data); // Menggunakan parameter $data untuk update
    }

    // Menghapus produk berdasarkan ID
    public function hapusDataProduk($id)
    {
        return $this->db->delete('produk', ['id' => $id]); // Sudah benar
    }
}
