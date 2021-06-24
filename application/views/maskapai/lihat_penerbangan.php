<div class="container mt-4">
    <div class="row">
        <div class="col d-flex align-items-center">
            <div class="container " style="width: 50%">
                <?php if ($this->session->flashdata('error_message') != NULL) { ?>
                    <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                        <?= $this->session->flashdata('error_message') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('success_message') != NULL) { ?>
                    <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <?= $this->session->flashdata('success_message') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <h3 class="text-center mb-3">Data Penerbangan</h3>
                <form action="<?= base_url('penerbangan/edit') ?>" method="post">
                    <?php
                    $kota = [
                        'Balikpapan', 'Banda Aceh', 'Bandung', 'Banjarmasin', 'Batam', 'Bengkulu', 'Denpasar', 'Jakarta', 'Jayapura',
                        'Kupang', 'Makassar', 'Manado', 'Medan', 'Padang', 'Palangka', 'Palembang', 'Pekanbaru', 'Pontianak', 'Semarang', 'Surabaya'
                    ];
                    ?>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputAsal" class="form-label">Asal</label>
                            <select id="inputAsal" class="form-control" name="asal">
                                <?php foreach ($kota as $k) { ?>
                                    <?php if ($k != $asal) { ?>
                                        <option value="<?= $k ?>"><?= $k ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $asal ?>" selected><?= $asal ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputTujuan" class="form-label">Tujuan</label>
                            <select id="inputTujuan" class="form-control" name="tujuan">
                                <?php foreach ($kota as $k) { ?>
                                    <?php if ($k != $tujuan) { ?>
                                        <option value="<?= $k ?>"><?= $k ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $tujuan ?>" selected><?= $tujuan ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <label for="inputTanggalBerangkat" class="form-label">Tanggal Berangkat</label>
                            <input type="date" class="form-control" name="tanggal_berangkat" id="inputTanggalBerangkat" value="<?= $tanggal_berangkat ?>">
                        </div>
                        <div class="col-5">
                            <label for="inputWaktuBerangkat" class="form-label">Waktu Berangkat</label>
                            <input type="time" class="form-control" name="waktu_berangkat" id="inputWaktuBerangkat" value="<?= $waktu_berangkat ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <label for="inputKodePesawat" class="form-label">Kode Pesawat</label>
                            <input type="text" class="form-control" name="kode_pesawat" id="inputKodePesawat" value="<?= $kode_pesawat ?>">
                        </div>
                        <div class="col-5">
                            <label for="inputSlot" class="form-label">Slot</label>
                            <input type="number" class="form-control" name="slot" id="inputSlot" value="<?= $slot ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="inputHargaEconomy" class="form-label">Harga Economy</label>
                            <input type="number" class="form-control" name="harga_economy" id="inputHargaEconomy" value="<?= $harga['harga_economy'] ?>">
                        </div>
                        <div class="col-4">
                            <label for="inputHargaBusiness" class="form-label">Harga Business</label>
                            <input type="number" class="form-control" name="harga_business" id="inputHargaBusiness" value="<?= $harga['harga_business'] ?>">
                        </div>
                        <div class="col-4">
                            <label for="inputHargaFirstClass" class="form-label">Harga First Class</label>
                            <input type="number" class="form-control" name="harga_firstclass" id="inputHargaFirstClass" value="<?= $harga['harga_firstclass'] ?>">
                        </div>
                    </div>
                    <input type="hidden" name="id_penerbangan" value="<?= $id_penerbangan; ?>">
                    <button type="submit" class="btn btn-secondary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>