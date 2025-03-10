<?php
error_reporting(0);
include 'koneksi.php';
include 'session.php';
include 'kirim.php';

if($role !== 'User') {
    header("Location: index.php");
}

$userid = $_SESSION['userid'];

$hasil = mysqli_query($con, "SELECT * FROM data WHERE userid='$userid'");
$row = mysqli_fetch_assoc($hasil);

$nama = $row['nama'];
$sekolah = $row['namasekolah'];
$handphone = $row['handphone'];
$bukti = $row['bukti'];
?>
<html>
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/user.css">
        <link rel="shortcut icon" type="image/png" href="img/zion.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-..."> <!-- Replace with the appropriate version and integrity hash for your project -->
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
                           <a href="#" class="nav-link-a">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                           <a href="<?php echo 'formulir.php?id='.$userid;?>" class="nav-link">FORM FORMULIR</a>
                        </li>
                         <li class="nav-item">
                            <a href="logout.php" class="nav-link-b">KELUAR</a>
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
            <p>Halaman Dashboard</p>  
        </div>
        <div class="instruct">
            <br>
            <div class="group">
                <img src="img/user.png">
                <div class="contain">
                    <table border="0">
                        <tr>
                            <td>Bukti Penerimaan Pembayaran</td>
                            <td>:</td>
                            <!--Silahkan ubah file pada tag <a></a>-->
                            <?php
                            if(!empty($bukti)){
                                echo "<td><a href=".$bukti." target='_blank' class='cetak'><i class='far fa-file'></i><span class='button-text'>Cetak Penerimaan Pembayaran</span></a></td>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td><?php echo $nama;?></td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah</td>
                            <td>:</td>
                            <td><?php echo $sekolah;?></td>
                        </tr>
                        <tr>
                            <td>Nomor HP</td>
                            <td>:</td>
                            <td><?php echo $handphone;?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <script src="script/scripts.js"></script>
    </body>
</html>