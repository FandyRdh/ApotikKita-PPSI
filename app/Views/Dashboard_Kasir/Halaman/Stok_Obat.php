<!-- Konten -->
<div class="container Konten">
    <div class="Judul-Halaman">
        <p>Stok Obat</p>
    </div>
    <center>
        <form action="/Stok_Obat/Cari" class="group-cari">
            <?= csrf_field(); ?>
            <div class="input-group">
                <input type="text" class="Input-Search" name="Cari-Obat" id="Cari-Obat" aria-label="" aria-describedby="basic-addon1" placeholder="  Masukan Kode Obat">
                <button class="btn btn-primary Tombol-Search" type="submit">&nbsp;&nbsp;&nbsp;Cari&nbsp;&nbsp;&nbsp; </button>
            </div>
        </form>
    </center>
    <p class="Judul-Sub-Konten">
        Data Obat Tersedia
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
                    <td> <a class="btn Detail-Data" href="/Stok_Obat/Detail/<?= $O['KODE_OBAT']; ?>">&nbsp;&nbsp;Detail&nbsp;&nbsp;</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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