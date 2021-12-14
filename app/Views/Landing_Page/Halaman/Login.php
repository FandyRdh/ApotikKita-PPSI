<!-- Konten -->
<!-- Wlcome-->
<div class="login">
    <div class="row">
        <!-- carusel -->
        <div class="col-md-6">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <!-- <h1 class="display-4">Fluid jumbotron</h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p> -->
                </div>
            </div>
        </div>
        <!-- Form -->
        <div class="col-md-6 Input-Form">
            <div class="container">
                <!-- icon Login -->
                <p class="Icon-Login"><b>Apotik Kita</b></p>
                <p class="txt-Welcome">Masuk ke akun Anda</p>
                <!-- Alret Gagal Login -->
                <?php if (session()->getFlashdata('pesan_gagal')) : ?><br>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan_gagal'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <!-- form -->
                <form action="/Login/Login_Action">
                    <div class="form-group">
                        <label for="ID_USER">ID Pengguna</label>
                        <input type="text" class="form-control form-box" id="ID_USER" name="ID_USER" aria-describedby="emailHelp" placeholder="Masukan id" required>
                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                    </div>
                    <div class="form-group">
                        <label for="PW_USER">Password</label>
                        <input type="password" class="form-control form-box" name="PW_USER" id="PW_USER" placeholder="Masukan Password" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ingat Password</label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span onclick="myFunction()">
                            <label class="Lupa-Passowrd" for="">Lupa Password?</label>
                        </span>
                    </div><br>
                    <button type="submit" class="btn btn-primary btn-login">Masuk</button>
                </form>

            </div>
        </div>
    </div>
</div>

</div>





<script>
    function myFunction() {
        alert("Silakan Hubungi Admin");
    }
</script>


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