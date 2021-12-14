<!-- Konten -->
<div class="container Konten">
    <div class="Judul-Halaman">
        <p>Stok Obat</p>
    </div>
    <center>
        <form action="/Gudang/Cari" class="group-cari">
            <?= csrf_field(); ?>
            <div class="input-group">
                <input type="text" class="Input-Search" name="Cari-Obat" id="Cari-Obat" aria-label="" aria-describedby="basic-addon1" placeholder="  Masukan Kode Obat">
                <button class="btn btn-primary Tombol-Search" type="submit">&nbsp;&nbsp;&nbsp;Cari&nbsp;&nbsp;&nbsp; </button>
            </div>
        </form>
    </center>
    <!-- Alret Welcome -->
    <?php if (session()->getFlashdata('pesan_Welcome')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan_Welcome'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- Alret Delete -->
    <?php if (session()->getFlashdata('pesan_hapus')) : ?><br>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan_hapus'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <!-- Alret Insert -->
    <?php if (session()->getFlashdata('pesan_insert')) : ?><br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Obat Berasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <p class="Judul-Sub-Konten">
        Data Obat Tersedia
        <span class="BTN-Insert-obat">
            <button class="btn Detail-Data" data-toggle="modal" data-target="#InsertKaryawan">&nbsp;&nbsp;Insert&nbsp;&nbsp;</button>
        </span>
    </p>
    <!-- table -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Kode Obat</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Stok Obat</th>
                <th scope="col">Harga</th>
                <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Obat->getResultArray() as $O) : ?>
                <tr>
                    <td scope="row"><?= $O['KODE_OBAT']; ?></td>
                    <th><?= $O['NAMA_OBAT']; ?></th>
                    <td><?= $O['STOK_OBAT']; ?></td>
                    <td>Rp.<?= $O['HARGA_OBAT']; ?>,-</td>
                    <td> <a class="btn Detail-Data" href="/Gudang/Detail/<?= $O['KODE_OBAT']; ?>">&nbsp;&nbsp;Detail&nbsp;&nbsp;</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Modal Fungsi -->
<!-- Insert -->
<div class="modal fade bd-example-modal-lg" id="InsertKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Data Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/Gudang/Obat/Save">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <!-- Input1 -->
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="KODE_OBAT" class="col-form-label">Kode Obat : </label>
                            <input type="text" class="form-control" id="KODE_OBAT" name="KODE_OBAT" value="obt<?= $Jumlah_Obat + rand(0, 100000); ?>" readonly="readonly">
                        </div>
                    </div>
                    <!-- Baris 2 -->
                    <!-- Nama -->
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="NAMA_OBAT" class="col-form-label">Nama Obat : </label>
                            <input type="text" class="form-control" id="NAMA_OBAT" name="NAMA_OBAT" required>
                        </div>
                    </div>
                    <!-- Baris 3 -->
                    <div class="form-row">
                        <!-- NO.Telp -->
                        <div class="form-group col-md">
                            <label for="JENIS_OBAT" class="col-form-label">Jenis Obat: </label>
                            <select class="custom-select" id="JENIS_OBAT" name="JENIS_OBAT">
                                <?php foreach ($Jenis_Obat->getResultArray() as $i) : ?>
                                    <option value="<?= $i['KODE_JENIS']; ?>"><?= $i['NAMA_JENIS']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- Alamat -->
                        <div class="form-group col-md">
                            <label for="KATEGORI_OBAT" class="col-form-label">Kategori Obat : </label>
                            <select class="custom-select" id="KATEGORI_OBAT" name="KATEGORI_OBAT">
                                <?php foreach ($Kategori_Obat->getResultArray() as $i) : ?>
                                    <option value="<?= $i['KODE_KATEGORI']; ?>"><?= $i['NAMA_KATEGORI']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- Baris 4 -->
                    <div class=" form-row">
                        <!-- Tempat Lahir -->
                        <div class="form-group col-md">
                            <label for="PETUNJUK_PENGGUNAAN" class="col-form-label">Petunjuk Penggunaan : </label>
                            <textarea type="text" class="form-control" id="PETUNJUK_PENGGUNAAN" name="PETUNJUK_PENGGUNAAN" placeholder="Petunjuk penggunaan" required></textarea>
                        </div>
                    </div>
                    <!-- Baris 5 -->
                    <div class=" form-row">
                        <!-- Tempat Lahir -->
                        <div class="form-group col-md">
                            <label for="HARGA_OBAT" class="col-form-label">Harga Obat : </label>
                            <input type="number" class="form-control" id="HARGA_OBAT" name="HARGA_OBAT" placeholder="Masukan harga obat" required>
                        </div>
                        <!-- TGL-Lahir -->
                        <div class=" form-group col-md">
                            <label for="TGL_KADALUARSA" class="col-form-label">Tanggal Kadaluarsa : </label>
                            <input type="date" class="form-control" id="TGL_KADALUARSA" name="TGL_KADALUARSA" required>
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


<!-- Modal Fungsi
 Insert -->

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