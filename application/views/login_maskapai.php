<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Login Maskapai</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-7">
                <img src="<?= base_url('assets/img/login-maskapai.jpg') ?>" class="img-fluid" alt="login admin">
            </div>
            <div class="col-5 d-flex align-items-center">
                <div class="container">
                    <?php if ($this->session->flashdata('error_message') != NULL) { ?>
                        <div class="alert alert-danger mb-3" role="alert">
                            <?= $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php } ?>
                    <h3 class="text-center">Login Maskapai</h3>
                    <form action="<?= base_url('user/login_maskapai') ?>" method="post">
                        <div class="mb-3">
                            <label for="inputEmailLogin" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="inputEmailLogin">
                        </div>
                        <div class="mb-3">
                            <label for="InputPasswordLogin" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="InputPasswordLogin">
                        </div>
                        <button type="submit" class="btn btn-primary float-end">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>