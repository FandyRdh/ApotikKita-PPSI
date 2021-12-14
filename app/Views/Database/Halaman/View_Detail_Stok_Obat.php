<!-- urgent -->
<!-- CSS -->
<link href="<?= base_url('assets/Gudang/css/Style_Gudang.css'); ?>" rel="stylesheet">
<!-- Konten -->
<div class="container Konten">
    <div class="Judul-Halaman" style="text-align: left;">
        <p>Detail Obat</p>
    </div>
    <?php if (session()->getFlashdata('pesan_Update')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Obat Berasil Dirubah
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
    <?php foreach ($Obat->getResultArray() as $O) : ?>
        <div class="container Detail-Obat">
            <div class="row">
                <div class="col-sm-5 Detail-Foto text-center">
                    <img src="<?= base_url('assets/Kasir/img/Normal/Obat.png'); ?>" class="foto-Obat" alt="">
                    <br>
                    <br>
                    <h2><?= $O['NAMA_OBAT']; ?></h2>
                    <p class="Kategori-Obat mx-auto d-block"><?= $O['NAMA_KATEGORI']; ?></p>
                </div>
                <div class="col-sm Detail-Data-Obat">
                    <div class="container">
                        <br>
                        <h2>Data Obat</h2>
                        <br>
                        <p>Kode Obat : <?= $O['KODE_OBAT']; ?></p>
                        <p>Nama Obat: <?= $O['NAMA_OBAT']; ?></p>
                        <p>Aturan Peggunaan : <?= $O['ATURAN_PENGGUNAAN']; ?></p>
                        <p>Tanggal Kadaluarsa : <?= $O['TGL_KADALUARSA']; ?></p>
                        <p>Sisa Stok Obat : <?= $O['STOK_OBAT']; ?> </p>
                        <p>Harga : Rp.<?= $O['HARGA_OBAT']; ?>,-</p>
                        <p>Jenis Obat : <?= $O['NAMA_JENIS']; ?></p>
                        <br>
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-primary" href="/Database/Obat">&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a>&nbsp;&nbsp;
                            <div class="btn btn-primary" data-toggle="modal" data-target="#UpdateObat">&nbsp;&nbsp;Ubah&nbsp;&nbsp;</div>&nbsp;&nbsp;
                            <a class="btn btn-danger" href="/Database/Obat/Hapus/<?= $O['KODE_OBAT']; ?>">&nbsp;&nbsp;Hapus&nbsp;&nbsp;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Fungsi -->
        <!-- Insert -->
        <div class="modal fade bd-example-modal-lg" id="UpdateObat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insert Data Obat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/Database/Obat/Update_Obat">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <!-- Input1 -->
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="KODE_OBAT" class="col-form-label">Kode Obat : </label>
                                    <input type="text" class="form-control" id="KODE_OBAT" name="KODE_OBAT" value="<?= $O['KODE_OBAT']; ?>" readonly="readonly">
                                </div>
                                <div class="form-group col-md">
                                    <label for="STOK_OBAT" class="col-form-label">Stok Obat : </label>
                                    <input type="number" class="form-control" id="STOK_OBAT" name="STOK_OBAT" value="<?= $O['STOK_OBAT2']; ?>" step="1" onkeydown="return false">
                                </div>
                            </div>
                            <!-- Baris 2 -->
                            <!-- Nama -->
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label for="NAMA_OBAT" class="col-form-label">Nama Obat : </label>
                                    <input type="text" class="form-control" id="NAMA_OBAT" name="NAMA_OBAT" value="<?= $O['NAMA_OBAT']; ?>" required>
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
                                    <textarea type="text" class="form-control" id="PETUNJUK_PENGGUNAAN" name="PETUNJUK_PENGGUNAAN" required><?= $O['ATURAN_PENGGUNAAN']; ?></textarea>

                                </div>
                            </div>
                            <!-- Baris 5 -->
                            <div class=" form-row">
                                <!-- Tempat Lahir -->
                                <div class="form-group col-md">
                                    <label for="HARGA_OBAT" class="col-form-label">Harga Obat : </label>
                                    <input type="number" class="form-control" id="HARGA_OBAT" name="HARGA_OBAT" placeholder="Masukan harga obat" value="<?= $O['HARGA_OBAT']; ?>" required>
                                </div>
                                <!-- TGL-Lahir -->
                                <div class=" form-group col-md">
                                    <label for="TGL_KADALUARSA" class="col-form-label">Tanggal Kadaluarsa : </label>
                                    <input type="date" class="form-control" id="TGL_KADALUARSA" name="TGL_KADALUARSA" value="<?= $O['TGL_KADALUARSA2']; ?>" required>
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

    <?php endforeach; ?><br><br><br>




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