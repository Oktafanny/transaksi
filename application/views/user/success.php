<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Checkout Sukses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/admin/production/images/logo2.png'); ?>" type="image/ico" />
    <style>
        body {
            background: url('<?php echo base_url('assets/admin/production/images/pasar.jpg'); ?>') no-repeat center center fixed;
            background-size: cover;
            /* Menambahkan latar belakang gambar yang sama */
        }

        .container {
            background: rgba(255, 255, 255, 0.9); /* Latar belakang transparan dengan lebih tebal */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow untuk kontras */
        }

        .card {
            border-radius: 10px;
            /* Border radius untuk konsistensi dengan halaman login */
        }

        .card-header {
            background: #007bff; /* Warna biru yang lebih cerah */
            color: #fff;
        }

        .btn-primary {
            border-radius: 10px;
            /* Border radius yang sama dengan login button */
        }

        .text-center {
            margin-bottom: 30px;
        }

        /* Styling untuk tabel */
        table {
            background: rgba(255, 255, 255, 0.9); /* Latar belakang tabel transparan */
            border-radius: 10px;
        }

        thead th {
            background: rgba(0, 0, 0, 0.1); /* Latar belakang header tabel lebih gelap */
            color: #333;
        }

        tbody tr {
            border-bottom: 1px solid #ddd; /* Garis pemisah antar baris tabel */
        }

        .btn-primary {
            border-radius: 10px; /* Radius tombol */
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2>Checkout Sukses</h2>
            <p>Terima kasih <strong><?= $customer['nama'] ?></strong> telah berbelanja di toko kami. Pesanan Anda sedang diproses.</p>
        </div>

        <div class="row">
            <!-- Tabel Detail Belanjaan -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Belanjaan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalBelanja = 0;
                                foreach ($items as $item) :
                                    $totalBelanja += $item['total'];
                                ?>
                                    <tr>
                                        <td><?= $item['nama_barang'] ?></td>
                                        <td><?= $item['jumlah'] ?></td>
                                        <td><?= number_format($item['total'], 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach; ?>

                                <!-- Baris Total Bayar -->
                                <tr>
                                    <td colspan="2" class="text-end"><strong>Total Bayar:</strong></td>
                                    <td><strong><?= number_format($totalBelanja, 0, ',', '.') ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tabel Detail Pemesanan -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Pemesanan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <td><?= $customer['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= $customer['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <th>No Telepon</th>
                                    <td><?= $customer['no_telp'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="<?= site_url('user/dashboard2'); ?>" class="btn btn-primary">Kembali ke Dashboard</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
