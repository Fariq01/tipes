<div class="container mt-4">
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
    <div class="row">
        <div class="col">
            <h3 class="text-center mb-3">List Booking</h3>
            <table id="tableBooking" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Booking</th>
                        <th>Kode Bayar</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Total Harga</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    $('#tableBooking').DataTable({
        "ajax": "<?= base_url('booking/list') ?>",
        "columns": [{
                "data": "kode_booking"
            },
            {
                "data": "kode_bayar"
            },
            {
                "data": "nama",
            },
            {
                "data": "email",
            },
            {
                "data": "telepon",
            },
            {
                "data": "total_harga",
            },
            {
                "data": "tanggal_pemesanan",
            },
            {
                "data": "status",
            },
            {
                "data": "id_booking",
                "render": function(data, type, row, meta) {
                    if (type === 'display') {
                        if (row.status == 'Menunggu Pembayaran') {
                            data = '<a href="<?= base_url('booking/lunas'); ?>' + '/' + row.id_booking + '" class="btn btn-secondary">Lunas</a>';
                        } else {
                            data = '';
                        }
                    }
                    return data;
                }
            },
        ]
    })
</script>