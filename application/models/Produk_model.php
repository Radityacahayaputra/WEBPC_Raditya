<?php
class Produk_model extends CI_Model
{
    public function getAllProduk()
    {
        return $this->db->get('produk')->result_array();
    }

    public function getAllTipe()
    {
        return $this->db->get('tipe')->result_array();
    }

    public function insertProduk($data)
    {
        // Handle image upload
        $upload_image = $_FILES['gambar']['name'];

        if ($upload_image) {
            $config['upload_path'] = './uploads/produk/'; // Ensure the path is correct
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '4096';

            // Load upload library
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data['gambar'] = $this->upload->data('file_name');
            } else {
                return ['error' => $this->upload->display_errors()];
            }
        }

        // Insert product data into the database
        return $this->db->insert('produk', $data);
    }

    public function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id' => $id])->row_array();
    }

    public function ubahDataProduk($id)
    {
        // Prepare data for update
        $data = [
            'merek' => $this->input->post('merek'),
            'tipe' => $this->input->post('tipe'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        // Handle image upload if there is a new image
        $upload_image = $_FILES['gambar']['name'];
        if ($upload_image) {
            $config['upload_path'] = './uploads/produk/'; // Ensure the path is correct
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '4096';

            // Load upload library
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                // Delete old image if exists
                $old_image = $this->getProdukById($id)['gambar'];
                if ($old_image && file_exists(FCPATH . 'uploads/produk/' . $old_image)) {
                    unlink(FCPATH . 'uploads/produk/' . $old_image);
                }

                // Save new image
                $data['gambar'] = $this->upload->data('file_name');
            } else {
                return ['error' => $this->upload->display_errors()];
            }
        }

        // Update product data in the database
        $this->db->where('id', $id);
        return $this->db->update('produk', $data);
    }

    public function hapusDataProduk($id)
    {
        // Get the product image before deletion
        $old_image = $this->getProdukById($id)['gambar'];
        if ($old_image && file_exists(FCPATH . 'uploads/produk/' . $old_image)) {
            unlink(FCPATH . 'uploads/produk/' . $old_image); // Delete the image file
        }

        return $this->db->delete('produk', ['id' => $id]);
    }
}