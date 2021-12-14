<!-- Konten -->
<div class="container Konten">

    <form class="form-inline">
        <span class="Judul-Halaman">
            <p>Detail Karyawan</p>
        </span>

    </form>

    <!-- Sub Konten -->
    <div class="container Sub-Konten">
        <!-- Alret Delete -->
        <?php if (session()->getFlashdata('pesan_hapus')) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('pesan_hapus'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan_Update')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Karyawan Berasil Dirubah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <?php foreach ($Karyawan->getResultArray() as $j) : ?>
            <!-- Konten -->
            <div class="container Detail-Karyawan">
                <div class="row">
                    <div class="col-sm-5 Detail-Foto text-center">
                        <img src="<?= base_url('assets/Master/img/kry.jpg'); ?>" class="foto-Karyawan " alt="">
                        <br>
                        <br>
                        <h2><?= $j['NAMA_KRY']; ?></h2>
                        <p class="Jabatan-Karyawan mx-auto d-block"><?= $j['NAMA_JABATAN']; ?></p>
                    </div>
                    <div class="col-sm Detail-Identitas">
                        <div class="container">
                            <br>
                            <h2>Data Diri Karyawan</h2>
                            <br>
                            <p>ID Karyawan : <?= $j['ID_KRY']; ?></p>
                            <p>Nama : <?= $j['NAMA_KRY']; ?></p>
                            <p>No Telp : <?= $j['NO_TELP_KRY']; ?></p>
                            <p>Alamat : <?= $j['ALAMAT_KRY']; ?></p>
                            <p>Jenis Klamin : <?= $j['JK_KRY']; ?></p>
                            <p>Tempat Tanggal Lahir : <?= $j['TEMPAT_LAHIR']; ?>, <?= $j['TGL_LAHIR_KRY']; ?></p>
                            <p>Tanggal Diterima Kerja : <?= $j['TGL_DITERIMA_KERJA']; ?></p>
                            <p>Password : <?= $j['PW_KRY']; ?></p>
                            <br>
                            <div class="row">
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-primary" href="/Database">&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;
                                <div class="btn btn-primary" data-toggle="modal" data-target="#UpdateKaryawan">&nbsp;&nbsp;Update&nbsp;&nbsp;</div>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="/Database/Karyawan/Hapus/<?= $j['ID_KRY']; ?>" onclick="return confirm('Anda Yakin Menghapus Karyawan ( <?= $j['NAMA_KRY']; ?> ) !!!')">&nbsp;&nbsp;Hapus&nbsp;&nbsp;</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Insert -->
                <div class="modal fade bd-example-modal-lg" id="UpdateKaryawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Karyawan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/Database/Karyawan/Update_Karyawan">
                                <?= csrf_field(); ?>
                                <div class="modal-body">
                                    <!-- Input1 -->
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="ID_KRY" class="col-form-label">ID Jabatan : </label>
                                            <input type="text" class="form-control" id="ID_KRY" name="ID_KRY" placeholder="Masukan ID Jabatan" value="<?= $j['ID_KRY']; ?>" readonly="readonly">
                                        </div>
                                        <div class="form-group col-md">
                                            <label for="PW_KRY" class="col-form-label">Password : </label>
                                            <input type="Password" class="form-control" id="PW_KRY" name="PW_KRY" placeholder="Masukan Password" value="<?= $j['PW_KRY']; ?>" required>
                                        </div>
                                    </div>
                                    <!-- Baris 2 -->
                                    <!-- Nama -->
                                    <div class="form-row">
                                        <div class="form-group col-md">
                                            <label for="NAMA_KRY" class="col-form-label">Nama : </label>
                                            <input type="text" class="form-control" id="NAMA_KRY" name="NAMA_KRY" placeholder="Masukan Nama" value="<?= $j['NAMA_KRY']; ?>" required>
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
                                            <input type="text" class="form-control" id="NO_TELP_KRY" name="NO_TELP_KRY" placeholder="Masukan No.Telp" value="<?= $j['NO_TELP_KRY']; ?>" required>
                                        </div>
                                        <!-- Alamat -->
                                        <div class="form-group col-md">
                                            <label for="ALAMAT_KRY" class="col-form-label">Alamat : </label>
                                            <input type="text" class="form-control" id="ALAMAT_KRY" name="ALAMAT_KRY" placeholder="Masukan Alamat" value="<?= $j['ALAMAT_KRY']; ?>" required>
                                        </div>
                                    </div>
                                    <!-- Baris 4 -->
                                    <div class="form-row">
                                        <!-- Tempat Lahir -->
                                        <div class="form-group col-md">
                                            <label for="TEMPAT_LAHIR" class="col-form-label">Tempat Lahir : </label>
                                            <input type="text" class="form-control" id="TEMPAT_LAHIR" name="TEMPAT_LAHIR" placeholder="Masukan Kota Lahir" value="<?= $j['TEMPAT_LAHIR']; ?>" required>
                                        </div>
                                        <!-- TGL-Lahir -->
                                        <div class=" form-group col-md">
                                            <label for="TGL_LAHIR_KRY" class="col-form-label">Tanggal Lahir : </label>
                                            <input type="date" class="form-control" id="TGL_LAHIR_KRY" name="TGL_LAHIR_KRY" value="<?= $j['TGL_LAHIR_KRY']; ?>" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Input Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>


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