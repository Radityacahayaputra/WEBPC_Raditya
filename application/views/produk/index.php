<!-- Button trigger modal -->
<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/button.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tambah.css'); ?>">
</head>

<div class="row mt-3">
    <div class="col-mt-4">
        <!-- Form pencarian (tetap ada untuk memfilter data jika perlu) -->
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
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($produk)): ?>
            <?php foreach ($produk as $prd): ?>
                <tr>
                    <th scope="row"><?= $prd['kode']; ?></th>
                    <td><?= $prd['merek']; ?></td>
                    <td><?= $prd['tipe']; ?></td>
                    <td><?= number_format($prd['harga'], 2, ',', '.'); ?></td>
                    <td><?= $prd['deskripsi']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Tidak ada data produk ditemukan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
