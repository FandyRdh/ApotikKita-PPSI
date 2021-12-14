<!-- Konten -->
<div class="container Konten">

    <form class="form-inline">
        <span class="Judul-Halaman">
            <p>Database</p>
        </span>
        <div class="form-group mx-sm-3 mb-2 ">
            <input type="text" class="form-control Input-Search-Db" id="inputSearch" placeholder="Masukan ID ">
        </div>
        <button type="submit" class="btn  mb-2 tombol">&nbsp;&nbsp;Cari&nbsp;&nbsp;</button>

    </form>

    <nav class="navbar navbar-expand-lg navbar-light navbar-Konten">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav btn-Konten">
                    <li class="nav-item active">
                        <a class="nav-link link-halaman" href="/Database">Karyawan</a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link link-halaman" href="/Database/Obat">Obat</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link link-halaman Konten-Terpilih" href="/Database/Transaksi">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sub Konten -->
    <div class="container Sub-Konten">
        <p class="Judul-Sub-Konten">Transaksi
            <!-- <button type="button" data-toggle="modal" data-target="#InsertKaryawan" class="btn Insert-Data">&nbsp;&nbsp;Insert &nbsp;&nbsp;</button> -->
        </p>
        <!-- Alret Insert -->
        <?php if (session()->getFlashdata('pesan_insert')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Karyawan Berasil Ditambahkan
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <!-- Alret Delete -->
        <?php if (session()->getFlashdata('pesan_hapus')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('pesan_hapus'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id Transaksi</th>
                    <th scope="col">Nama Karyawan Kasir</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($Transaksi->getResultArray() as $t) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $t['ID_TRANSAKSI']; ?></td>
                        <td><?= $t['NAMA_KRY']; ?></td>
                        <td><?= $t['TGL_TRANSAKSI']; ?></td>
                        <td>
                            <a class="btn Detail-Data" href="/Database/Transaksi/Detail/<?= $t['ID_TRANSAKSI']; ?>">&nbsp;&nbsp;Detail&nbsp;&nbsp;</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>











<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>