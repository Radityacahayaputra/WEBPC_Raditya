<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Produk</h1>
          </div>
        </div>
      </div>
    </div>

<!-- Modal Tambah Data Komponen -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Tambah Komponen</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('produk'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kode" class="form-label">Kode</label>
                                <input type="text" name="kode" class="form-control" id="kode" placeholder="Masukkan kode" required>
                                <small class="form-text text-danger"><?= form_error('kode'); ?></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="merek" class="form-label">Merek</label>
                                <input type="text" name="merek" class="form-control" id="merek" placeholder="Masukkan merek" required>
                                <small class="form-text text-danger"><?= form_error('merek'); ?></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tipe">Tipe</label>
                                <select class="form-select" id="tipe" name="tipe" required>
                                    <option value="">Pilih Tipe</option>
                                    <?php foreach ($tipe as $t): ?>
                                        <option value="<?= $t['namatipe']; ?>"><?= $t['namatipe']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text text-danger"><?= form_error('tipe') ?></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan harga" step="0.01" required>
                                <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi" required></textarea>
                                <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="gambar" class="form-label">Upload Gambar</label>
                                <input type="file" name="gambar" class="form-control" id="gambar" required>
                                <small class="form-text text-danger"><?= form_error('gambar'); ?></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>