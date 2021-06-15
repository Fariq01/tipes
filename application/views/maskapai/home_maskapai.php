<div class="container mt-4">
    <div class="row">
        <div class="col">
            <table id="tablePenerbangan" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Kode Pesawat</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Tanggal Berangkat</th>
                        <th>Waktu Berangkat</th>
                        <th>Slot Economy</th>
                        <th>Slot Business</th>
                        <th>Slot First Class</th>
                        <th></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<script>
    $('#tablePenerbangan').DataTable({
        "ajax": "<?= base_url('penerbangan/list') ?>",
        "columns": [{
                "data": "kode_pesawat"
            },
            {
                "data": "asal"
            },
            {
                "data": "tujuan",
            },
            {
                "data": "tanggal_berangkat",
            },
            {
                "data": "waktu_berangkat",
            },
            {
                "data": "slot_economy",
            },
            {
                "data": "slot_business",
            },
            {
                "data": "slot_firstclass",
            },
            {
                "data": "id_penerbangan",
                "render": function(data, type, row, meta) {
                    if (type === 'display') {
                        data = '<a href="<?= base_url('penerbangan/lihat'); ?>' + '/' + row.id_penerbangan + '" class="btn btn-secondary">Edit</a>';
                    }
                    return data;
                }
            },
        ]
    })
</script>
