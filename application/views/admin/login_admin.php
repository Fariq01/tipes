<div class="container mt-4">
    <div class="row">
        <div class="col-7">
            <img src="<?= base_url('assets/img/login-admin.jpg') ?>" class="img-fluid" alt="login admin">
        </div>
        <div class="col-5 d-flex align-items-center">
            <div class="container">
                <?php if ($this->session->flashdata('error_message') != NULL) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        <?= $this->session->flashdata('error_message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <h3 class="text-center mb-3">Login Admin</h3>
                <form action="<?= base_url('user/login_admin') ?>" method="post">
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