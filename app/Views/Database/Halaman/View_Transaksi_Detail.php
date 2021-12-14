<!-- Konten -->
<div class="container Konten">

    <form class="form-inline">
        <span class="Judul-Halaman">
            <p>Detail Transaksi</p>
        </span>

    </form>

    <!-- Sub Konten -->
    <div class="container Sub-Konten">
        <div class="k1 container"><br>

            <h3>&nbsp;&nbsp;&nbsp;Data Transaksi</h3><br>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ID TRANSAKSI : <?= $ID_TRANSAKSI; ?></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Karywan Kasir : <?= $NAMA_KRY; ?></p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Transaksi : <?= $TGL_TRANSAKSI; ?></p>
            <?php foreach ($Total_Transaksi->getResultArray() as $t_1) : ?>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Jumlah Transaksi : <?= $t_1['total_item']; ?> item</p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total Harga Transaksi : Rp.<?= $t_1['total_pembelian']; ?>,-</p>
            <?php endforeach; ?><br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Detail Pembelian</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">JUMLAH_PEMBELIAN</th>
                        <th scope="col">Harga Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($Transaksi->getResultArray() as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t['ID_DP']; ?></td>
                            <td><?= $t['NAMA_OBAT']; ?></td>
                            <td><?= $t['JUMLAH_PEMBELIAN']; ?> item</td>
                            <td>Rp.<?= $t['HARGA_OBAT']; ?>,-</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="/Database/Transaksi" class="btn btn-primary">Kembali</a><br><br>
        </div>
    </div> <br> <br>



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