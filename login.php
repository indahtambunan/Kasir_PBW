<?php
    session_start();
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $koneksi = new mysqli("localhost", "root", "", "db_pos");
    if ($_SESSION['admin'] || $_SESSION['kasir']) {
        header("location: index.php");
    }else
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login - TOKO KITA</title>
    <!-- Favicon-->
    <link rel="icon" href="images/shop.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="background-color: #3949ab;">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Toko<b>Kita</b></a>
            <small>Selamat Datang - Silahkan Login Terlebih Dahulu</small>
        </div>
        <div class="card" style="border-radius: 10px; box-shadow: 1px 1px 2px 2px;">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg"><img src="images/shop.png" style="width: 20%;"></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required >
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" name="login" value="Login" class="btn btn-block bg-pink waves-effect">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>

<?php 

    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $login      = $_POST['login'];

    if ($login) {
        $sql = $koneksi->query("select * from user where username='$username' and password='$password'");
        $ketemu = $sql->num_rows;
        $data = $sql->fetch_assoc();

        if ($ketemu >= 1) {
            session_start();

            if ($data['level'] == "admin") {
                $_SESSION['admin'] = $data[id];
                header("location: index.php");

            }else if ($data['level'] == kasir) {
                $_SESSION['kasir'] = $data[id];
                header("location: index.php");
            }            

        }else{
            ?>
            <script type="text/javascript">
                alert("Login Gagal, Silahkan Masukkan Username dan Password Anda dengan Benar");
            </script>
            <?php
        }   
    }
 ?>