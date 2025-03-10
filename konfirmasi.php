<?php
include 'koneksi.php';
include 'session.php';
include 'kirim.php';

$userid = $_GET['id'];

$cek = mysqli_query($con, "SELECT * FROM data WHERE userid='$userid'");
$ambil = mysqli_fetch_array($cek);
$status = $ambil['status'];

if($status=='Yes'){
    header("Location: verified.php?id=".$userid);
}
?>

<html>
    <head>
        <title>Konfirmasi Data Calon Siswa</title>
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
                           <a href=<?php echo "dashboard.php?id=".$userid; ?> class="nav-link">DASHBOARD</a>
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
        <div class="mains">
            <p>Biodata Calon Siswa</p>  
        </div>
        <form method="post" class="data" enctype="multipart/form-data">
            <div class="contains">
                <table class="my-table" border="0">
                    <tr>
                        <td><p class="ket">Nama Lengkap</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="nama" type="text" value="<?php echo $ambil['nama']?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Jenis Kelamin</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input type="radio" id="L" name="jk" value="L" <?php if($ambil['jeniskelamin']=='L'){echo 'checked';}?>>
                            <label for="L">Laki-laki</label>
                            <input type="radio" id="P" name="jk" value="P" <?php if($ambil['jeniskelamin']=='P'){echo 'checked';}?>>
                            <label for="P">Perempuan</label></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Nomor Induk Keluarga (NIK)</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="nik" type="number" maxlength="16" value="<?php echo $ambil['nik']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Tempat Lahir</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="tempat" type="text" value="<?php echo $ambil['tempatlahir']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Tanggal Lahir</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="tanggal" type="date" value="<?php echo $ambil['tanggallahir']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Anak Ke Berapa</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="anak" type="number" min="1" max="9" maxlength="1" value="<?php echo $ambil['anakke']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Jumlah Saudara Kandung</p></td>
                        <td><p class="redstar"></p></td>
                        <td><input name="kandung" type="number" max="9" maxlength="1" value="<?php echo $ambil['saudarakandung']; ?>"></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Jumlah Saudara Tiri/Angkat</p></td>
                        <td><p class="redstar"></p></td>
                        <td><input name="tiri" type="number" max="9" maxlength="1" value="<?php echo $ambil['saudaratiri']; ?>"></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Tinggi Badan (cm)</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="tinggi" type="number" min="1" max="300" maxlength="3" value="<?php echo $ambil['tinggibadan']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Berat Badan (kg)</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="berat" type="number" min="1" max="150" maxlength="3" value="<?php echo $ambil['beratbadan']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Alamat Siswa</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="alamat" type="text" value="<?php echo $ambil['alamat']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">RT/RW</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><div class="rtrw">
                            <input name="rt" type="text" value="<?php echo $ambil['rt']; ?>" required>
                            <input name="rw" type="text" value="<?php echo $ambil['rw']; ?>" required></div>
                        </td>
                    </tr>
                    <tr>
                        <td><p class="ket">Jenis Tinggal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><select id="jenistinggal" name="jenistinggal" class="dropdown">
                            <option value="default" disabled>Pilih jenis tinggal</option>
                            <option value="Bersama orang tua" <?php if($ambil['jenistinggal']=='Bersama orang tua'){echo 'selected';} ?>>Bersama orang tua</option>
                            <option value="Wali" <?php if($ambil['jenistinggal']=='Wali'){echo 'selected';} ?>>Wali</option>
                            <option value="Kost" <?php if($ambil['Kost']=='Lainnya'){echo 'selected';} ?>>Kost</option>
                            <option value="Asrama" <?php if($ambil['jenistinggal']=='Asrama'){echo 'selected';} ?>>Asrama</option>
                            <option value="Lainnya" <?php if($ambil['jenistinggal']=='Lainnya'){echo 'selected';} ?>>Lainnya</option>
                          </select>
                          </td>
                    </tr>
                    <tr>
                        <td><p class="ket">Alat Transportasi ke Sekolah</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><select id="transportasi" name="transportasi" class="dropdown">
                            <option value="default" disabled>Pilih alat transportasi</option>
                            <option value="Jalan Kaki" <?php if($ambil['transportasi']=='Jalan Kaki'){echo 'selected';} ?>>Jalan Kaki</option>
                            <option value="Mobil Pribadi" <?php if($ambil['transportasi']=='Mobil Pribadi'){echo 'selected';} ?>>Mobil Pribadi</option>
                            <option value="Kendaraan Umum" <?php if($ambil['transportasi']=='Kendaraan Umum'){echo 'selected';} ?>>Kendaraan Umum (Angkot/Pete-pete/Ojek Online/Becak/Bentor)</option>
                            <option value="Jemputan Sekolah" <?php if($ambil['transportasi']=='Jemputan Sekolah'){echo 'selected';} ?>>Jemputan Sekolah</option>
                            <option value="Sepeda Motor" <?php if($ambil['transportasi']=='Sepeda Motor'){echo 'selected';} ?>>Sepeda Motor</option>
                            <option value="Sepeda" <?php if($ambil['transportasi']=='Sepeda'){echo 'selected';} ?>>Sepeda</option>
                            <option value="Lainnya" <?php if($ambil['transportasi']=='Lainnya'){echo 'selected';} ?>>Lainnya</option>
                          </select>
                          </td>
                    </tr>
                    <tr>
                        <td><p class="ket">Agama Siswa</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><select id="agama" name="agama" class="dropdown">
                            <option value="default" disabled>Pilih agama</option>
                            <option value="Islam" <?php if($ambil['agama']=='Islam'){echo 'selected';} ?>>Islam</option>
                            <option value="Kristen" <?php if($ambil['agama']=='Kristen'){echo 'selected';} ?>>Kristen</option>
                            <option value="Katolik" <?php if($ambil['agama']=='Katolik'){echo 'selected';} ?>>Katolik</option>
                            <option value="Buddha" <?php if($ambil['agama']=='Buddha'){echo 'selected';} ?>>Buddha</option>
                            <option value="Hindu" <?php if($ambil['agama']=='Hindu'){echo 'selected';} ?>>Hindu</option>
                            <option value="Konghucu" <?php if($ambil['agama']=='Konghucu'){echo 'selected';} ?>>Konghucu</option>
                          </select>
                          </td>
                    </tr>
                    <tr>
                        <td><p class="ket">Nomor Handphone</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="hp" type="tel" minlength="10" maxlength="15" value="<?php echo $ambil['handphone'];?>" required></td>
                    </tr>
                </table>
                <br>
            </div>
            <div class="next">
                <p>Data Sekolah Asal</p>  
            </div>
            <div class="contains">
                <table class="my-table" border="0">
                    <tr>
                        <td><p class="ket">Asal Sekolah</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input type="radio" id="Zion" name="asal" value="SMP Zion" <?php if($ambil['asalsekolah']=='SMP Zion'){echo 'checked';}?>>
                            <label for="Zion">SMP Zion</label>
                            <input type="radio" id="Lainnya" name="asal" value="SMP Lainnya" <?php if($ambil['asalsekolah']=='SMP Lainnya'){echo 'checked';}?>>
                            <label for="Lainnya">SMP Lainnya</label></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Nama Sekolah Asal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="namasekolah" type="text" value="<?php echo $ambil['namasekolah']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Provinsi Sekolah Asal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><select id="provinsi" name="provinsi" class="dropdown">
                            <option value="default" disabled>Pilih provinsi sekolah asal</option>
                            <option value="Aceh" <?php if($ambil['provinsi']=='Aceh'){echo 'selected';} ?>>Aceh</option>
                            <option value="Sumatera Utara" <?php if($ambil['provinsi']=='Sumatera Utara'){echo 'selected';} ?>>Sumatera Utara</option>
                            <option value="Sumatera Barat" <?php if($ambil['provinsi']=='Sumatera Barat'){echo 'selected';} ?>>Sumatera Barat</option>
                            <option value="Riau" <?php if($ambil['provinsi']=='Riau'){echo 'selected';} ?>>Riau</option>
                            <option value="Jambi" <?php if($ambil['provinsi']=='Jambi'){echo 'selected';} ?>>Jambi</option>
                            <option value="Sumatera Selatan" <?php if($ambil['provinsi']=='Sumatera Selatan'){echo 'selected';} ?>>Sumatera Selatan</option>
                            <option value="Bengkulu" <?php if($ambil['provinsi']=='Bengkulu'){echo 'selected';} ?>>Bengkulu</option>
                            <option value="Lampung" <?php if($ambil['provinsi']=='Lampung'){echo 'selected';} ?>>Lampung</option>
                            <option value="Bangka Belitung" <?php if($ambil['provinsi']=='Bangka Belitung'){echo 'selected';} ?>>Bangka Belitung</option>
                            <option value="Kepulauan Riau" <?php if($ambil['provinsi']=='Kepulauan Riau'){echo 'selected';} ?>>Kepulauan Riau</option>
                            <option value="DKI Jakarta" <?php if($ambil['provinsi']=='DKI Jakarta'){echo 'selected';} ?>>DKI Jakarta</option>
                            <option value="Jawa Barat" <?php if($ambil['provinsi']=='Jawa Barat'){echo 'selected';} ?>>Jawa Barat</option>
                            <option value="Jawa Tengah" <?php if($ambil['provinsi']=='Jawa Tengah'){echo 'selected';} ?>>Jawa Tengah</option>
                            <option value="DI Yogyakartra" <?php if($ambil['provinsi']=='DI Yogyakarta'){echo 'selected';} ?>>DI Yogyakarta</option>
                            <option value="Jawa Timur" <?php if($ambil['provinsi']=='Jawa Timur'){echo 'selected';} ?>>Jawa Timur</option>
                            <option value="Banten" <?php if($ambil['provinsi']=='Banten'){echo 'selected';} ?>>Banten</option>
                            <option value="Bali" <?php if($ambil['provinsi']=='Bali'){echo 'selected';} ?>>Bali</option>
                            <option value="NTB" <?php if($ambil['provinsi']=='NTB'){echo 'selected';} ?>>Nusa Tenggara Barat</option>
                            <option value="NTT" <?php if($ambil['provinsi']=='NTT'){echo 'selected';} ?>>Nusa Tenggara Timur</option>
                            <option value="Kalimantan Barat" <?php if($ambil['provinsi']=='Kalimantan Barat'){echo 'selected';} ?>>Kalimantan Barat</option>
                            <option value="Kalimantan Tengah" <?php if($ambil['provinsi']=='Kalimantan Tengah'){echo 'selected';} ?>>Kalimantan Tengah</option>
                            <option value="Kalimantan Selatan" <?php if($ambil['provinsi']=='Kalimantan Selatan'){echo 'selected';} ?>>Kalimantan Selatan</option>
                            <option value="Kalimantan Timur" <?php if($ambil['provinsi']=='Kalimantan Timur'){echo 'selected';} ?>>Kalimantan Timur</option>
                            <option value="Kalimantan Utara" <?php if($ambil['provinsi']=='Kalimantan Utara'){echo 'selected';} ?>>Kalimantan Utara</option>
                            <option value="Sulawesi Utara" <?php if($ambil['provinsi']=='Sulawesi Utara'){echo 'selected';} ?>>Sulawesi Utara</option>
                            <option value="Sulawesi Tengah" <?php if($ambil['provinsi']=='Sulawesi Tengah'){echo 'selected';} ?>>Sulawesi Tengah</option>
                            <option value="Sulawesi Selatan" <?php if($ambil['provinsi']=='Sulawesi Selatan'){echo 'selected';} ?>>Sulawesi Selatan</option>
                            <option value="Sulawesi Tenggara" <?php if($ambil['provinsi']=='Sulawesi Tenggara'){echo 'selected';} ?>>Sulawesi Tenggara</option>
                            <option value="Gorontalo" <?php if($ambil['provinsi']=='Gorontalo'){echo 'selected';} ?>>Gorontalo</option>
                            <option value="Sulawesi Barat" <?php if($ambil['provinsi']=='Sulawesi Barat'){echo 'selected';} ?>>Sulawesi Barat</option>
                            <option value="Maluku" <?php if($ambil['provinsi']=='Maluku'){echo 'selected';} ?>>Maluku</option>
                            <option value="Maluku Utara" <?php if($ambil['provinsi']=='Maluku Utara'){echo 'selected';} ?>>Maluku Utara</option>
                            <option value="Papua" <?php if($ambil['provinsi']=='Papua'){echo 'selected';} ?>>Papua</option>
                            <option value="Papua Barat" <?php if($ambil['provinsi']=='Papua Barat'){echo 'selected';} ?>>Papua Barat</option>
                          </select></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Kabupaten/Kota Sekolah Asal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="kota" type="text" value="<?php echo $ambil['kota']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Kecamatan Sekolah Asal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="kecamatan" type="text" value="<?php echo $ambil['kecamatan']; ?>" required></td>
                    </tr>
                </table>
                <div class="next">
                    <p>Biodata Ibu Kandung</p>  
                </div>
                <div class="contains">
                    <table class="my-table" border="0">
                        <tr>
                            <td><p class="ket">Nama Lengkap Ibu Kandung</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><input name="ibu" type="text" value="<?php echo $ambil['namaibu']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><p class="ket">Pekerjaan</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><select id="kerjaibu" name="kerjaibu" class="dropdown">
                                <option value="default" disabled>Pilih pekerjaan</option>
                                <option value="Tidak Bekerja" <?php if($ambil['kerjaibu']=='Tidak Bekerja'){echo 'selected';} ?>>Tidak Bekerja</option>
                                <option value="PNS/TNI/Polri" <?php if($ambil['kerjaibu']=='PNS/TNI/Polri'){echo 'selected';} ?>>PNS / TNI / Polri</option>
                                <option value="Karyawan Swasta" <?php if($ambil['kerjaibu']=='Karyawan Swasta'){echo 'selected';} ?>>Karyawan Swasta</option>
                                <option value="Pedagang Kecil" <?php if($ambil['kerjaibu']=='Pedagang Kecil'){echo 'selected';} ?>>Pedagang Kecil</option>
                                <option value="Pedagang Besar" <?php if($ambil['kerjaibu']=='Pedagang Besar'){echo 'selected';} ?>>Pedagang Besar</option>
                                <option value="Wiraswasta" <?php if($ambil['kerjaibu']=='Wiraswasta'){echo 'selected';} ?>>Wiraswasta</option>
                                <option value="Buruh" <?php if($ambil['kerjaibu']=='Buruh'){echo 'selected';} ?>>Buruh</option>
                                <option value="Pensiunan" <?php if($ambil['kerjaibu']=='Pensiunan'){echo 'selected';} ?>>Pensiunan</option>
                                <option value="Lainnya" <?php if($ambil['kerjaibu']=='Lainnya'){echo 'selected';} ?>>Lainnya</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Penghasilan per Bulan</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><select id="pengibu" name="pengibu" class="dropdown">
                                <option value="default" disabled>Pilih Penghasilan per Bulan</option>
                                <option value="Kurang dari 1 juta" <?php if($ambil['penghasilanibu']=='Kurang dari 1 juta'){echo 'selected';} ?>>< Rp. 1.000.000,-</option>
                                <option value="1 sampai 2 juta" <?php if($ambil['penghasilanibu']=='1 sampai 2 juta'){echo 'selected';} ?>>Rp. 1.000.000,- s/d Rp. 2.000.000</option>
                                <option value="2 sampai 5 juta" <?php if($ambil['penghasilanibu']=='2 sampai 5 juta'){echo 'selected';} ?>>Rp. 2.000.000,- s/d Rp. 5.000.000</option>
                                <option value="5 sampai 10 juta" <?php if($ambil['penghasilanibu']=='5 sampai 10 juta'){echo 'selected';} ?>>Rp. 5.000.000,- s/d Rp. 10.000.000</option>
                                <option value="Lebih dari 10 juta" <?php if($ambil['penghasilanibu']=='Lebih dari 10 juta'){echo 'selected';} ?>>> Rp. 10.000.000,-</option>
                                <option value="Tidak Berpenghasilan" <?php if($ambil['penghasilanibu']=='Tidak Berpenghasilan'){echo 'selected';} ?>>Tidak Berpenghasilan</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Nomor Handphone</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><input name="hpibu" type="tel" minlength="10" maxlength="15" value="<?php echo $ambil['hpibu']; ?>" required></td>
                        </tr>
                    </table>
                </div>
                <div class="next">
                    <p>Biodata Ayah Kandung</p>  
                </div>
                <div class="contains">
                    <table class="my-table" border="0">
                        <tr>
                            <td><p class="ket">Nama Lengkap Ayah Kandung</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><input name="ayah" type="text" value="<?php echo $ambil['namaayah']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><p class="ket">Pekerjaan</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><select id="kerjaayah" name="kerjaayah" class="dropdown">
                                <option value="default" disabled>Pilih pekerjaan</option>
                                <option value="Tidak Bekerja" <?php if($ambil['kerjaayah']=='Tidak Bekerja'){echo 'selected';} ?>>Tidak Bekerja</option>
                                <option value="PNS/TNI/Polri" <?php if($ambil['kerjaayah']=='PNS/TNI/Polri'){echo 'selected';} ?>>PNS / TNI / Polri</option>
                                <option value="Karyawan Swasta" <?php if($ambil['kerjaayah']=='Karyawan Swasta'){echo 'selected';} ?>>Karyawan Swasta</option>
                                <option value="Pedagang Kecil" <?php if($ambil['kerjaayah']=='Pedagang Kecil'){echo 'selected';} ?>>Pedagang Kecil</option>
                                <option value="Pedagang Besar" <?php if($ambil['kerjaayah']=='Pedagang Besar'){echo 'selected';} ?>>Pedagang Besar</option>
                                <option value="Wiraswasta"<?php if($ambil['kerjaayah']=='Wiraswasta'){echo 'selected';} ?>>Wiraswasta</option>
                                <option value="Buruh" <?php if($ambil['kerjaayah']=='Buruh'){echo 'selected';} ?>>Buruh</option>
                                <option value="Pensiunan" <?php if($ambil['kerjaayah']=='Pensiunan'){echo 'selected';} ?>>Pensiunan</option>
                                <option value="Lainnya" <?php if($ambil['kerjaayah']=='Lainnya'){echo 'selected';} ?>>Lainnya</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Penghasilan per Bulan</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><select id="pengayah" name="pengayah" class="dropdown">
                                <option value="default" disabled>Pilih Penghasilan per Bulan</option>
                                <option value="Kurang dari 1 juta" <?php if($ambil['penghasilanayah']=='Kurang dari 1 juta'){echo 'selected';} ?>>< Rp. 1.000.000,-</option>
                                <option value="1 sampai 2 juta" <?php if($ambil['penghasilanwali']=='1 sampai 2 juta'){echo 'selected';} ?>>Rp. 1.000.000,- s/d Rp. 2.000.000</option>
                                <option value="2 sampai 5 juta" <?php if($ambil['penghasilanayah']=='2 sampai 5 juta'){echo 'selected';} ?>>Rp. 2.000.000,- s/d Rp. 5.000.000</option>
                                <option value="5 sampai 10 juta"<?php if($ambil['penghasilanayah']=='5 sampai 10 juta'){echo 'selected';} ?>>Rp. 5.000.000,- s/d Rp. 10.000.000</option>
                                <option value="Lebih dari 10 juta" <?php if($ambil['penghasilanayah']=='Lebih dari 10 juta'){echo 'selected';} ?>>> Rp. 10.000.000,-</option>
                                <option value="Tidak Berpenghasilan" <?php if($ambil['penghasilanayah']=='Tidak Berpenghasilan'){echo 'selected';} ?>>Tidak Berpenghasilan</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Nomor Handphone</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><input name="hpayah" type="tel" minlength="10" maxlength="15" value="<?php echo $ambil['hpayah']; ?>" required></td>
                        </tr>
                    </table>
                </div>
                <div class="next">
                    <p>Biodata Wali</p>  
                </div>
                <div class="contains">
                    <table class="my-table" border="0">
                        <tr>
                            <td><p class="ket">Nama Lengkap Wali</p></td>
                            <td><p class="redstar"></p></td>
                            <td><input name="wali" type="text" value="<?php echo $ambil['namawali']; ?>"></td>
                        </tr>
                        <tr>
                            <td><p class="ket">Pekerjaan</p></td>
                            <td><p class="redstar"></p></td>
                            <td><select id="kerjawali" name="kerjawali" class="dropdown">
                                <option value="default" disabled>Pilih pekerjaan</option>
                                <option value="Tidak Bekerja" <?php if($ambil['kerjawali']=='Tidak Bekerja'){echo 'selected';} ?>>Tidak Bekerja</option>
                                <option value="PNS/TNI/Polri" <?php if($ambil['kerjawali']=='PNS/TNI/Polri'){echo 'selected';} ?>>PNS / TNI / Polri</option>
                                <option value="Karyawan Swasta" <?php if($ambil['kerjawali']=='Karyawan Swasta'){echo 'selected';} ?>>Karyawan Swasta</option>
                                <option value="Pedagang Kecil" <?php if($ambil['kerjawali']=='Pedagang Kecil'){echo 'selected';} ?>>Pedagang Kecil</option>
                                <option value="Pedagang Besar" <?php if($ambil['kerjawali']=='Pedagang Besar'){echo 'selected';} ?>>Pedagang Besar</option>
                                <option value="Wiraswasta" <?php if($ambil['kerjawali']=='Wiraswasta'){echo 'selected';} ?>>Wiraswasta</option>
                                <option value="Buruh"<?php if($ambil['kerjawali']=='Buruh'){echo 'selected';} ?>>Buruh</option>
                                <option value="Pensiunan" <?php if($ambil['kerjawali']=='Pensiunan'){echo 'selected';} ?>>Pensiunan</option>
                                <option value="Lainnya" <?php if($ambil['kerjawali']=='Lainnya'){echo 'selected';} ?>>Lainnya</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Penghasilan per Bulan</p></td>
                            <td><p class="redstar"></p></td>
                            <td><select id="pengwali" name="pengwali" class="dropdown">
                                <option value="default" disabled>Pilih Penghasilan per Bulan</option>
                                <option value="Kurang dari 1 juta" <?php if($ambil['penghasilanwali']=='Kurang dari 1 juta'){echo 'selected';} ?>>< Rp. 1.000.000,-</option>
                                <option value="1 sampai 2 juta" <?php if($ambil['penghasilanwali']=='1 sampai 2 juta'){echo 'selected';} ?>>Rp. 1.000.000,- s/d Rp. 2.000.000</option>
                                <option value="2 sampai 5 juta" <?php if($ambil['penghasilanwali']=='2 sampai 5 juta'){echo 'selected';} ?>>Rp. 2.000.000,- s/d Rp. 5.000.000</option>
                                <option value="5 sampai 10 juta" <?php if($ambil['penghasilanwali']=='5 sampai 10 juta'){echo 'selected';} ?>>Rp. 5.000.000,- s/d Rp. 10.000.000</option>
                                <option value="Lebih dari 10 juta" <?php if($ambil['penghasilanwali']=='Lebih dari 10 juta'){echo 'selected';} ?>>> Rp. 10.000.000,-</option>
                                <option value="Tidak Berpenghasilan" <?php if($ambil['penghasilanwali']=='Tidak Berpenghasilan'){echo 'selected';} ?>>Tidak Berpenghasilan</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Nomor Handphone</p></td>
                            <td><p class="redstar"></p></td>
                            <td><input name="hpwali" type="tel" minlength="10" maxlength="15" value="<?php echo $ambil['hpwali']; ?>"></td>
                        </tr>
                    </table>
                </div>
                <div class="next">
                    <p>Dokumen</p>  
                </div>
                <div class="contains">
                <div class="tit">
                        <p class="warning">Gambar yang disimpan tidak dapat diubah! Silahkan hubungi pihak sekolah jika terdapat kesalahan dengan Gambar.</p>
                    </div>
                    <div class="tit">
                        <p class="ket">Foto Calon Siswa (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <img src="<?php echo $ambil['foto']; ?>" alt="<?php echo 'foto_'.$ambil['nama']; ?>" title="<?php echo 'foto_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">Fotokopi rapor kelas VIII semester 1 yang telah dilegalisir (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <img src="<?php echo $ambil['semestersatu']; ?>" alt="<?php echo 'Rapor Semester Ganjil_'.$ambil['nama']; ?>" title="<?php echo 'Rapor Semester Ganjil_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">Fotokopi rapor kelas VIII semester 2 yang telah dilegalisir (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <img src="<?php echo $ambil['semesterdua']; ?>" alt="<?php echo 'Rapor Semester Genap_'.$ambil['nama']; ?>" title="<?php echo 'Rapor Semester Genap_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">Akta Kelahiran (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <img src="<?php echo $ambil['aktakelahiran']; ?>" alt="<?php echo 'Akta Kelahiran_'.$ambil['nama']; ?>" title="<?php echo 'Akta Kelahiran_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">Kartu Keluarga (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <img src="<?php echo $ambil['kartukeluarga']; ?>" alt="<?php echo 'Kartu Keluarga_'.$ambil['nama']; ?>" title="<?php echo 'Kartu Keluarga_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">KTP Ayah Kandung (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <img src="<?php echo $ambil['ktpayah']; ?>" alt="<?php echo 'KTP Ayah_'.$ambil['nama']; ?>" title="<?php echo 'KTP Ayah_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">KTP Ibu Kandung (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <img src="<?php echo $ambil['ktpibu']; ?>" alt="<?php echo 'KTP Ibu_'.$ambil['nama']; ?>" title="<?php echo 'KTP Ibu_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">KTP Wali Siswa (Type File JPG, Max 1 File 1 Mb)</p>
                    </div>
                    <img src="<?php echo $ambil['ktpwali']; ?>" title="<?php echo 'KTP Wali_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">Kartu Anggota Jemaat GKKA/Surat Keterangan (Type File JPG, Max 1 File 1 Mb)</p>
                    </div>
                    <img src="<?php echo $ambil['gkka']; ?>" title="<?php echo 'Surat GKKA_'.$ambil['nama']; ?>">
                    <div class="tit">
                        <p class="ket">Surat Keterangan Ranking dari Sekolah (Type File JPG, Max 1 File 1 Mb)</p>
                    </div>
                    <img src="<?php echo $ambil['keteranganranking']; ?>" title="<?php echo 'Surat Keterangan Ranking_'.$ambil['nama']; ?>">
                </div>
            </div>
            <div class="ubah">
                <button class="update" name="ubah" type="submit">Simpan</button>
                <button id="verif" data-target="#myModal" class="confirm">Konfirmasi</button>
            </div>
            <a href="#" class="floating-toggle-btn" onclick="scrollToTop()"><i class="fas fa-chevron-up"></i></a>
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <p>Apakah anda yakin ingin konfirmasi? Semua data tidak dapat diubah lagi setelah konfirmasi.</p>
                    <p>Anda harus konfirmasi jika data ingin diterima oleh pihak sekolah.</p>
                    <div class="buttons">
                        <button class="cancel" id="cancelBtn">Batal</button>
                        <button name="verify">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </form>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script/scripts.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var link = document.querySelector(".confirm");
                var modal = document.querySelector("#myModal");
                var cancelBtn = document.getElementById("cancelBtn");
                const confirmBtn = document.getElementById("verif");
                
                link.onclick = function() {
                    modal.style.display = "block";
                }

                confirmBtn.addEventListener("click", function(event) {
                    event.preventDefault(); // Prevent form submission
                    modal.style.display = "block";
                });

                cancelBtn.onclick = function() {
                    modal.style.display = "none";
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            });
        </script>
    </body>
</html>