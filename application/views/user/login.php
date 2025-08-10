<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta property="og:title" content="Selamat Pagi" />
    <meta property="og:description" content="Masak Apa Hari ini?" />
    <meta property="og:image" content="https://unsplash.com/photos/green-and-red-chili-peppers-n26U2jY5mQE" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <link rel="icon" href="<?php echo base_url('assets/admin/production/images/logo2.png'); ?>" type="image/ico" />
    <title>E - Surya</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('<?php echo base_url('assets/admin/production/images/pasar.jpg'); ?>') no-repeat center center fixed;
            background-size: cover;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            background: rgba(255, 255, 255, 0.8); /* Optional: Slightly transparent background for better contrast */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .login-logo {
            max-width: 100px;
        }

        .login-form {
            flex: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- jumbotron -->
        <div class="login-wrapper">
            <!-- Logo -->
            <img src="<?php echo base_url('assets/admin/production/images/logo2.png'); ?>" alt="Logo" class="login-logo">

            <!-- Login Form -->
            <form method="post" action="<?php echo site_url('user/dashboard/'); ?>" class="login-form">
                <div class="form-group mb-3">
                    <label class="display-6 fw-bold mb-3" for="ID">Login</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                </div>
                <button class="btn btn-primary btn-lg" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>
