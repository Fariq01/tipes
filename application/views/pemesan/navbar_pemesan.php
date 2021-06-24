<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('home/pemesan') ?>">Aplikasi Tiket Pesawat (Pemesan)</a>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('home/pemesan') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('booking/cek') ?>">Cek Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('booking/history') ?>">History</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-danger ms-2" href="<?= base_url('user/logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
