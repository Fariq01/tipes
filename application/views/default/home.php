<div class="container mt-4">
    <div class="row">
        <?php if ($this->session->flashdata('error_message') != NULL) { ?>
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <?= $this->session->flashdata('error_message'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div class="col-7">
            <img src="<?= base_url('assets/img/home-booking.jpg') ?>" class="img-fluid" alt="join us">
        </div>
        <div class="col-5 d-flex align-items-center">
            <div class="container">
                <h2 class="text-center mb-3">Booking Tiket</h2>
                <form action="<?= base_url('booking/jadwal') ?>" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputAsalBooking" class="form-label">Asal</label>
                            <select id="inputAsalBooking" class="form-control" name="asal">
                                <option value="Balikpapan">Balikpapan</option>
                                <option value="Banda Aceh">Banda Aceh</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Banjarmasin">Banjarmasin</option>
                                <option value="Batam">Batam</option>
                                <option value="Bengkulu">Bengkulu</option>
                                <option value="Denpasar">Denpasar</option>
                                <option value="Jakarta" selected>Jakarta</option>
                                <option value="Jayapura">Jayapura</option>
                                <option value="Kupang">Kupang</option>
                                <option value="Makassar">Makassar</option>
                                <option value="Manado">Manado</option>
                                <option value="Medan">Medan</option>
                                <option value="Padang">Padang</option>
                                <option value="Palangkaraya">Palangkaraya</option>
                                <option value="Palembang">Palembang</option>
                                <option value="Pekanbaru">Pekanbaru</option>
                                <option value="Pontianak">Pontianak</option>
                                <option value="Semarang">Semarang</option>
                                <option value="Surabaya">Surabaya</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="inputTujuanBooking" class="form-label">Tujuan</label>
                            <select id="inputTujuanBooking" class="form-control" name="tujuan">
                                <option value="Balikpapan">Balikpapan</option>
                                <option value="Banda Aceh">Banda Aceh</option>
                                <option value="Bandung">Bandung</option>
                                <option value="Banjarmasin">Banjarmasin</option>
                                <option value="Batam">Batam</option>
                                <option value="Bengkulu">Bengkulu</option>
                                <option value="Denpasar" selected>Denpasar</option>
                                <option value="Jakarta">Jakarta</option>
                                <option value="Jayapura">Jayapura</option>
                                <option value="Kupang">Kupang</option>
                                <option value="Makassar">Makassar</option>
                                <option value="Manado">Manado</option>
                                <option value="Medan">Medan</option>
                                <option value="Padang">Padang</option>
                                <option value="Palangkaraya">Palangkaraya</option>
                                <option value="Palembang">Palembang</option>
                                <option value="Pekanbaru">Pekanbaru</option>
                                <option value="Pontianak">Pontianak</option>
                                <option value="Semarang">Semarang</option>
                                <option value="Surabaya">Surabaya</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputTanggalBerangkat" class="form-label">Tanggal Berangkat</label>
                            <input type="date" class="form-control" name="tanggal_berangkat" id="inputTanggalBerangkat" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col">
                            <label for="inputKelas" class="form-label">Kelas</label>
                            <select id="inputKelas" class="form-control" name="id_kelas">
                                <option value="1">Economy</option>
                                <option value="2">Business</option>
                                <option value="3">First Class</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputJumlahPenumpang" class="form-label">Jumlah Penumpang</label>
                            <input type="number" class="form-control" name="jumlah_penumpang" id="inputJumlahPenumpang">
                        </div>
                        <div class="col d-flex align-items-end">
                            <button type="submit" class="btn btn-primary flex-fill">Booking</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>