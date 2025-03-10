<?php
include 'koneksi.php';
include 'session.php';

if(isset($_POST['bukti'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM data WHERE userid='$id'");
    $res = mysqli_fetch_assoc($sql);
    $namalengkap = $res['nama'];
    $bukti = 'bukti_pembayaran_'.$namalengkap;
    $nama_bukti = $_FILES['bukti']['name'];
    $extension = pathinfo($nama_bukti, PATHINFO_EXTENSION);
    $ukuran_bukti = $_FILES['bukti']['size'];
    $tipe_bukti = $_FILES['bukti']['type'];
    $tmp_file = $_FILES['bukti']['tmp_name'];
    $path_bukti = "files/bukti/".$bukti.'.'.$extension;

    if($tipe_bukti == "image/jpg" || $tipe_bukti == "image/png"){
        $upload = move_uploaded_file($tmp_file, $path_bukti);

        if($upload) {
            $set = mysqli_query($con, "UPDATE data SET bukti='$path_bukti' WHERE userid='$id'");
            
            if($set){
                echo "<script>alert('Data Berhasil dimasukkan ke Server!')</script>";
                header("Location: admin.php");
                exit();
            } else {
                echo "<script>alert('Terjadi kesalahan. Coba lagi nanti.')</script>";
            }
        } else {
            echo "<script>alert('Terjadi error saat mengupload gambar. Coba lagi nanti.')</script>";
        }
    } else {
        echo "<script>alert('Maaf, Format file tidak sesuai. Gunakan format JPG.')</script>";
    }
}
?>