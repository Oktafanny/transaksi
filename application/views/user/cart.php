<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/admin/production/images/logo2.png'); ?>" type="image/ico" />
    <style>
        body {
            background: url('<?php echo base_url('assets/admin/production/images/pasar.jpg'); ?>') no-repeat center center fixed;
            /* Sama dengan halaman Login */
            background-size: cover;
        }

        .container {
            background: rgba(255, 255, 255, 0.8);
            /* Latar belakang transparan untuk kontras */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        .btn-primary {
            border-radius: 10px;
        }

        .btn-success,
        .btn-warning {
            border-radius: 10px;
        }

        .float-end {
            margin-left: 10px;
        }
        table {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }

        thead th {
            background: rgba(0, 0, 0, 0.1); 
            color: #333;
        }

        tbody tr {
            border-bottom: 1px solid #ddd; 
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Keranjang Belanja</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->cart->contents() as $item) : ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['subtotal'] ?></td>
                        <td>
                            <a href="<?= site_url('pemesanan/remove_from_cart/' . $item['rowid']) ?>" 
                            class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= site_url('pemesanan/checkout') ?>" class="btn btn-success">Pesan</a>
        <a href="<?= site_url('user/dashboard2') ?>" class="btn btn-warning float-end">Tambah Barang</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>