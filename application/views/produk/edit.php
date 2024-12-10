<!-- Awal modal edit -->
<?php $no = 0; foreach ($produk as $prd): $no++; ?>
<div class="modal fade" id="editModal<?=$prd['id'];?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Form Edit Dat<!-- Awal modal edit -->
<?php $no = 0; foreach ($produk as $prd): $no++; ?>
<div class="modal fade" id="editModal<?=$prd['id'];?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Form Edit Data Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('produk/ubah/' . $prd['id']); ?> <!-- Mengarahkan ke controller untuk mengubah produk -->
                <input type="hidden" name="id" value="<?=$prd['id']; ?>">
                
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" class="form-control" value="<?=$prd['kode']; ?>" id="kode" placeholder="Masukkan Kode" readonly>
                </div>

                <div class="form-group">
                    <label for="merek">Merek</label>
                    <input type="text" name="merek" class="form-control" value="<?=$prd['merek']; ?>" id="merek" placeholder="Masukkan Merek" required>
                </div>

                <div class="form-group">
                    <label for="tipe">Tipe</label>
                    <select class="form-select" id="tipe" name="tipe" required>
                        <option value="">Pilih Tipe</option>
                        <?php foreach($tipe as $t): ?>
                            <option value="<?=$t['namatipe'];?>" <?= ($prd['tipe'] == $t['namatipe']) ? 'selected' : ''; ?>>
                                <?= $t['namatipe']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>   
                    <small class="form-text text-danger"><?= form_error('tipe'); ?></small>
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?=$prd['harga']; ?>" id="harga" placeholder="Masukkan Harga" step="0.01" required>
                    <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Masukkan Deskripsi" required><?=$prd['deskripsi']; ?></textarea>
                    <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="gambar">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
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
<?php endforeach; ?>a Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('produk/ubah/' . $prd['id']); ?> <!-- Mengarahkan ke controller untuk mengubah produk -->
                <input type="hidden" name="id" value="<?=$prd['id']; ?>">
                
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" class="form-control" value="<?=$prd['kode']; ?>" id="kode" placeholder="Masukkan Kode" readonly>
                </div>

                <div class="form-group">
                    <label for="merek">Merek</label>
                    <input type="text" name="merek" class="form-control" value="<?=$prd['merek']; ?>" id="merek" placeholder="Masukkan Merek">
                </div>

                <div class="form-group">
                    <label for="tipe">Tipe</label>
                    <select class="form-select" id="tipe" name="tipe">
                        <option value="">Pilih Tipe</option>
                        <?php foreach($tipe as $t): ?>
                            <option value="<?=$t['namatipe'];?>" <?= ($prd['tipe'] == $t['namatipe']) ? 'selected' : ''; ?>>
                                <?php echo $t['namatipe']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>   
                </div>

                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?=$prd['harga']; ?>" id="harga" placeholder="Masukkan Harga" step="0.01">
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" class="form-control" id="gambar">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
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
