<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta property="og:title" content="E-Surya" />
    <meta property="og:description" content="Ingin Berbelanjan Apa Hari Ini?" />
    <meta property="og:image" content="https://cdn.glitch.global/71e49bf7-c262-4705-b19f-2aeb98561be6/diary.jpg?v=1697470658204" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <link rel="icon" href="<?php echo base_url('assets/admin/production/images/logo2.png'); ?>" type="image/ico" />
    <title>E - Surya</title>

    <style>
        body {
            background: url('<?php echo base_url('assets/admin/production/images/pasar.jpg'); ?>') no-repeat center center fixed;
            background-size: cover;
        }

        .p-5 {
            background: rgba(255, 255, 255, 0.8); /* Slightly transparent background for better contrast */
        }

        .btn-success {
            border-radius: 10px;
        }

        .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }

        .card {
            border-radius: 10px;
        }

        .card-body {
            background: rgba(255, 255, 255, 0.9);
        }

        .btn-primary {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <div class="kategori">
                    <h3>Kategori</h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php foreach ($kategori as $index => $kat) : ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link <?= $index === 0 ? 'active' : '' ?>" id="tab-<?= $kat->id_kategori ?>" data-bs-toggle="tab" data-bs-target="#pane-<?= $kat->id_kategori ?>" type="button" role="tab" aria-controls="pane-<?= $kat->id_kategori ?>" aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"><?= $kat->kategori ?></button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <?php foreach ($kategori as $index => $kat) : ?>
                        <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" id="pane-<?= $kat->id_kategori ?>" role="tabpanel" aria-labelledby="tab-<?= $kat->id_kategori ?>">
                            <div class="row mt-4">
                                <?php foreach ($barang as $brg) : ?>
                                    <?php if ($brg->id_kategori == $kat->id_kategori) : ?>
                                        <div class="col-md-4">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $brg->nama_barang ?></h5>
                                                    <p class="card-text">Harga: <?= $brg->harga ?></p>
                                                    <p class="card-text">Stok: <?= $brg->stok ?></p>
                                                    <form action="<?php echo site_url('pemesanan/add_to_cart'); ?>" method="post">
                                                        <div class="mb-3">
                                                            <label for="jumlah-<?= $brg->id_barang ?>" class="form-label">Jumlah</label>
                                                            <input type="number" class="form-control" id="jumlah-<?= $brg->id_barang ?>" name="jumlah" min="1" max="<?= $brg->stok ?>">
                                                        </div>
                                                        <input type="hidden" name="id_barang" value="<?= $brg->id_barang ?>">
                                                        <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-4 text-center">
                    <a href="<?= site_url('user/transaction_history'); ?>" class="btn btn-success btn-lg">Riwayat Transaksi</a>
                    <a href="<?= site_url('user/logout'); ?>" class="btn btn-danger btn-lg">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
