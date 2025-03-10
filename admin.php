<?php
include 'session.php';
include 'koneksi.php';
?>
<html>
    <head>
        <title>Kelola Data Siswa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/admin.css">
        <link rel="shortcut icon" type="image/png" href="img/zion.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-..."> <!-- Replace with the appropriate version and integrity hash for your project -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
        <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
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
                           <a href="#" class="nav-link-a">KELOLA DATA CALON SISWA</a>
                        </li>
                        <li class="nav-item">
                            <a href="kelola.php" class="nav-link">KELOLA USER</a>
                        </li>
                        <li class="nav-item">
                            <a href="keladmin.php" class="nav-link">KELOLA ADMIN</a>
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
        <div class="utama">
            <p>Kelola Data Calon Siswa/i yang sudah Terverifikasi</p>  
        </div>
        <div class="instruct">
            <div class="group">
                <div class="pagination">
                    <div class="show">
                        Show
                    </div>
                    <div class="numbers">
                        <select id="rowsPerPage" onchange="updatePagination()">
                        <option value="1">1</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="100">100</option>
                        <option value="150">150</option>
                        <option value="250">250</option>
                        <option value="300">300</option>
                    </select>
                    </div>
                    <div class="entries">
                        Entries
                    </div>
                </div>
                <div class="search">
                    <label for="search">Search:</label>
                    <input type="search" id="search" name="search" placeholder="Cari Nama Calon Siswa...">
                </div>
            </div>
            <br>
            <div class="pages" id="pagination"></div>
            <div class="data">
                <table id="myTable" border="0">
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>NIK</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Anak ke Berapa</th>
                        <th>Jumlah Saudara Kandung</th>
                        <th>Jumlah Saudara Tiri</th>
                        <th>Tinggi Badan</th>
                        <th>Berat Badan</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>Jenis Tinggal</th>
                        <th>Transportasi</th>
                        <th>Agama</th>
                        <th>No. Handphone</th>
                        <th>Asal Sekolah</th>
                        <th>Nama Sekolah Asal</th>
                        <th>Provinsi Sekolah Asal</th>
                        <th>Kota Sekolah Asal</th>
                        <th>Kecamatan Sekolah Asal</th>
                        <th>Nama Ibu Kandung</th>
                        <th>Pekerjaan Ibu Kandung</th>
                        <th>Penghasilan Ibu Kandung</th>
                        <th>No. Handphone Ibu Kandung</th>
                        <th>Nama Ayah Kandung</th>
                        <th>Pekerjaan Ayah Kandung</th>
                        <th>Penghasilan Ayah Kandung</th>
                        <th>No. Handphone Ayah Kandung</th>
                        <th>Nama Wali</th>
                        <th>Pekerjaan Wali</th>
                        <th>Penghasilan Wali</th>
                        <th>No. Handphone Wali</th>
                        <th>Foto</th>
                        <th>Rapor Semester Ganjil</th>
                        <th>Rapor Semester Genap</th>
                        <th>Akta Kelahiran</th>
                        <th>Kartu Keluarga</th>
                        <th>KTP Ayah</th>
                        <th>KTP Ibu</th>
                        <th>KTP Wali</th>
                        <th>Surat Keterangan GKKA</th>
                        <th>Surat Keterangan Ranking</th>
                        <th>Detail</th>
                        <th>Bukti Penerimaan Pembayaran</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM data WHERE status = 'Yes'";
                    $query = mysqli_query($con, $sql);
        
                    // Loop through the results and display them in the table
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$row['nama']."</td>";
                        echo "<td>".$row['jeniskelamin']."</td>";
                        echo "<td>".$row['nik']."</td>";
                        echo "<td>".$row['tempatlahir']."</td>";
                        echo "<td>".$row['tanggallahir']."</td>";
                        echo "<td>".$row['anakke']."</td>";
                        echo "<td>".$row['saudarakandung']."</td>";
                        echo "<td>".$row['saudaratiri']."</td>";
                        echo "<td>".$row['tinggibadan']."</td>";
                        echo "<td>".$row['beratbadan']."</td>";
                        echo "<td>".$row['rt']."</td>";
                        echo "<td>".$row['rw']."</td>";
                        echo "<td>".$row['jenistinggal']."</td>";
                        echo "<td>".$row['transportasi']."</td>";
                        echo "<td>".$row['agama']."</td>";
                        echo "<td>".$row['handphone']."</td>";
                        echo "<td>".$row['asalsekolah']."</td>";
                        echo "<td>".$row['namasekolah']."</td>";
                        echo "<td>".$row['provinsi']."</td>";
                        echo "<td>".$row['kota']."</td>";
                        echo "<td>".$row['kecamatan']."</td>";
                        echo "<td>".$row['namaibu']."</td>";
                        echo "<td>".$row['kerjaibu']."</td>";
                        echo "<td>".$row['penghasilanibu']."</td>";
                        echo "<td>".$row['hpibu']."</td>";
                        echo "<td>".$row['namaayah']."</td>";
                        echo "<td>".$row['kerjaayah']."</td>";
                        echo "<td>".$row['penghasilanayah']."</td>";
                        echo "<td>".$row['hpayah']."</td>";
                        echo "<td>".$row['namawali']."</td>";
                        echo "<td>".$row['kerjawali']."</td>";
                        echo "<td>".$row['penghasilanwali']."</td>";
                        echo "<td>".$row['hpwali']."</td>";
                        echo "<td><img src=".$row['foto']."></td>";
                        echo "<td><img src=".$row['semestersatu']."></td>";
                        echo "<td><img src=".$row['semesterdua']."></td>";
                        echo "<td><img src=".$row['aktakelahiran']."></td>";
                        echo "<td><img src=".$row['kartukeluarga']."></td>";
                        echo "<td><img src=".$row['ktpayah']."></td>";
                        echo "<td><img src=".$row['ktpibu']."></td>";
                        echo "<td><img src=".$row['ktpwali']."></td>";
                        echo "<td><img src=".$row['gkka']."></td>";
                        echo "<td><img src=".$row['keteranganranking']."></td>";
                        echo "<td><a class='btn btn-success' href='detail.php?id=".$row['userid']."'>Lihat Detail</a></td>";
                        if(empty($row['bukti'])) {
                            echo "<td><form action='bukti.php?id=".$row['userid']."' method='post' enctype='multipart/form-data'><input type='file' name='bukti' required><button name='bukti' class='btn btn-primary'>Kirim</button></form></td>";
                        } else {
                            echo "<td><img src=".$row['bukti']." title='Bukti Penerimaan Pembayaran'></td>";
                        }
                        echo "</tr>";
                        $i++;
                    }
        
                    // Close the statement and the connection
                    $con->close();
                    ?>
                    <tr id="noRecord" style="display: none;">
                    <td colspan="3">Data tidak tersedia</td>
                </tr>
                </table>
            </div>
            <a href="#" onclick="exportToExcel()" class="export"><i class="far fa-file"></i><span class="button-text">Export Data</span></a>                 
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script/admin.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            const searchInput = document.getElementById("search");
            const table = document.getElementById("myTable");
            const rows = table.getElementsByTagName("tr");
            const noRecordRow = document.getElementById("noRecord");

            var rowsPerPageElement = document.getElementById("rowsPerPage");
        var currentPage = 1;

        function displayRows() {
            var rows = table.rows;
            var rowsPerPage = parseInt(rowsPerPageElement.value);
            var totalPages = Math.ceil((rows.length - 1) / rowsPerPage);

            // Hide all rows
            for (var i = 1; i < rows.length; i++) {
                rows[i].style.display = "none";
            }

            // Calculate start and end row index for the current page
            var startIndex = (currentPage - 1) * rowsPerPage + 1;
            var endIndex = Math.min(startIndex + rowsPerPage, rows.length);

            // Display rows for the current page
            for (var j = startIndex; j < endIndex; j++) {
                rows[j].style.display = "";
            }

            // Generate pagination links
            var pagination = document.getElementById("pagination");
            pagination.innerHTML = "";

            for (var k = 1; k <= totalPages; k++) {
                var link = document.createElement("a");
                link.href = "#";
                link.innerHTML = k;

                if (k === currentPage) {
                    link.className = "active";
                }

                link.addEventListener("click", function () {
                    currentPage = parseInt(this.innerHTML);
                    displayRows();
                });

                pagination.appendChild(link);
            }
        }

        function updatePagination() {
            currentPage = 1;
            displayRows();
        }

        displayRows();
            
            searchInput.addEventListener("keyup", function () {
                const searchValue = searchInput.value.toLowerCase();
                let found = false;

                for (let i = 1; i < rows.length; i++) {
                    const row = rows[i];
                    const columns = row.getElementsByTagName("td")[1];
                    const name = columns.textContent.toLowerCase();

                    if (name.includes(searchValue)) {
                        row.style.display = "";
                        found = true;
                    } else {
                        row.style.display = "none";
                    }

                    if (found) {
                        noRecordRow.style.display = "none";
                    } else {
                        noRecordRow.style.display = "";
                    }
                }
            });
        });

        function exportToExcel() {
      var wb = XLSX.utils.table_to_book(document.getElementById('myTable'), { sheet: "Sheet JS" });
      var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'array' });

      saveAs(new Blob([wbout], { type: 'application/octet-stream' }), 'Data Calon Siswa.xlsx');
    }

    function saveAs(blob, filename) {
      var link = document.createElement('a');
      link.href = window.URL.createObjectURL(blob);
      link.download = filename;
      link.click();
    }
        </script>
    </body>
</html>