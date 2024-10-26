<!-- Button trigger modal -->
<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/button.css'); ?>">
</head>

<div class="row mt-3">
    <div class="col-mt-4">
        <form action="" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="cari data komponen..." name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url('assets/css/tambah.css'); ?>">

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Data Komponen
</button>

<!-- awal flashdata -->
<?php if($this->session->flashdata('flash')) : ?>
				<div class="row mt-3">
					<div class="col md-8">
					<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Produk<strong>Berhasil</strong><?= $this->session->flashdata('flash');?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					</div>
				</div>
				<?php endif; ?>
			<!-- akhir flashdata -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Komponen</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('produk'); ?>" method="post">
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode</label>
                        <input type="text" name="kode" class="form-control" id="kode" placeholder="Masukkan kode" >
                        <small class="form-text text-danger"><?= form_error('kode'); ?></small>
                    </div>
                    <div class="mb-3">
                        <label for="merek" class="form-label">Merek</label>
                        <input type="text" name="merek" class="form-control" id="merek" placeholder="Masukkan merek" >
                        <small class="form-text text-danger"><?= form_error('merek'); ?></small>
                    </div>
                    <div class="form group">
			        	<label for="tipe">tipe</label>
			        	<select class="form-select" id="tipe" name="tipe">
						<option value="">Pilihan</option>
						<?php foreach($tipe as $t):?>
						<option><?php echo $t['namatipe']; ?></option>
						<?php endforeach; ?>
					</select>
					<small class="form-text text-danger"><?= form_error('tipe') ?></small>
				</div>


                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan harga" step="0.01" >
                        <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
            </div>
                </form>
        </div>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Kode</th>
            <th scope="col">Merek</th>
            <th scope="col">Tipe</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produk as $prd): ?>
            <tr>
                <th scope="row"><?= $prd['kode']; ?></th>
                <td><?= $prd['merek']; ?></td>
                <td><?= $prd['tipe']; ?></td>
                <td><?= $prd['harga']; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $prd['id']; ?>">Ubah</button>
                    <a href="<?= base_url('produk/hapus/' . $prd['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin');">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- awal modal edit -->
<?php $no = 0; foreach ($produk as $prd): $no++; ?>
<div class="modal fade" id="editModal<?=$prd['id'];?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Form Edit Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open('produk/ubah/' . $prd['id']); ?> <!-- Mengarahkan ke controller untuk mengubah produk -->
                <input type="hidden" name="id" value="<?=$prd['id']; ?>">
                
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" class="form-control" value="<?=$prd['kode']; ?>" id="kode" placeholder="Masukkan Kode" readonly>
                </div>

                <div class="form-group">
                    <label for="merek">Merek</label>
                    <input type="text" name="merek" class="form-control" value="<?=$prd['merek']; ?>" id="merek" placeholder="Masukkan Merek">
                </div>

                <div class="form group">
			        	<label for="tipe">tipe</label>
					   <select class="form-select" id="tipe" name="tipe">
						<option value="">Pilihan</option>
						<?php foreach($tipe as $t):?>
						<option><?php echo $t['namatipe']; ?></option>
						<?php endforeach; ?>
					</select>   	
				</div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?=$prd['harga']; ?>" id="harga" placeholder="Masukkan Harga" step="0.01">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
                <?= form_close(); ?>
        </div>
    </div>
</div>
<?php endforeach; ?>
