<div class="container mt-4" style="width: 800px;">
    <h2 class="text-center mb-4">Cek Booking</h2>
    <?php if ($this->session->flashdata('error_message') != NULL) { ?>
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <?= $this->session->flashdata('error_message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <form action="<?= base_url('booking') ?>" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="input_kode_booking" placeholder="Kode Booking">
            <a class="btn btn-outline-secondary" id="cek_booking" href="">Cek</a>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $('#input_kode_booking').change(function() {
            var kode_booking = $('#input_kode_booking').val();
            $('#cek_booking').attr('href', '<?= base_url('booking/info/') ?>'+kode_booking);
        });
    });
</script>