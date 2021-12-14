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
                        <a class="nav-link link-halaman Konten-Terpilih" href="Database">Karyawan</a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link link-halaman" href="/Database/Obat">Obat</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link link-halaman" href="/Database/Transaksi">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sub Konten -->
    <div class="container Sub-Konten">
        <p class="Judul-Sub-Konten">Karyawan
            <button type="button" data-toggle="modal" data-target="#InsertKaryawan" class="btn Insert-Data">&nbsp;&nbsp;Insert &nbsp;&nbsp;</button>
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
                    <th scope="col">Id Karyawan</th>
                    <th scope="col">Nama Karyawan</th>
                    <th scope="col">Nama Bagian</th>
                    <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($Karyawan->getResultArray() as $j) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $j['ID_KRY']; ?></td>
                        <td><?= $j['NAMA_KRY']; ?></td>
                        <td><?= $j['NAMA_JABATAN']; ?></td>
                        <td>
                            <!-- <a href="/Master/Jabatan/Hapus/<?= $j['ID_KRY']; ?>" onclick="return confirm('Anda Yakin Menghapus Jabatan ( <?= $j['NAMA_KRY']; ?> ) !!!')">
                                <img src="<?= base_url('assets/Master/img/Normal/delete.png'); ?>" class="Icon-Hapus" alt="">
                            </a> -->
                            <a class="btn Detail-Data" href="/Database/Karyawan/Detail/<?= $j['ID_KRY']; ?>">&nbsp;&nbsp;Detail&nbsp;&nbsp;</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Fungsi -->
<!-- Insert -->
<div class="modal fade bd-example-modal-lg" id="InsertKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Data Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/Database/Karyawan/Save">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <!-- Input1 -->
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="ID_KRY" class="col-form-label">ID Karyawan : </label>
                            <input type="text" class="form-control" id="ID_KRY" name="ID_KRY" placeholder="Masukan ID Jabatan" value="kry<?= $Jumlah_Karyawan + rand(0, 100000); ?>" readonly="readonly">
                        </div>
                        <div class="form-group col-md">
                            <label for="PW_KRY" class="col-form-label">Password : </label>
                            <input type="Password" class="form-control" id="PW_KRY" name="PW_KRY" placeholder="Masukan Password" required>
                        </div>
                    </div>
                    <!-- Baris 2 -->
                    <!-- Nama -->
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="NAMA_KRY" class="col-form-label">Nama : </label>
                            <input type="text" class="form-control" id="NAMA_KRY" name="NAMA_KRY" placeholder="Masukan Nama" required>
                        </div>
                        <!-- Jenis Klamin -->
                        <div class="form-group col-md-3">
                            <label for="ID_JABATAN" class="col-form-label">Jenis Kelamin : </label>
                            <select class="custom-select" id="JK" name="JK">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <!-- Jabatan -->
                        <div class="form-group col-md-3">
                            <label for="JABATAN_KRY" class="col-form-label">Bagian Jabatan :</label>
                            <select class="custom-select" id="JABATAN_KRY" name="JABATAN_KRY">
                                <?php foreach ($Jabatan->getResultArray() as $i) : ?>
                                    <option value="<?= $i['KODE_JABATAN']; ?>"><?= $i['NAMA_JABATAN']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- Baris 3 -->
                    <div class="form-row">
                        <!-- NO.Telp -->
                        <div class="form-group col-md">
                            <label for="NO_TELP_KRY" class="col-form-label">No Telp : </label>
                            <input type="number" class="form-control" id="NO_TELP_KRY" name="NO_TELP_KRY" placeholder="Masukan No.Telp" required>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group col-md">
                            <label for="ALAMAT_KRY" class="col-form-label">Alamat : </label>
                            <input type="text" class="form-control" id="ALAMAT_KRY" name="ALAMAT_KRY" placeholder="Masukan Alamat" required>
                        </div>
                    </div>
                    <!-- Baris 4 -->
                    <div class=" form-row">
                        <!-- Tempat Lahir -->
                        <div class="form-group col-md">
                            <label for="TEMPAT_LAHIR" class="col-form-label">Tempat Lahir : </label>
                            <input type="text" class="form-control" id="TEMPAT_LAHIR" name="TEMPAT_LAHIR" placeholder="Masukan Kota Lahir" required>
                        </div>
                        <!-- TGL-Lahir -->
                        <div class=" form-group col-md">
                            <label for="TGL_LAHIR_KRY" class="col-form-label">Tanggal Lahir : </label>
                            <input type="date" class="form-control" id="TGL_LAHIR_KRY" name="TGL_LAHIR_KRY" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Input Data</button>
                </div>
            </form>
        </div>
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