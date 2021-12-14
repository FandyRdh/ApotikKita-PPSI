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
                    Data Obat Tersedia :
                </p>
                <div class="mainframe">
                    <div class="wrapper">

                        <div class="data-obat-pembelian">
                            <!-- th tabel -->
                            <b>
                                <div class="row">
                                    <div class="col-sm-2 ">
                                        ID Obat
                                    </div>
                                    <div class="col-sm-5 ">
                                        Nama Obat
                                    </div>
                                    <div class="col-sm ">
                                        Stok Tersedia
                                    </div>
                                    <div class="col-sm ">
                                        Harga
                                    </div>
                                </div>
                            </b>
                        </div>
                        <div class="allow-scroll">
                            <!-- Table -->
                            <?php foreach ($Obat->getResultArray() as $O) : ?>
                                <div class="data-obat-pembelian">
                                    <div class="row">
                                        <div class="col-sm-2 ">
                                            <?= $O['KODE_OBAT']; ?>
                                        </div>
                                        <div class="col-sm-5 ">
                                            <?= $O['NAMA_OBAT']; ?>
                                        </div>
                                        <div class="col-sm ">
                                            <?= $O['STOK_OBAT']; ?> Item
                                        </div>
                                        <div class="col-sm ">
                                            Rp.<?= $O['HARGA_OBAT']; ?>,-
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col Data-Parembelian">
            <div class="container">
                <p class="Judul">
                    Pembelian :
                </p>
                <form action="/Pembelian/Hitung">
                    <?= csrf_field(); ?>
                    <!-- Id Transaksi -->
                    <label for="exampleInputEmail1" class="form-label">ID Transaksi</label>
                    <input type="email" class="form-control" id="ID_Tra" name="ID_Tra" readonly="readonly" value="tra<?= $JumlahTransaksi + 1 + rand(0, 1000); ?>">
                    <!-- Obat 1 -->
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="Obat-1" class="form-label">Obat 1 :</label>
                            <select class="custom-select" id="Obat-1" name="Obat-1">
                                <option value="">Pilih Obat</option>
                                <?php foreach ($Obat->getResultArray() as $obt1) : ?>
                                    <option value="<?= $obt1['KODE_OBAT']; ?>"><?= $obt1['NAMA_OBAT']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="Jumlah-Pembelian-1" class="form-label">&nbsp;</label>
                            <input type="number" class="form-control" id="Jumlah-Pembelian-1" name="Jumlah-Pembelian-1" placeholder="Qty">
                        </div>
                    </div>
                    <!-- Obat 2 -->
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="Obat-2" class="form-label">Obat 2 :</label>
                            <select class="custom-select" id="Obat-2" name="Obat-2">
                                <option value="">Pilih Obat</option>
                                <?php foreach ($Obat->getResultArray() as $obt1) : ?>
                                    <option value="<?= $obt1['KODE_OBAT']; ?>"><?= $obt1['NAMA_OBAT']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="Jumlah-Pembelian-2" class="form-label">&nbsp;</label>
                            <input type="number" class="form-control" id="Jumlah-Pembelian-2" name="Jumlah-Pembelian-2" placeholder="Qty">
                        </div>
                    </div>
                    <!-- Obat 3 -->
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="Obat-3" class="form-label">Obat 3 :</label>
                            <select class="custom-select" id="Obat-3" name="Obat-3">
                                <option value="">Pilih Obat</option>
                                <?php foreach ($Obat->getResultArray() as $obt1) : ?>
                                    <option value="<?= $obt1['KODE_OBAT']; ?>"><?= $obt1['NAMA_OBAT']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="Jumlah-Pembelian-3" class="form-label">&nbsp;</label>
                            <input type="number" class="form-control" id="Jumlah-Pembelian-3" name="Jumlah-Pembelian-3" placeholder="Qty">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </form>
            </div>
        </div>
    </div>

    <br><br><br><br>






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