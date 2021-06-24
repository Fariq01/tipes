<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h3 class="text-center mb-3">Booking History</h3>
            <table id="tableBooking" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Booking</th>
                        <th>Kode Bayar</th>
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
        "ajax": "<?= base_url('booking/list_history') ?>",
        "columns": [{
                "data": "kode_booking"
            },
            {
                "data": "kode_bayar"
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
                "data": "kode_bayar",
                "render": function(data, type, row, meta) {
                    if (type === 'display') {
                        data = '<a href="<?= base_url('booking/info'); ?>' + '/' + row.kode_booking + '" class="btn btn-secondary">Lihat</a>';
                    }
                    return data;
                }
            },
        ]
    })
</script>