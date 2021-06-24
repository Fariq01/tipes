<div class="container mt-4">
    <h2 class="text-center mb-4">Info Booking</h2>
    <div class="row mb-3">
        <?php if ($status == 'Menunggu Pembayaran') { ?>
            <?php if ($metode_pembayaran == 'Virtual Account') { ?>
                <div class="alert alert-danger mb-3" role="alert">
                    Silahkan lakukan pembayaran ke Virtual Account dengan Kode Bayar: <b><?= $kode_bayar ?></b>
                </div>
            <?php } else { ?>
                <div class="alert alert-danger mb-3" role="alert">
                    Silahkan lakukan pembayaran ke <b>Bank Tipes - <?= $kode_bayar ?></b>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Booking</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="kode_booking" class="form-label">Kode Booking</label>
                        <input type="text" class="form-control" id="kode_booking" value="<?= $kode_booking ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="kode_bayar" class="form-label">Kode Bayar</label>
                        <input type="text" class="form-control" id="kode_bayar" value="<?= $kode_bayar ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                        <input type="text" class="form-control" id="metode_pembayaran" value="<?= $metode_pembayaran ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="kode_pesawat" class="form-label">Kode Pesawat</label>
                        <input type="text" class="form-control" id="kode_pesawat" value="<?= $tiket[0]['kode_pesawat'] ?>" disabled>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="asal" class="form-label">Asal</label>
                            <input type="text" class="form-control" id="asal" value="<?= $tiket[0]['asal'] ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <input type="text" class="form-control" id="tujuan" value="<?= $tiket[0]['tujuan'] ?>" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="tanggal_berangkat" class="form-label">Tanggal Berangkat</label>
                            <input type="date" class="form-control" id="tanggal_berangkat" value="<?= $tiket[0]['tanggal_berangkat'] ?>" disabled>
                        </div>
                        <div class="col">
                            <label for="waktu_berangkat" class="form-label">Waktu Berangkat</label>
                            <input type="time" class="form-control" id="waktu_berangkat" value="<?= $tiket[0]['waktu_berangkat'] ?>" disabled>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                        <input type="text" class="form-control" id="nama_pemesan" value="<?= $nama ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email_pemesan" class="form-label">Email Pemesan</label>
                        <input type="text" class="form-control" id="email_pemesan" value="<?= $email ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="telepon_pemesan" class="form-label">Telepon Pemesan</label>
                        <input type="text" class="form-control" id="telepon_pemesan" value="<?= $telepon ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="total_harga" class="form-label">Total Harga</label>
                        <input type="number" class="form-control" id="total_harga" value="<?= $total_harga ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pemesanan" class="form-label">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" id="tanggal_pemesanan" value="<?= $tanggal_pemesanan ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" class="form-control" id="status" value="<?= $status ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Tiket</h4>
                </div>
                <div class="card-body">
                    <?php for ($i = 0; $i < count($tiket); $i++) { ?>
                        <h5>Tiket ke-<?= $i + 1 ?></h5>
                        <div class="mb-3">
                            <label for="kode_tiket" class="form-label">Kode Tiket</label>
                            <input type="text" class="form-control" id="kode_tiket" value="<?= $tiket[$i]['kode_tiket'] ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahor" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahor" value="<?= $tiket[$i]['tanggal_lahir'] ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" value="<?= $tiket[$i]['status'] ?>" disabled>
                        </div>
                        <hr />
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>