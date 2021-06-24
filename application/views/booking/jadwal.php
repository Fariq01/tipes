<div class="container mt-4" style="width: 800px;">
    <h2 class="text-center mb-4">Jadwal Penerbangan</h2>
    <?php foreach ($jadwal as $row) { ?>
        <div class="card mb-2">
            <div class="card-body">
                <div class="container">
                    <form action="<?= base_url('booking/detail') ?>" method="post">
                        <div class="row">
                            <div class="col-2">
                                <p><i class="fas fa-plane"></i>&nbsp;<?= $row['nama_maskapai'] ?></p>
                            </div>
                            <div class="col-5">
                                <p class="text-center"><i class="fas fa-plane-departure"></i>&nbsp;&nbsp;<?= $row['asal'] ?>&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-circle-right"></i>&nbsp;&nbsp;&nbsp;<i class="fas fa-plane-arrival"></i>&nbsp;&nbsp;<?= $row['tujuan'] ?></p>
                            </div>
                            <div class="col-2">
                                <p class="text-center"><i class="fas fa-clock"></i> <?= date("H:i", strtotime($row['waktu_berangkat'])) ?></p>
                            </div>
                            <div class="col-3">
                                <p class="d-inline">Rp. <?= $row['harga'] ?></p>
                                <input type="hidden" name="id_penerbangan" value="<?= $row['id_penerbangan'] ?>">
                                <input type="hidden" name="id_kelas" value="<?= $row['id_kelas'] ?>">
                                <input type="hidden" name="harga" value="<?= $row['harga'] ?>">
                                <input type="hidden" name="jumlah_penumpang" value="<?= $jumlah_penumpang ?>">
                                <button type="submit" class="btn btn-primary float-end">Pilih</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>