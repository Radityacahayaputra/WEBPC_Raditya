<?php
class ProductModel extends CI_Model {
    public function saveProduct() {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $image_path = null;

        // Proses upload gambar
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['file_name'] = uniqid() . '_' . $_FILES['image']['name'];

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $image_path = 'uploads/' . $uploadData['file_name'];
            }
        }

        $data = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image_path' => $image_path
        ];

        $this->db->insert('products', $data);
    }
}
