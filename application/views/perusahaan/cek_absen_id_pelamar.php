<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-5 text-center">
        <div class="row">
            <div class="col-md mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-uppercase font-weight-bolder">ID PELAMAR <br> <?= $pelamar['id_pelamar_perusahaan']; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-uppercase font-weight-bolder">nama PELAMAR <br> <?= $pelamar['nama_pelamar']; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-uppercase font-weight-bolder">ASAL SEKOLAH <br> <?= $pelamar['asal_sekolah']; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md mt-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-uppercase font-weight-bolder">PERUSAHAAN <br> <?= $pelamar['nama_perusahaan']; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <form action="<?= base_url() ?>Cekabsen/simpanAbsen" method="post">
            <div class="form-group">
                <input type="text" class="form-control" value="<?= $pelamar['id_pelamar_perusahaan']; ?>" name="id_pelamar_perusahaan" hidden>
            </div>
            <button type="submit" class="btn btn-primary text-uppercase font-weight-bolder">ABSEN</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

</body>

</html>