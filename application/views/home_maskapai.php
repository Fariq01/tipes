<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">

    <title>Selamat datang di Halaman Maskapai</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Tiket Pesawat (Maskapai)</a>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('penerbangan/tambah') ?>">Tambah Penerbangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger ms-2" href="<?= base_url('user/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                            <th>Slot</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- DataTables Bundle JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

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
                    "data": "slot",
                },
                {
                    "data": "id_penerbangan",
                    "render": function(data, type, row, meta){
                        if(type === 'display'){
                            data = '<a href="<?= base_url('penerbangan/lihat'); ?>'+'/'+row.id_penerbangan+'" class="btn btn-secondary">Edit</a>';
                        }
                        return data;
                    }
                }, 
            ]
        })
    </script>
</body>

</html>