<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="sidebar">
<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<div class="container-fluid">
    <h1 class="mt-4"><?= $judul; ?></h1>

    <div class="row mb-3">
        <div class="col-md-3 offset-md-9 text-right">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Tambah Data Komponen
            </button>
        </div>
    </div>

    <!-- Flashdata -->
    <!--<?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Produk<strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
        </div>
    <?php endif; ?>-->

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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Produk</h1>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Table Produk</h3>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Kode</th>
                  <th scope="col">Merek</th>
                  <th scope="col">Tipe</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($produk as $prd): ?>
                  <tr>
                    <th scope="row"><?= $prd['kode']; ?></th>
                    <td><?= $prd['merek']; ?></td>
                    <td><?= $prd['tipe']; ?></td>
                    <td><?= number_format($prd['harga'], 2, ',', '.'); ?></td>
                    <td><?= $prd['deskripsi']; ?></td>
                    <td>
                      <?php if (!empty($prd['gambar'])): ?>
                        <img src="<?= base_url('uploads/' . $prd['gambar']); ?>" alt="Gambar Produk" style="width: 150px; height: 150px;">
                      <?php else: ?>
                        <span>Tidak ada gambar</span>
                      <?php endif; ?>
                    </td>
                    < <td>
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $prd['id']; ?>">Ubah</button>
                      <a href="<?= base_url('produk/hapus/' . $prd['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

    <!-- Modal Edit Produk -->
    <?php foreach ($produk as $prd): ?>
        <div class="modal fade" id="editModal<?= $prd['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?= form_open_multipart('produk/ubah/' . $prd['id']); ?>
                        <input type="hidden" name="id" value="<?= $prd['id']; ?>">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kode" class="form-label">Kode</label>
                                <input type="text" name="kode" class="form-control" value="<?= $prd['kode']; ?>" id="kode" placeholder="Masukkan Kode" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="merek" class="form-label">Merek</label>
                                <input type="text" name="merek" class="form-control" value="<?= $prd['merek']; ?>" id="merek" placeholder="Masukkan Merek" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="harga">Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?= $prd['harga']; ?>" id="harga" placeholder="Masukkan Harga" step="0.01" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi" required><?= $prd['deskripsi']; ?></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="gambar">Gambar</label>
                                <input type="file" name="gambar" class="form-control" id="gambar">
                                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</div>