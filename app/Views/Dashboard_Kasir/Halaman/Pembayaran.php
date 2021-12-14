<!-- Konten -->
<div class="container Konten">
    <div class="Judul-Halaman">
        <h1><b>Kasir</b></h1>
    </div>


    <!-- Alret Welcome -->
    <?php if (session()->getFlashdata('pesan_Welcome')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('pesan_Welcome'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="row frame-Pembelian">
        <div class="col-8 Data-Obat">
            <div class="container">
                <p class="Judul">
                    Rincian Pembelian
                </p>
                <div class="data-obat-pembelian">
                    <!-- th tabel -->
                    <b>
                        <div class="row">
                            <div class="col-sm-4 ">
                                Nama Obat
                            </div>
                            <div class="col-sm ">
                                Jumlah
                            </div>
                            <div class="col-sm ">
                                Harga Satuan
                            </div>
                            <div class="col-sm ">
                                Total Harga
                            </div>
                        </div>
                    </b>
                    <br>
                    <!-- o1 -->
                    <?php foreach ($o1->getResultArray() as $O1) : ?>
                        <div class="data-obat-pembelian">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <?= $O1['NAMA_OBAT']; ?>
                                </div>
                                <div class="col-sm ">
                                    <?= $pem_1 ?> Item
                                </div>
                                <div class="col-sm ">
                                    Rp.<?= $O1['HARGA_OBAT']; ?>,-
                                </div>
                                <div class="col-sm ">
                                    Rp.<?= $O1['obat_1']; ?>,-
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- o2 -->
                    <?php foreach ($o2->getResultArray() as $O2) : ?>
                        <div class="data-obat-pembelian">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <?= $O2['NAMA_OBAT']; ?>
                                </div>
                                <div class="col-sm ">
                                    <?= $pem_2 ?> Item
                                </div>
                                <div class="col-sm ">
                                    Rp.<?= $O2['HARGA_OBAT']; ?>,-
                                </div>
                                <div class="col-sm ">
                                    Rp.<?= $O2['obat_2']; ?>,-
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- o3 -->
                    <?php foreach ($o3->getResultArray() as $O3) : ?>
                        <div class="data-obat-pembelian">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <?= $O3['NAMA_OBAT']; ?>
                                </div>
                                <div class="col-sm ">
                                    <?= $pem_3 ?> Item
                                </div>
                                <div class="col-sm ">
                                    Rp.<?= $O3['HARGA_OBAT']; ?>,-
                                </div>
                                <div class="col-sm ">
                                    Rp.<?= $O3['obat_3']; ?>,-
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col Data-Parembelian">
            <div class="container">
                <p class="Judul">
                    Detail Pembelian :
                </p>
                <form action="/Pembelian/Hitung/Save">
                    <?= csrf_field(); ?>
                    <!-- Id Transaksi -->
                    <label for="exampleInputEmail1" class="form-label">ID Transaksi</label>
                    <input type="email" class="form-control" id="ID_Tra" name="ID_Tra" readonly="readonly" value="<?= $id_transaksi ?>">

                    <label for="exampleInputEmail1" class="form-label">Tagihan Pembayaran</label>
                    <input type="number" name="Tagihan" id="Tagihan" class="form-control" value="<?= $Jum_Tagihan ?>" readonly="readonly">

                    <label for="exampleInputEmail1" class="form-label">Pembayaran</label>
                    <input type="number" name="Pembayaran" id="Pembayaran" class="form-control" onchange="total()">

                    <label for="exampleInputEmail1" class="form-label">Kembalian </label>
                    <input type="number" name="Kembalian" id="Kembalian" class="form-control" readonly="readonly">
                    <br>
                    <!-- as -->
                    <?php foreach ($o1->getResultArray() as $O1) : ?>
                        <input type="Hidden" name="kd_obt_1" value="<?= $O1['KODE_OBAT']; ?>" id="kd_obt_1" class="form-control" readonly="readonly">
                        <input type="Hidden" name="jm_obt_1" value="<?= $pem_1 ?>" id="jm_obt_1" class="form-control" readonly="readonly">
                    <?php endforeach; ?>
                    <?php foreach ($o2->getResultArray() as $o2) : ?>
                        <input type="Hidden" name="kd_obt_2" value="<?= $o2['KODE_OBAT']; ?>" id="kd_obt_2" class="form-control" readonly="readonly">
                        <input type="Hidden" name="jm_obt_2" value="<?= $pem_2 ?>" id="jm_obt_2" class="form-control" readonly="readonly">
                    <?php endforeach; ?>
                    <?php foreach ($o3->getResultArray() as $O3) : ?>
                        <input type="Hidden" name="kd_obt_3" value="<?= $O3['KODE_OBAT']; ?>" id="kd_obt_3" class="form-control" readonly="readonly">
                        <input type="Hidden" name="jm_obt_3" value="<?= $pem_3 ?>" id="jm_obt_3" class="form-control" readonly="readonly">
                    <?php endforeach; ?>


                    <button type="submit" class="btn btn-primary">Bayar</button>
                    <div class="btn btn-primary" onclick="history.back()">Kembali</div>
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br>


    <script type=" text/javascript">
        function total() {
            var Tagihan = document.getElementById('Tagihan').value;
            var Pembayaran = document.getElementById('Pembayaran').value;
            var kembali = Pembayaran - Tagihan;
            document.getElementById('Kembalian').value = kembali;
        }

        function v1() {
            document.getElementById('Kembalian').value = 2000;
        }
    </script> <!-- Optional JavaScript; choose one of the two! -->

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