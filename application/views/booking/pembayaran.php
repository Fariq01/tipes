<div class="container mt-4" style="width: 800px;">
    <h2 class="text-center mb-4">Metode Pembayaran</h2>
    <form action="<?= base_url('booking/proses') ?>" method="post">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="metode_pembayaran" id="radioVirtualAccount" value="Virtual Account" required>
                    <label class="form-check-label" for="radioVirtualAccount">
                        <img src="<?= base_url('assets/img/virtual-account-logo.png') ?>" class="img-fluid" alt="virtual-account" width="200px">
                    </label>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="metode_pembayaran" id="radioBankTransfer" value="Bank Transfer" required>
                    <label class="form-check-label" for="radioBankTransfer">
                        <img src="<?= base_url('assets/img/bank-transfer-logo.png') ?>" class="img-fluid" alt="bank-transfer" width="200px">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="hidden" name="id_penerbangan" value="<?= $id_penerbangan ?>">
                <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
                <input type="hidden" name="harga" value="<?= $harga ?>">
                <input type="hidden" name="nama_pemesan" value="<?= $nama_pemesan ?>">
                <input type="hidden" name="email_pemesan" value="<?= $email_pemesan ?>">
                <input type="hidden" name="telepon_pemesan" value="<?= $telepon_pemesan ?>">
                <input type="hidden" name="jumlah_penumpang" value="<?= $jumlah_penumpang ?>">
                <?php for ($i = 0; $i < $jumlah_penumpang; $i++) { ?>
                    <input type="hidden" name="nama_penumpang[]" value="<?= $nama_penumpang[$i] ?>">
                    <input type="hidden" name="tanggal_lahir_penumpang[]" value="<?= $tanggal_lahir_penumpang[$i] ?>">
                <?php } ?>
                <button type="submit" class="btn btn-primary float-end">Next</button>
            </div>
        </div>
    </form>
</div>