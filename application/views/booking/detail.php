<div class="container mt-4">
<h2 class="text-center mb-4">Detail Booking</h2>
    <form action="<?= base_url('booking/pembayaran') ?>" method="post">
        <?php if (!has_login()) { ?>
            <div class="row d-flex justify-content-evenly mb-3">
                <div class="col-4">
                    <h4 class="mb-3">Data Pemesan</h4>
                    <div class="mb-3">
                        <label for="inputNamaPemesan" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="nama_pemesan" id="inputNamaPemesan" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputEmailPemesan" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email_pemesan" id="inputEmailPemesan" required>
                    </div>
                    <div class="mb-5">
                        <label for="inputTeleponPemesan" class="form-label">Telepon</label>
                        <input type="tel" class="form-control" name="telepon_pemesan" id="inputTeleponPemesan" required>
                    </div>
                </div>
                <div class="col-1 d-inline-flex justify-content-center">
                    <span class="border border-dark"></span>
                </div>
                <div class="col-4">
                    <h4 class="mb-3">Data Penumpang</h4>
                    <?php for ($i = 0; $i < $jumlah_penumpang; $i++) { ?>
                        <h5 class="mb-3">Penumpang ke-<?= $i+1 ?></h5>
                        <div class="mb-3">
                            <label for="inputNamaPenumpang" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_penumpang[]" id="inputNamaPenumpang" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputTanggalLahirPenumpang" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir_penumpang[]" id="inputTanggalLahirPenumpang" required>
                        </div>
                    <?php } ?>
                    <div class="d-flex">
                        <input type="hidden" name="id_penerbangan" value="<?= $id_penerbangan ?>">
                        <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                        <input type="hidden" name="harga" value="<?= $harga ?>">
                        <input type="hidden" name="jumlah_penumpang" value="<?= $jumlah_penumpang ?>">
                        <button type="submit" class="btn btn-primary flex-fill">Next</button>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="row d-flex justify-content-center mb-3">
                <div class="col-5">
                    <h4 class="mb-3 text-center">Data Penumpang</h4>
                    <?php for ($i = 0; $i < $jumlah_penumpang; $i++) { ?>
                        <h5 class="mb-3">Penumpang ke-<?= $i+1 ?></h5>
                        <div class="mb-3">
                            <label for="inputNamaPenumpang" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_penumpang[]" id="inputNamaPenumpang" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputTanggalLahirPenumpang" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir_penumpang[]" id="inputTanggalLahirPenumpang" required>
                        </div>
                    <?php } ?>
                    <div class="d-flex">
                        <input type="hidden" name="nama_pemesan" value="<?= $this->session->userdata('nama') ?>">
                        <input type="hidden" name="email_pemesan" value="<?= $this->session->userdata('email') ?>">
                        <input type="hidden" name="telepon_pemesan" value="<?= $this->session->userdata('telepon') ?>">
                        <input type="hidden" name="id_penerbangan" value="<?= $id_penerbangan ?>">
                        <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                        <input type="hidden" name="harga" value="<?= $harga ?>">
                        <input type="hidden" name="jumlah_penumpang" value="<?= $jumlah_penumpang ?>">
                        <button type="submit" class="btn btn-primary flex-fill">Next</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </form>
</div>