<?php
include 'session.php';
include 'koneksi.php';

$userid = $_GET['id'];

$cek = mysqli_query($con, "SELECT * FROM data WHERE userid='$userid'");
$result = mysqli_num_rows($cek);

if($result > 0) {
    header("Location: konfirmasi.php?id=".$userid);
}
?>

<html>
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/form.css">
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
                           <a href="<?php echo 'dashboard.php?id='.$userid;?>" class="nav-link">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="nav-link-a">FORM FORMULIR</a>
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
            <p>Pernyataan Persetujuan</p>  
        </div>
        <div class="instruction">
            <br>
            <p class="state">Saya bersedia/menyetujui dan menerima dengan penuh kesadaran untuk mengikuti ketentuan-ketentuan yang telah ditetapkan sebagai berikut:</p>
            <p class="state">1. Tidak keberatan anak saya mengikuti pelajaran Agama Kristen yang diberikan di sekolah, serta mengikuti kerohanian yang diadakan oleh sekolah.</p>
            <p class="state">2. Anak saya akan taat pada tata tertib/peraturan sekolah yang berlaku atau yang dikeluarkan oleh Kepala Sekolah dan Badan Pengurus Yayasan Bukit Zion GKKAUP.</p>
            <p class="state">3. Bersedia dipanggil setiap saat untuk berkonsultasi sehubungan dengan kepentingan anak saya.</p>
            <p class="state">4. Bersedia mengikutkan anak saya dalam setiap kegiatan-kegiatan wajib sekolah (X Retreat, XI Live-in, XII Magang & Studi Lapangan serta kegiatan-kegiatan lainnya).</p>
            <p class="state">5. Setiap siswa/i hanya diberikan kesempatan duduk berturut-turut 2(dua) tahun dalam satu kelas (tingkat).</p>
            <p class="state">6. Uang pembayaran yang sudah dilunasi tidak dikembalikan dengan alasan apapun.</p>
            <p class="state">7. Uang pembayaran pendaftaran murid baru sudah diselesaikan selambat-lambatnya satu bulan sebelum tahun ajaran dimulai, jika tidak maka anak saya dianggap telah membatalkan diri masuk ke sekolah Zion.</p>
            <p class="state">8. Uang sekolah dibayar paling lambat tanggal 10 bulan yang berjalan. Jika terlambat maka saya bersedia menanggung konsekuensi atas keterlambatan pembayaran uang sekolah.</p>
            <p class="state">9. Bersedia menerima kebijakan Yayasan Bukit Zion GKKAUP untuk melakukan penyesuaian uang sekolah minimal Rp50.000,-/tahun demi kelancaran proses belajar mengajar dan peningkatan kualitas pendidikan.</p>
            <p class="state">10. Dihimbau untuk tidak memberikan gratifikasi dalam bentuk apapun kepada guru dan karyawan Sekolah Zion, sesuai dengan Peraturan Yayasan Bukit Zion GKKAUP.</p>
            <br>
            <div class="contain">
                <div class="group">
                    <input type="checkbox" id="setuju" name="setuju" value="1">
                    <label for="setuju">SETUJU</label>
                </div>
                <button id="btn-next" type="submit">Berikutnya</button>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            // Wait for the DOM to be ready
            $(document).ready(function() {
                // Get the "Berikutnya" button element
                var btnNext = $('#btn-next');

                // Add a click event listener to the button
                btnNext.click(function() {
                    // Check if the "SETUJU" checkbox is checked
                    if ($('#setuju').is(':checked')) {
                        // Show an alert if the checkbox is checked
                        window.location.href = '<?php echo "form.php?id=".$userid;?>';
                    }
                    else {
                        alert('Mohon setuju pada Persyaratan Persetujuan yang ada!');
                    }
                });
            });
        </script>
        <script src="script/scripts.js"></script>
    </body>
</html>