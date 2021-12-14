<!-- Konten -->
<div class="container Konten">

    <form class="form-inline">
        <span class="Judul-Halaman">
            <p>Master</p>
        </span>
        <div class="form-group mx-sm-3 mb-2 ">
            <input type="text" class="form-control Input-Search" id="inputSearch" placeholder="Masukan ID ">
        </div>
        <button type="submit" class="btn  mb-2 tombol">&nbsp;&nbsp;Cari&nbsp;&nbsp;</button>

    </form>

    <nav class="navbar navbar-expand-lg navbar-light navbar-Konten">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav btn-Konten">
                    <li class="nav-item active">
                        <a class="nav-link link-halaman " href="/Master/Jabatan">Jabatan</a>
                    </li>
                    <li class="nav-item active ">
                        <a class="nav-link link-halaman Konten-Terpilih" href="/Master/Kategori">Kategori Obat</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link link-halaman" href="/Master/Jenis">Jenis Obat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sub Konten -->
    <div class="container Sub-Konten">
        <p class="Judul-Sub-Konten">Kategori
            <button type="button" data-toggle="modal" data-target="#InsertJabatan" class="btn Insert-Data">&nbsp;&nbsp;Insert &nbsp;&nbsp;</button>
        </p>
        <!-- Alret Insert -->
        <?php if (session()->getFlashdata('pesan_insert')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Kategori Berasil Ditambahkan
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
                    <th scope="col">Kode Kategori</th>
                    <th scope="col">Nama Kategori Obat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($Kategori as $k) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $k['KODE_KATEGORI']; ?></td>
                        <td><?= $k['NAMA_KATEGORI']; ?></td>
                        <td>
                            <!-- <a href="" data-toggle="modal" data-target="#UpdateJabatan">
                                <img src="<//?= base_url('assets/Master/img/Normal/pencil.png'); ?>" class="Icon-Update" alt="">
                            </a> -->
                            <a href="/Master/Kategori/Hapus/<?= $k['KODE_KATEGORI']; ?>" onclick="return confirm('Anda Yakin Menghapus Kategori obat ( <?= $k['NAMA_KATEGORI']; ?> ) !!!')">
                                <img src="<?= base_url('assets/Master/img/Normal/delete.png'); ?>" class="Icon-Hapus" alt="">
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Fungsi -->
<!-- Insert -->
<div class="modal fade" id="InsertJabatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Data Jabatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/Master/Kategori/Save">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <!-- Input1 -->
                    <div class="form-group">
                        <label for="ID_KATEGORI" class="col-form-label">ID Kategori : </label>
                        <input type="text" class="form-control" id="ID_KATEGORI" name="ID_KATEGORI" placeholder="Masukan ID Kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="NAMA_KATEGORI" class="col-form-label">Nama Kategori:</label>
                        <input type="text" class="form-control" id="NAMA_KATEGORI" name="NAMA_KATEGORI" placeholder="Masukan Nama Kategori" required>
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