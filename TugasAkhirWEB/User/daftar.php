<?php
include 'conn.php';
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Daftar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="mx-0 px-0">
        <nav class="navbar position-sticky default-layout-navbar col-lg-12 col-12 shadow-sm p-3 mb-0 bg-body rounded">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand" style="color: black;">
                    TOKO BUKU
                    <img src="https://th.bing.com/th/id/OIP.5AIBiqVoTNtQIOGzVOeEJwHaFO?w=256&h=180&c=7&r=0&o=5&dpr=2&pid=1.7" alt="" width="30" height="24" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
    </div>
    <section class="position-relative">
        <div class="panel panel-default position-absolute bg-light" style="padding: 50px 40px 60px 40px; width: 400px; top: 50px; left: 100px; z-index: 1; border-radius: 30px">
            <div class="panel-heading">
                <h4 class="panel-title text-center" style="margin-bottom: 50px; letter-spacing: 3px;">DAFTAR PELANGGAN</h4>
            </div>
            <div class="panel-body">
                <form method="post">
                    <div class="form-group">
                        <label for="">Input Email</label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Input Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">Input Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="">Input Nomor Telefon</label>
                        <input type="text" class="form-control" name="telephone">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Simpan" class="form-control btn-primary" name="telephone">
                    </div>
                </form>
            </div>
        </div>
        <div class="" id="wallpaper"></div>
    </section>


</body>

<style>
    #wallpaper {
        width: 100vw;
        height: 90vh;
        background-image: url("https://cdn.idntimes.com/content-images/post/20170124/12th-strand-3-4ad971a5d031d7e0cca285c537a48199.jpg");
        background-size: cover;
        opacity: 0.6;
    }
</style>

</html>
<?php
if (isset($_POST['submit'])) {


    $sql = mysqli_query($conn, "INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telephone]')") or die(mysqli_error($conn));

    echo "<script>alert('anda sukses mendaftar');</script>";
    echo "<script>location = 'login.php';</script>";
}
?>