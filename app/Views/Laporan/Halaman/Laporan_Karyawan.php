<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        /* Laporan Seeting */
        @media print {
            .btn-Laporan {
                display: none;
            }

            #debug-icon-link {
                display: none;
            }
        }
    </style>

    <title>Laporan Karywan</title>
</head>

<body>
    <div class="container"><br>
        <Center>
            <h1>Laporan Karyawan</h1>
        </Center>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Jenis Klamin</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Tangal Mulai Kerja</th>
                    <th scope="col">No telp</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($Karyawan->getResultArray() as $O) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $O['NAMA_KRY']; ?></td>
                        <td><?= $O['NAMA_JABATAN']; ?></td>
                        <td><?= $O['JK_KRY']; ?></td>
                        <td><?= $O['Umur']; ?> tahun</td>
                        <td><?= $O['TGL_DITERIMA_KERJA']; ?></td>
                        <td><?= $O['NO_TELP_KRY']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <center class="area-btn">
            <a href="/Laporan" class="btn btn-primary btn-Laporan">Kembali</a>&nbsp;&nbsp;
            <a class="btn btn-primary btn-Laporan" onclick="window.print()">Print</a>
        </center>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>