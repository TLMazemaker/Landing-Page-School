<?php
include 'koneksi.php';
include 'session.php';
include 'kirim.php';

if($role!=='User'){
    header("location:../login.php");
};
?>

<html>
    <head>
        <title>Isi Data Calon Siswa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/form.css">
        <link rel="shortcut icon" type="image/png" href="img/zion.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> <!-- Replace with the appropriate version and integrity hash for your project -->
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
                           <a href="#myModal" class="nav-link">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="nav-link-a">FORM FORMULIR</a>
                        </li>
                         <li class="nav-item">
                            <a href="#myModalTwo" class="nav-link-b">KELUAR</a>
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
                        <td><input name="nama" type="text" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Jenis Kelamin</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input type="radio" id="L" name="jk" value="L">
                            <label for="L">Laki-laki</label>
                            <input type="radio" id="P" name="jk" value="P">
                            <label for="P">Perempuan</label></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Nomor Induk Keluarga (NIK)</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="nik" type="number" maxlength="16" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Tempat Lahir</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="tempat" type="text" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Tanggal Lahir</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="tanggal" type="date" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Anak Ke Berapa</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="anak" type="number" min="1" max="9" maxlength="1" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Jumlah Saudara Kandung</p></td>
                        <td><p class="redstar"></p></td>
                        <td><input name="kandung" type="number" max="9" maxlength="1" value="0" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Jumlah Saudara Tiri/Angkat</p></td>
                        <td><p class="redstar"></p></td>
                        <td><input name="tiri" type="number" max="9" maxlength="1" autocomplete="off" value="0"></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Tinggi Badan (cm)</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="tinggi" type="number" min="1" max="300" maxlength="3" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Berat Badan (kg)</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="berat" type="number" min="1" max="150" maxlength="3" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Alamat Siswa</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="alamat" type="text" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">RT/RW</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><div class="rtrw">
                            <input name="rt" type="text" autocomplete="off" required>
                            <input name="rw" type="text" autocomplete="off" required></div>
                        </td>
                    </tr>
                    <tr>
                        <td><p class="ket">Jenis Tinggal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><select id="jenistinggal" name="jenistinggal" class="dropdown">
                            <option value="" selected disabled>Pilih jenis tinggal</option>
                            <option value="Bersama orang tua">Bersama orang tua</option>
                            <option value="Wali">Wali</option>
                            <option value="Kost">Kost</option>
                            <option value="Asrama">Asrama</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                          </td>
                    </tr>
                    <tr>
                        <td><p class="ket">Alat Transportasi ke Sekolah</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><select id="transportasi" name="transportasi" class="dropdown">
                            <option value="" selected disabled>Pilih alat transportasi</option>
                            <option value="Jalan Kaki">Jalan Kaki</option>
                            <option value="Mobil Pribadi">Mobil Pribadi</option>
                            <option value="Kendaraan Umum">Kendaraan Umum (Angkot/Pete-pete/Ojek Online/Becak/Bentor)</option>
                            <option value="Jemputan Sekolah">Jemputan Sekolah</option>
                            <option value="Sepeda Motor">Sepeda Motor</option>
                            <option value="Sepeda">Sepeda</option>
                            <option value="Lainnya">Lainnya</option>
                          </select>
                          </td>
                    </tr>
                    <tr>
                        <td><p class="ket">Agama Siswa</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><select id="agama" name="agama" class="dropdown">
                            <option value="" selected disabled>Pilih agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                          </select>
                          </td>
                    </tr>
                    <tr>
                        <td><p class="ket">Nomor Handphone</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="hp" type="tel" minlength="10" maxlength="15" autocomplete="off" required></td>
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
                        <td><input type="radio" id="Zion" name="asal" value="SMP Zion">
                            <label for="Zion">SMP Zion</label>
                            <input type="radio" id="Lainnya" name="asal" value="SMP Lainnya">
                            <label for="Lainnya">SMP Lainnya</label></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Nama Sekolah Asal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="namasekolah" type="text" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Provinsi Sekolah Asal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><select id="provinsi" name="provinsi" class="dropdown">
                            <option value="" selected disabled>Pilih provinsi sekolah asal</option>
                            <option value="Aceh">Aceh</option>
                            <option value="Sumatera Utara">Sumatera Utara</option>
                            <option value="Sumatera Barat">Sumatera Barat</option>
                            <option value="Riau">Riau</option>
                            <option value="Jambi">Jambi</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                            <option value="Bengkulu">Bengkulu</option>
                            <option value="Lampung">Lampung</option>
                            <option value="Bangka Belitung">Bangka Belitung</option>
                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="DI Yogyakartra">DI Yogyakarta</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                            <option value="Banten">Banten</option>
                            <option value="Bali">Bali</option>
                            <option value="NTB">Nusa Tenggara Barat</option>
                            <option value="NTT">Nusa Tenggara Timur</option>
                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                            <option value="Gorontalo">Gorontalo</option>
                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                            <option value="Maluku">Maluku</option>
                            <option value="Maluku Utara">Maluku Utara</option>
                            <option value="Papua">Papua</option>
                            <option value="Papua Barat">Papua Barat</option>
                          </select></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Kabupaten/Kota Sekolah Asal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="kota" type="text" autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td><p class="ket">Kecamatan Sekolah Asal</p></td>
                        <td><p class="redstar">*</p></td>
                        <td><input name="kecamatan" autocomplete="off" type="text" required></td>
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
                            <td><input name="ibu" type="text" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td><p class="ket">Pekerjaan</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><select id="kerjaibu" name="kerjaibu" class="dropdown">
                                <option value="" selected disabled>Pilih pekerjaan</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                <option value="PNS/TNI/Polri">PNS / TNI / Polri</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="Pedagang Kecil">Pedagang Kecil</option>
                                <option value="Pedagang Besar">Pedagang Besar</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Lainnya">Lainnya</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Penghasilan per Bulan</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><select id="pengibu" name="pengibu" class="dropdown">
                                <option value="" selected disabled>Pilih Penghasilan per Bulan</option>
                                <option value="Kurang dari 1 juta">< Rp. 1.000.000,-</option>
                                <option value="1 sampai 2 juta">Rp. 1.000.000,- s/d Rp. 2.000.000</option>
                                <option value="2 sampai 5 juta">Rp. 2.000.000,- s/d Rp. 5.000.000</option>
                                <option value="5 sampai 10 juta">Rp. 5.000.000,- s/d Rp. 10.000.000</option>
                                <option value="Lebih dari 10 juta">> Rp. 10.000.000,-</option>
                                <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Nomor Handphone</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><input name="hpibu" type="tel" minlength="10" maxlength="15" autocomplete="off" required></td>
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
                            <td><input name="ayah" type="text" autocomplete="off" required></td>
                        </tr>
                        <tr>
                            <td><p class="ket">Pekerjaan</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><select id="kerjaayah" name="kerjaayah" class="dropdown">
                                <option value="" selected disabled>Pilih pekerjaan</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                <option value="PNS/TNI/Polri">PNS / TNI / Polri</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="Pedagang Kecil">Pedagang Kecil</option>
                                <option value="Pedagang Besar">Pedagang Besar</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Lainnya">Lainnya</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Penghasilan per Bulan</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><select id="pengayah" name="pengayah" class="dropdown">
                                <option value="" selected disabled>Pilih Penghasilan per Bulan</option>
                                <option value="Kurang dari 1 juta">< Rp. 1.000.000,-</option>
                                <option value="1 sampai 2 juta">Rp. 1.000.000,- s/d Rp. 2.000.000</option>
                                <option value="2 sampai 5 juta">Rp. 2.000.000,- s/d Rp. 5.000.000</option>
                                <option value="5 sampai 10 juta">Rp. 5.000.000,- s/d Rp. 10.000.000</option>
                                <option value="Lebih dari 10 juta">> Rp. 10.000.000,-</option>
                                <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Nomor Handphone</p></td>
                            <td><p class="redstar">*</p></td>
                            <td><input name="hpayah" type="tel" minlength="10" maxlength="15" autocomplete="off" required></td>
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
                            <td><input name="wali" type="text" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td><p class="ket">Pekerjaan</p></td>
                            <td><p class="redstar"></p></td>
                            <td><select id="kerjawali" name="kerjawali" class="dropdown">
                                <option value="" selected disabled>Pilih pekerjaan</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                <option value="PNS/TNI/Polri">PNS / TNI / Polri</option>
                                <option value="Karyawan Swasta">Karyawan Swasta</option>
                                <option value="Pedagang Kecil">Pedagang Kecil</option>
                                <option value="Pedagang Besar">Pedagang Besar</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Buruh">Buruh</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Lainnya">Lainnya</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Penghasilan per Bulan</p></td>
                            <td><p class="redstar"></p></td>
                            <td><select id="pengwali" name="pengwali" class="dropdown">
                                <option value="" selected disabled>Pilih Penghasilan per Bulan</option>
                                <option value="Kurang dari 1 juta">< Rp. 1.000.000,-</option>
                                <option value="1 sampai 2 juta">Rp. 1.000.000,- s/d Rp. 2.000.000</option>
                                <option value="2 sampai 5 juta">Rp. 2.000.000,- s/d Rp. 5.000.000</option>
                                <option value="5 sampai 10 juta">Rp. 5.000.000,- s/d Rp. 10.000.000</option>
                                <option value="Lebih dari 10 juta">> Rp. 10.000.000,-</option>
                                <option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
                              </select>
                              </td>
                        </tr>
                        <tr>
                            <td><p class="ket">Nomor Handphone</p></td>
                            <td><p class="redstar"></p></td>
                            <td><input name="hpwali" type="tel" minlength="10" maxlength="15" autocomplete="off"></td>
                        </tr>
                    </table>
                </div>
                <div class="next">
                    <p>Dokumen</p>  
                </div>
                <div class="contains">
                    <div class="tit">
                        <p class="warning">Hati-hati dalam mengupload file! Gambar yang sudah dikirim tidak dapat diubah kembali!</p>
                    </div>
                    <div class="tit">
                        <p class="ket">Foto Calon Siswa (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <input type="file" id="foto" name="foto" required>
                    <div class="tit">
                        <p class="ket">Fotokopi rapor kelas VIII semester 1 yang telah dilegalisir (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <input type="file" id="semestersatu" name="semestersatu" required>
                    <div class="tit">
                        <p class="ket">Fotokopi rapor kelas VIII semester 2 yang telah dilegalisir (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <input type="file" id="semesterdua" name="semesterdua" required>
                    <div class="tit">
                        <p class="ket">Akta Kelahiran (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <input type="file" id="akta" name="akta" required>
                    <div class="tit">
                        <p class="ket">Kartu Keluarga (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <input type="file" id="kk" name="kk" required>
                    <div class="tit">
                        <p class="ket">KTP Ayah Kandung (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <input type="file" id="ktpayah" name="ktpayah" required>
                    <div class="tit">
                        <p class="ket">KTP Ibu Kandung (Type File JPG, Max 1 File 1 Mb)</p><p class="redstar">*</p>
                    </div>
                    <input type="file" id="ktpibu" name="ktpibu" required>
                    <div class="tit">
                        <p class="ket">KTP Wali Siswa (Type File JPG, Max 1 File 1 Mb)</p>
                    </div>
                    <input type="file" id="ktpwali" name="ktpwali">
                    <div class="tit">
                        <p class="ket">Kartu Anggota Jemaat GKKA/Surat Keterangan (Type File JPG, Max 1 File 1 Mb)</p>
                    </div>
                    <input type="file" id="gkka" name="gkka">
                    <div class="tit">
                        <p class="ket">Surat Keterangan Ranking dari Sekolah (Type File JPG, Max 1 File 1 Mb)</p>
                    </div>
                    <input type="file" id="ranking" name="ranking">
                </div>
            </div>
            <div class="send">
                <button name="kirim" type="submit">Simpan</button>
            </div>
            <a href="#" class="floating-toggle-btn" onclick="scrollToTop()"><i class="fas fa-chevron-up"></i></a>
        </form>
        <div id="myModal" class="modal">
            <div class="modal-content">
              <p>Apakah anda yakin ingin keluar? Semua progress akan hilang.</p>
              <div class="buttons">
                <button class="cancel" id="cancelBtn">Batal</button>
                <button onclick="pindah('dashboard')">Konfirmasi</button>
              </div>
            </div>
        </div>
        <div id="myModalTwo" class="modal">
            <div class="modal-content">
              <p>Apakah anda yakin ingin keluar? Semua progress akan hilang.</p>
              <div class="buttons">
                <button class="cancel" id="cancelButton">Batal</button>
                <button onclick="pindah('logout')">Konfirmasi</button>
              </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script/scripts.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var link = document.querySelector(".nav-link");
                var linkTwo = document.querySelector(".nav-link-b");
                var modal = document.querySelector("#myModal");
                var logout = document.querySelector('#myModalTwo');
                var cancelBtn = document.getElementById("cancelBtn");
                var cancel = document.getElementById('cancelButton');
                
                link.onclick = function() {
                    modal.style.display = "block";
                }

                linkTwo.onclick = function() {
                    logout.style.display = "block";
                }

                cancelBtn.onclick = function() {
                    modal.style.display = "none";
                }

                cancel.onclick = function() {
                    logout.style.display = "none";
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

                function scrollToTop() {
                    // Scroll to the top of the page
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth"
                    });
                }
            });
        </script>
    </body>
</html>