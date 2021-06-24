<div class="container mt-4">
    <div class="row">
        <div class="col-8">
            <img src="<?= base_url('assets/img/registrasi-maskapai.jpg') ?>" class="img-fluid" alt="join us">
        </div>
        <div class="col-4 d-flex align-items-center">
            <div class="container">
                <?php if ($this->session->flashdata('error_message') != NULL) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        <?= $this->session->flashdata('error_message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('success_message') != NULL) { ?>
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <?= $this->session->flashdata('success_message'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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