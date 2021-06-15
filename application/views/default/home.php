<div class="container mt-4">
    <div class="row">
        <div class="col-7">
            <img src="<?= base_url('assets/img/home-booking.jpg') ?>" class="img-fluid" alt="join us">
        </div>
        <div class="col-5 d-flex align-items-center">
            <div class="container">
                <h3 class="text-center mb-3">Booking Tiket</h3>
                <form action="<?= base_url('penerbangan/jadwal') ?>" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputAsalBooking" class="form-label">Asal</label>
                            <input type="text" class="form-control" name="asal" id="inputAsalBooking">
                        </div>
                        <div class="col">
                            <label for="inputAsalTujuan" class="form-label">Tujuan</label>
                            <input type="text" class="form-control" name="tujuan" id="inputAsalTujuan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <label for="inputTanggalBerangkat" class="form-label">Tanggal Berangkat</label>
                            <input type="date" class="form-control" name="tanggal_berangkat" id="inputTanggalBerangkat">
                        </div>
                        <div class="col-5">
                            <label for="inputJumlahPenumpang" class="form-label">Jumlah Penumpang</label>
                            <input type="number" class="form-control" name="jumlah_penumpang" id="inputJumlahPenumpang">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-7">
                            <label for="inputKelas" class="form-label">Kelas</label>
                            <select id="inputKelas" class="form-control" name="id_kelas">
                                <option value="0">Economy</option>
                                <option value="1">Business</option>
                                <option value="2">First Class</option>
                            </select>
                        </div>
                        <div class="col-5 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary flex-fill">Booking</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>