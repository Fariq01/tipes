<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('home/admin') ?>">Aplikasi Tiket Pesawat (Admin)</a>
        <div class="d-flex">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('home/admin') ?>">Home</a>
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