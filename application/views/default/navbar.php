<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url() ?>">Aplikasi Tiket Pesawat</a>
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
