<div class="container mt-4">
    <div class="row">
        <div class="col d-flex align-items-center">
            <div class="container " style="width: 50%">
                <?php if ($this->session->flashdata('error_message') != NULL) { ?>
                    <div class="alert alert-danger mb-3" role="alert">
                        <?= $this->session->flashdata('error_message'); ?>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('success_message') != NULL) { ?>
                    <div class="alert alert-success mb-3" role="alert">
                        <?= $this->session->flashdata('success_message'); ?>
                    </div>
                <?php } ?>
                <h3 class="text-center mb-3">Tambah Penerbangan</h3>
                <form action="<?= base_url('penerbangan/tambah') ?>" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputAsal" class="form-label">Asal</label>
                            <input type="text" class="form-control" name="asal" id="inputAsal">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputTujuan" class="form-label">Tujuan</label>
                            <input type="text" class="form-control" name="tujuan" id="inputTujuan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <label for="inputTanggalBerangkat" class="form-label">Tanggal Berangkat</label>
                            <input type="date" class="form-control" name="tanggal_berangkat" id="inputTanggalBerangkat">
                        </div>
                        <div class="col-5">
                            <label for="inputWaktuBerangkat" class="form-label">Waktu Berangkat</label>
                            <input type="time" class="form-control" name="waktu_berangkat" id="inputWaktuBerangkat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputKodePesawat" class="form-label">Kode Pesawat</label>
                            <input type="text" class="form-control" name="kode_pesawat" id="inputKodePesawat">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="inputSlotEconomy" class="form-label">Slot Economy</label>
                            <input type="number" class="form-control" name="slot_economy" id="inputSlotEconomy">
                        </div>
                        <div class="col-4">
                            <label for="inputSlotBusiness" class="form-label">Slot Business</label>
                            <input type="number" class="form-control" name="slot_business" id="inputSlotBusiness">
                        </div>
                        <div class="col-4">
                            <label for="inputSlotFirstClass" class="form-label">Slot First Class</label>
                            <input type="number" class="form-control" name="slot_firstclass" id="inputSlotFirstClass">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
