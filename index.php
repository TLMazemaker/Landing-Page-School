<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    if($role=='Admin'){
        header("Location: admin.php");
    }
    else {
        header("location: dashboard.php");
    }
    exit();
}

if(isset($_POST['button'])) {
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    // menyeleksi data user dengan username dan password yang sesuai
    $cariadmin = mysqli_query($con,"select * from admin where username='$username' and password='$password';");
    $cariuser = mysqli_query($con,"select * from user where username='$username' and password='$password';");
    
    // menghitung jumlah data yang ditemukan
    $cekadmin = mysqli_num_rows($cariadmin);
    $cekuser = mysqli_num_rows($cariuser);

    // cek apakah username dan password di temukan pada database
	if($cekadmin > 0){
        //jika admin
        $data = mysqli_fetch_assoc($cariadmin);
 
		// buat session login dan username
		$_SESSION['name'] = $data['username'];
		$_SESSION['role'] = "Admin";
		header("location:admin.php");
 	} else if($cekuser > 0){
        //jika user biasa
        $data = mysqli_fetch_assoc($cariuser);
 
		// buat session login dan username
		$_SESSION['name'] = $data['username'];
		$_SESSION['userid'] = $data['id'];
		$_SESSION['role'] = "User";
		header("location:dashboard.php?id=".$data['id']);
	} else {
        //jika user tidak ditemukan
        echo '<script>alert("Username atau password salah!.")</script>';
	}
}
?>
<html>
    <head>
        <title>Form Penerimaan Siswa Baru</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="assets/styles.css">
        <link rel="shortcut icon" type="image/png" href="img/zion.png">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <img src="img/zion.png">
                <div class="text">
                    <h4>SMA ZION</h4>
                    <p>Sistem Penerimaan Siswa Baru</p>
                </div>
            </div>
            <div class="container">
                <nav class="navbar">
                    <ul class="nav-menu">
                        <li class="nav-item">
                           <a href="#" class="nav-link-a">BERANDA</a>
                        </li>
                        <li class="nav-item">
                           <a href="prosedur.html" class="nav-link">PROSEDUR PENDAFTARAN</a>
                        </li>
                        <li class="nav-item">
                           <a href="persyaratan.html" class="nav-link">PERSYARATAN</a>
                        </li>
                        <li class="nav-item">
                            <a href="biaya.html" class="nav-link">BIAYA</a>
                         </li>
                         <li class="nav-item">
                            <a href="cara.html" class="nav-link">TATA CARA PENGISIAN FORM</a>
                         </li>
                         <li class="nav-item">
                            <a href="pengumuman.html" class="nav-link">PENGUMUMAN</a>
                         </li>
                     </ul>

                     <div class="hamburger">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                     </div>
                </nav>
            </div>
        </div>
        <div class="main">
            <form class="login" action="" method="post">
                <div class="die-input">
                    <div class="der-input">
                        <label for="username">Username</label>
                        <input placeholder="Username" type="text" name="username" autocomplete="off" required>
                    </div>
                    <div class="der-input">
                        <label for="password">Password</label>
                        <input placeholder="Password" type="password" name="password" required>
                    </div>
                    <div class="der-input">
                        <button name="button" type="submit">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script/scripts.js"></script>
    </body>
</html>