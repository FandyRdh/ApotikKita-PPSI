<!-- Konten -->
<div class="container Konten">
    <div class="Judul-Halaman">
        <p>Stok Obat</p>
    </div>
    <p class="Judul-Sub-Konten">
        Data Obat Tersedia
    </p>
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
                        <h2>Detail Obat</h2>
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
                            <a class="btn btn-primary" href="/Stok_Obat">&nbsp;&nbsp;Kembali&nbsp;&nbsp;</a>
                        </div>
                    </div>
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