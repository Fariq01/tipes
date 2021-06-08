<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Selamat datang di Aplikasi Tipes</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Tiket Pesawat</a>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cek Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success me-2" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="<?= base_url('user/registrasi_pemesan') ?>">Registrasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-7">
                <img src="<?= base_url('assets/img/home-booking.jpg') ?>" class="img-fluid" alt="join us">
            </div>
            <div class="col-5 d-flex align-items-center">
                <div class="container">
                    <h3 class="text-center mb-3">Booking Tiket</h3>
                    <form action="<?= base_url('penerbangan/jadwal') ?>" method="post">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputAsalBooking" class="form-label">Asal</label>
                                <input type="text" class="form-control" name="asal" id="inputAsalBooking">
                            </div>
                            <div class="col">
                                <label for="inputAsalTujuan" class="form-label">Tujuan</label>
                                <input type="text" class="form-control" name="tujuan" id="inputAsalTujuan">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-7">
                                <label for="inputTanggalBerangkat" class="form-label">Tanggal Berangkat</label>
                                <input type="date" class="form-control" name="tanngal_berangkat" id="inputTanggalBerangkat">
                            </div>
                            <div class="col-5">
                                <label for="inputJumlahPenumpang" class="form-label">Jumlah Penumpang</label>
                                <input type="number" class="form-control" name="jumlah_penumpang" id="inputJumlahPenumpang">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-7">
                                <label for="inputKelas" class="form-label">Kelas</label>
                                <select id="inputKelas" class="form-control" name="id_kelas">
                                    <option value="0">Economy</option>
                                    <option value="1">Business</option>
                                    <option value="2">First Class</option>
                                </select>
                            </div>
                            <div class="col-5 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary flex-fill">Booking</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Login Pemesan</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/login_pemesan') ?>" method="post">
                        <div class="mb-3">
                            <label for="inputEmailLogin" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="inputEmailLogin">
                        </div>
                        <div class="mb-3">
                            <label for="InputPasswordLogin" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="InputPasswordLogin">
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>