<div class="container mt-4">
    <div class="row">
        <div class="col d-flex align-items-center">
            <div class="container " style="width: 50%">
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
                <h3 class="text-center mb-3">Tambah Penerbangan</h3>
                <form action="<?= base_url('penerbangan/tambah') ?>" method="post">
                    <div class="row mb-3">
                        <div class="col">
                        <label for="inputAsal" class="form-label">Asal</label>
                            <select id="inputAsal" class="form-control" name="asal">
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
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                        <label for="inputTujuan" class="form-label">Tujuan</label>
                            <select id="inputTujuan" class="form-control" name="tujuan">
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
                        <div class="col-7">
                            <label for="inputTanggalBerangkat" class="form-label">Tanggal Berangkat</label>
                            <input type="date" class="form-control" name="tanggal_berangkat" id="inputTanggalBerangkat" value="<?= date('Y-m-d') ?>>
                        </div>
                        <div class="col-5">
                            <label for="inputWaktuBerangkat" class="form-label">Waktu Berangkat</label>
                            <input type="time" class="form-control" name="waktu_berangkat" id="inputWaktuBerangkat" value="<?= date('H:i') ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <label for="inputKodePesawat" class="form-label">Kode Pesawat</label>
                            <input type="text" class="form-control" name="kode_pesawat" id="inputKodePesawat">
                        </div>
                        <div class="col-5">
                            <label for="inputSlot" class="form-label">Slot</label>
                            <input type="number" class="form-control" name="slot" id="inputSlot">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="inputHargaEconomy" class="form-label">Harga Economy</label>
                            <input type="number" class="form-control" name="harga_economy" id="inputHargaEconomy">
                        </div>
                        <div class="col-4">
                            <label for="inputHargaBusiness" class="form-label">Harga Business</label>
                            <input type="number" class="form-control" name="harga_business" id="inputHargaBusiness">
                        </div>
                        <div class="col-4">
                            <label for="inputHargaFirstClass" class="form-label">Harga First Class</label>
                            <input type="number" class="form-control" name="harga_firstclass" id="inputHargaFirstClass">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
