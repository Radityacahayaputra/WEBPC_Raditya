<!-- Button trigger modal -->
<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/button.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tambah.css'); ?>">
</head>

<div class="row mt-3">
    <div class="col-mt-4">
        <form action="" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari data komponen..." name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Table Produk -->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Kode</th>
            <th scope="col">Merek</th>
            <th scope="col">Tipe</th>
            <th scope="col">Harga</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Gambar</th>
            <!--<th scope="col">Action</th>-->
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
                <!--<td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $prd['id']; ?>">Ubah</button>
                    <a href="<?= base_url('produk/hapus/' . $prd['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">Hapus</a>
                </td>-->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
                    </div>