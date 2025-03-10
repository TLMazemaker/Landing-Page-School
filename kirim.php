<?php

if(isset($_POST['kirim'])) {
    $userid = $_GET['id'];
    $namalengkap = $_POST['nama'];
    $jeniskelamin = $_POST['jk'];
    $nik = $_POST['nik'];
    $tempatlahir = $_POST['tempat'];
    $tanggallahir = $_POST['tanggal'];
    $anakke = $_POST['anak'];
    $saudarakandung = $_POST['kandung'];
    $saudaratiri = $_POST['tiri'];
    $tinggi = $_POST['tinggi'];
    $berat = $_POST['berat'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $jenistinggal = $_POST['jenistinggal'];
    $transportasi = $_POST['transportasi'];
    $agama = $_POST['agama'];
    $no_handphone = $_POST['hp'];

    $asalsekolah = $_POST['asal'];
    $namasekolah = $_POST['namasekolah'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];

    $ibu = $_POST['ibu'];
    $kerjaibu = $_POST['kerjaibu'];
    $pengibu = $_POST['pengibu'];
    $hpibu = $_POST['hpibu'];

    $ayah = $_POST['ayah'];
    $kerjaayah = $_POST['kerjaayah'];
    $pengayah = $_POST['pengayah'];
    $hpayah = $_POST['hpayah'];

    $wali = $_POST['wali'];
    $kerjawali = $_POST['kerjawali'];
    $pengwali = $_POST['pengwali'];
    $hpwali = $_POST['hpwali'];

    $foto = 'foto_'.$namalengkap;
    $semsatu = 'rapor_ganjil_'.$namalengkap;
    $semdua = 'rapor_genap_'.$namalengkap;
    $akta = 'akta_'.$namalengkap;
    $kk = 'kk_'.$namalengkap;
    $ktpayah = 'ktp_ayah_'.$namalengkap;
    $ktpibu = 'ktp_ibu_'.$namalengkap;
    $ktpwali = 'ktp_wali_'.$namalengkap;
    $gkka = 'kartu_gkka_'.$namalengkap;
    $ranking = 'surat_ranking_'.$namalengkap;

    $nama_foto = $_FILES['foto']['name'];
    $nama_semester_satu = $_FILES['semestersatu']['name'];
    $nama_semester_dua = $_FILES['semesterdua']['name'];
    $nama_akta_kelahiran = $_FILES['akta']['name'];
    $nama_kartu_keluarga = $_FILES['kk']['name'];
    $nama_ktp_ayah = $_FILES['ktpayah']['name'];
    $nama_ktp_ibu = $_FILES['ktpibu']['name'];
    $nama_ktp_wali = $_FILES['ktpwali']['name'];
    $nama_gkka = $_FILES['gkka']['name'];
    $nama_surat_ranking = $_FILES['ranking']['name'];

    $extension1 = pathinfo($nama_foto, PATHINFO_EXTENSION);
    $extension2 = pathinfo($nama_semester_satu, PATHINFO_EXTENSION);
    $extension3 = pathinfo($nama_semester_dua, PATHINFO_EXTENSION);
    $extension4 = pathinfo($nama_akta_kelahiran, PATHINFO_EXTENSION);
    $extension5 = pathinfo($nama_kartu_keluarga, PATHINFO_EXTENSION);
    $extension6 = pathinfo($nama_ktp_ayah, PATHINFO_EXTENSION);
    $extension7 = pathinfo($nama_ktp_ibu, PATHINFO_EXTENSION);
    $extension8 = pathinfo($nama_ktp_wali, PATHINFO_EXTENSION);
    $extension9 = pathinfo($nama_gkka, PATHINFO_EXTENSION);
    $extension10 = pathinfo($nama_surat_ranking, PATHINFO_EXTENSION);

    $ukuran_foto = $_FILES['foto']['size'];
    $ukuran_semester_satu = $_FILES['semestersatu']['size'];
    $ukuran_semester_dua = $_FILES['semesterdua']['size'];
    $ukuran_akta_kelahiran = $_FILES['akta']['size'];
    $ukuran_kartu_keluarga = $_FILES['kk']['size'];
    $ukuran_ktp_ayah = $_FILES['ktpayah']['size'];
    $ukuran_ktp_ibu = $_FILES['ktpibu']['size'];
    $ukuran_ktp_wali = $_FILES['ktpwali']['size'];
    $ukuran_gkka = $_FILES['gkka']['size'];
    $ukuran_surat_ranking = $_FILES['ranking']['size'];

    $max_size = 1024 * 1024;

    if($ukuran_foto <= $max_size && $ukuran_semester_satu <= $max_size && $ukuran_semester_dua <= $max_size && $ukuran_akta_kelahiran <= $max_size && $ukuran_kartu_keluarga <= $max_size && $ukuran_ktp_ayah <= $max_size && $ukuran_ktp_ibu <= $max_size) {
        $ukuran_total1 = $ukuran_foto + $ukuran_semester_satu + $ukuran_semester_dua + $ukuran_akta_kelahiran + $ukuran_kartu_keluarga + $ukuran_ktp_ayah + $ukuran_ktp_ibu;
    } else {
        echo "<script>alert('Pastikan semua file berukuran tidak lebih dari 1 MB.')</script>";
    }

    if($ukuran_ktp_wali <= $max_size && $ukuran_gkka <= $max_size && $ukuran_surat_ranking <= $max_size) {
        $ukuran_total2 = $ukuran_ktp_wali + $ukuran_gkka + $ukuran_surat_ranking;   
    } else {
        echo "<script>alert('Pastikan semua file berukuran tidak lebih dari 1 MB.')</script>";
    }

    if($ukuran_total1 && $ukuran_total2) {
        $ukuran_total = $ukuran_total1 + $ukuran_total2;
    }

    $tipe_foto = $_FILES['foto']['type'];
    $tipe_semester_satu = $_FILES['semestersatu']['type'];
    $tipe_semester_dua = $_FILES['semesterdua']['type'];
    $tipe_akta_kelahiran = $_FILES['akta']['type'];
    $tipe_kartu_keluarga = $_FILES['kk']['type'];
    $tipe_ktp_ayah = $_FILES['ktpayah']['type'];
    $tipe_ktp_ibu = $_FILES['ktpibu']['type'];
    $tipe_ktp_wali = $_FILES['ktpwali']['type'];
    $tipe_gkka = $_FILES['gkka']['type'];
    $tipe_surat_ranking = $_FILES['ranking']['type'];

    $tmp_file1 = $_FILES['foto']['tmp_name'];
    $tmp_file2 = $_FILES['semestersatu']['tmp_name'];
    $tmp_file3 = $_FILES['semesterdua']['tmp_name'];
    $tmp_file4 = $_FILES['akta']['tmp_name'];
    $tmp_file5 = $_FILES['kk']['tmp_name'];
    $tmp_file6 = $_FILES['ktpayah']['tmp_name'];
    $tmp_file7 = $_FILES['ktpibu']['tmp_name'];
    $tmp_file8 = $_FILES['ktpwali']['tmp_name'];
    $tmp_file9 = $_FILES['gkka']['tmp_name'];
    $tmp_file10 = $_FILES['ranking']['tmp_name'];

    $path_foto = "files/foto/".$foto.'.'.$extension1;
    $path_semester_satu = "files/semester/ganjil/".$semsatu.'.'.$extension2;
    $path_semester_dua = "files/semester/genap/".$semdua.'.'.$extension3;
    $path_akta = "files/akta/".$akta.'.'.$extension4;
    $path_kk = "files/kk/".$kk.'.'.$extension5;
    $path_ktp_ayah = "files/ktp/ayah/".$ktpayah.'.'.$extension6;
    $path_ktp_ibu = "files/ktp/ibu/".$ktpibu.'.'.$extension7;
    $path_ktp_wali = "files/ktp/wali/".$ktpwali.'.'.$extension8;
    $path_gkka = "files/other/gkka/".$gkka.'.'.$extension9;
    $path_ranking = "files/other/ranking/".$ranking.'.'.$extension10;

    if(($tipe_foto == "image/jpeg" || $tipe_foto == "image/png") && ($tipe_semester_satu == "image/jpeg" || $tipe_semester_satu == "image/png") && ($tipe_semester_dua == "image/jpeg" || $tipe_semester_dua == "image/png") && ($tipe_akta_kelahiran == "image/jpeg" || $tipe_akta_kelahiran == "image/png") && ($tipe_kartu_keluarga == "image/jpeg" || $tipe_kartu_keluarga == "image/png") && ($tipe_ktp_ayah == "image/jpeg" || $tipe_ktp_ayah == "image/png") && ($tipe_ktp_ibu == "image/jpeg" || $tipe_ktp_ibu == "image/png")) {
        if($ukuran_total <= 10 * 1024 * 1024) {
            $upload1 = move_uploaded_file($tmp_file1, $path_foto);
            $upload2 = move_uploaded_file($tmp_file2, $path_semester_satu);
            $upload3 = move_uploaded_file($tmp_file3, $path_semester_dua);
            $upload4 = move_uploaded_file($tmp_file4, $path_akta);
            $upload5 = move_uploaded_file($tmp_file5, $path_kk);
            $upload6 = move_uploaded_file($tmp_file6, $path_ktp_ayah);
            $upload7 = move_uploaded_file($tmp_file7, $path_ktp_ibu);
            $upload8 = move_uploaded_file($tmp_file8, $path_ktp_wali);
            $upload9 = move_uploaded_file($tmp_file9, $path_gkka);
            $upload10 = move_uploaded_file($tmp_file10, $path_ranking);

            if($upload1 && $upload2 && $upload3 && $upload4 && $upload5 && $upload6 && $upload7) {
                $kirim = mysqli_query($con, "INSERT INTO data (userid, nama, jeniskelamin, nik, tempatlahir, tanggallahir, anakke, saudarakandung, saudaratiri, tinggibadan, beratbadan, alamat, rt, rw, jenistinggal, transportasi, agama, handphone, asalsekolah, namasekolah, provinsi, kota, kecamatan, namaibu, kerjaibu, penghasilanibu, hpibu, namaayah, kerjaayah, penghasilanayah, hpayah, namawali, kerjawali, penghasilanwali, hpwali, foto, semestersatu, semesterdua, aktakelahiran, kartukeluarga, ktpayah, ktpibu, ktpwali, gkka, keteranganranking)
                VALUES('$userid','$namalengkap','$jeniskelamin','$nik','$tempatlahir','$tanggallahir','$anakke','$saudarakandung','$saudaratiri','$tinggi','$berat','$alamat','$rt','$rw','$jenistinggal','$transportasi','$agama','$no_handphone','$asalsekolah','$namasekolah','$provinsi','$kota','$kecamatan','$ibu','$kerjaibu','$pengibu','$hpibu','$ayah','$kerjaayah','$pengayah','$hpayah','$wali','$kerjawali','$pengwali','$hpwali','$path_foto','$path_semester_satu','$path_semester_dua','$path_akta', '$path_kk', '$path_ktp_ayah','$path_ktp_ibu','$path_ktp_wali','$path_gkka','$path_ranking')");

                if($kirim) {
                    echo "<script>alert('Data Berhasil dimasukkan ke Server!')</script>";
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "<script>alert('Terjadi kesalahan. Coba lagi nanti.')</script>";
                }
            } else {
                echo "<script>alert('Terjadi error saat mengupload gambar. Coba lagi nanti.')</script>";
            }
        } else {
            echo "<script>alert('Maaf, ukuran gambar terlalu besar. Mohon coba dengan ukuran gambar yang lebih kecil.')</script>";
        }
    } else {
        echo "<script>alert('Maaf, Format gambar tidak sesuai. Gunakan format JPG.')</script>";
    }
}

if(isset($_POST['ubah'])) {
    $id = $_GET['id'];
    $namalengkap = $_POST['nama'];
    $jeniskelamin = $_POST['jk'];
    $nik = $_POST['nik'];
    $tempatlahir = $_POST['tempat'];
    $tanggallahir = $_POST['tanggal'];
    $anakke = $_POST['anak'];
    $saudarakandung = $_POST['kandung'];
    $saudaratiri = $_POST['tiri'];
    $tinggi = $_POST['tinggi'];
    $berat = $_POST['berat'];
    $alamat = $_POST['alamat'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $jenistinggal = $_POST['jenistinggal'];
    $transportasi = $_POST['transportasi'];
    $agama = $_POST['agama'];
    $no_handphone = $_POST['hp'];

    $asalsekolah = $_POST['asal'];
    $namasekolah = $_POST['namasekolah'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];

    $ibu = $_POST['ibu'];
    $kerjaibu = $_POST['kerjaibu'];
    $pengibu = $_POST['pengibu'];
    $hpibu = $_POST['hpibu'];

    $ayah = $_POST['ayah'];
    $kerjaayah = $_POST['kerjaayah'];
    $pengayah = $_POST['pengayah'];
    $hpayah = $_POST['hpayah'];

    $wali = $_POST['wali'];
    $kerjawali = $_POST['kerjawali'];
    $pengwali = $_POST['pengwali'];
    $hpwali = $_POST['hpwali'];

    $update = mysqli_query($con, "UPDATE data SET nama='$namalengkap', jeniskelamin='$jeniskelamin', nik='$nik', tempatlahir='$tempatlahir', tanggallahir='$tanggallahir', anakke='$anakke', saudarakandung='$saudarakandung', saudaratiri='$saudaratiri', tinggibadan='$tinggi', beratbadan='$berat', alamat='$alamat', rt='$rt', rw='$rw', jenistinggal='$jenistinggal', transportasi='$transportasi', agama='$agama', handphone='$no_handphone', asalsekolah='$asalsekolah', namasekolah='$namasekolah', provinsi='$provinsi', kota='$kota', kecamatan='$kecamatan', namaibu='$ibu', kerjaibu='$kerjaibu', penghasilanibu='$pengibu', hpibu='$hpibu', namaayah='$ayah', kerjaayah='$kerjaayah', penghasilanayah='$pengayah', hpayah='$hpayah', namawali='$wali', kerjawali='$kerjawali', penghasilanwali='$pengwali', hpwali='$hpwali' WHERE userid='$id'");
    if($update) {
        echo "<script>alert('Data Berhasil diperbaharui!')</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan. Coba lagi nanti.')</script>";
    }
}

if(isset($_POST['verify'])) {
    $id = $_GET['id'];

    $query = mysqli_query($con, "UPDATE data SET status='Yes' WHERE userid='$id'");

    if($query) {
        echo "<script>alert('Berhasil! Data sudah diverifikasi.')</script>";
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Terjadi kesalahan! Mohon coba lagi nanti.')</script>";
    }
}