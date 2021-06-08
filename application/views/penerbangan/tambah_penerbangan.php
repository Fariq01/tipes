<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>Selamat datang di Halaman Maskapai</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Tiket Pesawat (Maskapai)</a>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('penerbangan/tambah') ?>">Tambah Penerbangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger ms-2" href="<?= base_url('user/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col d-flex align-items-center">
                <div class="container " style="width: 50%">
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
                    <h3 class="text-center mb-3">Tambah Penerbangan</h3>
                    <form action="<?= base_url('penerbangan/tambah') ?>" method="post">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputAsal" class="form-label">Asal</label>
                                <input type="text" class="form-control" name="asal" id="inputAsal">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputTujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" id="inputTujuan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-7">
                                <label for="inputTanggalBerangkat" class="form-label">Tanggal Berangkat</label>
                                <input type="date" class="form-control" name="tanggal_berangkat" id="inputTanggalBerangkat">
                            </div>
                            <div class="col-5">
                                <label for="inputWaktuBerangkat" class="form-label">Waktu Berangkat</label>
                                <input type="time" class="form-control" name="waktu_berangkat" id="inputWaktuBerangkat">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-9">
                                <label for="inputKodePesawat" class="form-label">Kode Pesawat</label>
                                <input type="text" class="form-control" name="kode_pesawat" id="inputKodePesawat">
                            </div>
                            <div class="col-3">
                                <label for="inputSlot" class="form-label">Slot</label>
                                <input type="number" class="form-control" name="slot" id="inputSlot">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- DataTables Bundle JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

</body>

</html>