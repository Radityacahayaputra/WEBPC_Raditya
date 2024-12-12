<!-- Modal Edit Produk -->
<?php if (!empty($produk) && is_array($produk)): ?>
    <?php foreach ($produk as $prd): ?>
        <div class="modal fade" id="editModal<?= $prd['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $prd['id']; ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel<?= $prd['id']; ?>">Edit Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('produk/ubah/' . $prd['id']); ?>
                        <input type="hidden" name="id" value="<?= $prd['id']; ?>">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kode<?= $prd['id']; ?>" class="form-label">Kode</label>
                                <input type="text" name="kode" class="form-control" value="<?= $prd['kode']; ?>" id="kode<?= $prd['id']; ?>" placeholder="Masukkan Kode" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="merek<?= $prd['id']; ?>" class="form-label">Merek</label>
                                <input type="text" name="merek" class="form-control" value="<?= $prd['merek']; ?>" id="merek<?= $prd['id']; ?>" placeholder="Masukkan Merek" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="harga<?= $prd['id']; ?>">Harga</label>
                                <input type="number" name="harga" class="form-control" value="<?= $prd['harga']; ?>" id="harga<?= $prd['id']; ?>" placeholder="Masukkan Harga" step="0.01" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="deskripsi<?= $prd['id']; ?>">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi<?= $prd['id']; ?>" placeholder="Masukkan Deskripsi" required><?= $prd['deskripsi']; ?></textarea>
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
<?php endif; ?>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
