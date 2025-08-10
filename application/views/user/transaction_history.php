<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url('assets/admin/production/images/logo2.png'); ?>" type="image/ico" />
    <style>
        body {
            background: url('<?php echo base_url('assets/admin/production/images/pasar.jpg'); ?>') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            /* Latar belakang transparan dengan lebih tebal */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Shadow untuk kontras */
            margin-top: 5vh;
            /* Penyesuaian margin atas agar konten tidak terlalu melekat ke atas */
        }

        h1 {
            margin-bottom: 1.5rem;
            /* Penyesuaian margin bawah untuk judul */
        }

        .btn-primary {
            border-radius: 10px;
            /* Radius tombol */
        }

        .thead-dark th {
            background: #007bff;
            /* Warna biru yang sama dengan halaman Login */
            color: #fff;
        }

        .badge {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-6">
                <h1>Transaction History</h1>
            </div>
            <div class="col-md-6 d-flex justify-content-end align-items-center">
                <a href="<?php echo site_url('user/dashboard2'); ?>" class="btn btn-primary">Kembali ke Dashboard</a>
            </div>
        </div>
        <?php if (!empty($transactions)) : ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Items</th>
                            <th scope="col">Total Amount</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <td><?php echo $transaction['id_transaksi']; ?></td>
                                <td><?php echo date('d-m-Y H:i:s', strtotime($transaction['tgl_transaksi'])); ?></td>
                                <td>
                                    <ul class="list-unstyled">
                                        <?php foreach ($transaction['items'] as $item) : ?>
                                            <li><?php echo $item['nama_barang']; ?> (<?php echo $item['jumlah']; ?> pcs) - Rp. <?php echo number_format($item['total'], 0, ',', '.'); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>
                                <td>Rp. <?php echo number_format($transaction['totbay'], 0, ',', '.'); ?></td>
                                <td>
                                    <?php
                                    switch ($transaction['status']) {
                                        case 'pending':
                                            echo '<span class="badge bg-warning text-dark">Pending</span>';
                                            break;
                                        case 'selesai':
                                            echo '<span class="badge bg-success text-white">Selesai</span>';
                                            break;
                                        case 'Canceled':
                                            echo '<span class="badge bg-danger text-white">Canceled</span>';
                                            break;
                                        default:
                                            echo '<span class="badge bg-secondary text-white">' . $transaction['status'] . '</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <p class="alert alert-info">No transactions found.</p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>