<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Selamat datang di Halaman Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Tiket Pesawat (Admin)</a>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/registrasi_admin') ?>">Registrasi Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user/registrasi_maskapai') ?>">Registrasi Maskapai</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="<?= base_url('user/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <img src="<?= base_url('assets/img/registrasi-maskapai.jpg') ?>" class="img-fluid" alt="join us">
            </div>
            <div class="col-4 d-flex align-items-center">
                <div class="container">
                    <?php if ($this->session->flashdata('error_message') != NULL) { ?>
                        <div class="alert alert-danger mb-3" role="alert">
                            <?= $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('success_message') != NULL) { ?>
                        <div class="alert alert-success mb-3" role="alert">
                            <?= $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ?>
                    <h3 class="text-center mb-3">Registrasi Maskapai</h3>
                    <form action="<?= base_url('user/registrasi_maskapai') ?>" method="post">
                        <div class="mb-3">
                            <label for="inputNamaRegistrasi" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" id="inputNamaRegistrasi">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmailRegistrasi" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmailRegistrasi">
                        </div>
                        <div class="mb-3">
                            <label for="inputPasswordRegistrasi" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="inputPasswordRegistrasi">
                        </div>
                        <div class="mb-3">
                            <label for="inputTeleponRegistrasi" class="form-label">Telepon</label>
                            <input type="tel" class="form-control" name="telepon" id="inputTeleponRegistrasi">
                        </div>
                        <button type="submit" class="btn btn-primary">Registrasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>