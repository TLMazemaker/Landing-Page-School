<?php
include 'session.php';
?>
<html>
    <head>
        <title>Pengaturan User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/admin.css">
        <link rel="shortcut icon" type="image/png" href="img/zion.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-..."> <!-- Replace with the appropriate version and integrity hash for your project -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
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
                           <a href="admin.php" class="nav-link">KELOLA DATA CALON SISWA</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link-a">KELOLA USER</a>
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
        <div class="main">
            <p>Kelola User yang Terdaftar</p>  
        </div>
        <div class="instruct">
            <div class="data">
                <table border="0">
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Update</th>
                        <th>Hapus</th>
                    </tr>
                    <?php
            // Include the database connection code
            require_once 'koneksi.php';

            // Prepare and execute the SQL statement to retrieve the data
            $stmt = $con->prepare("SELECT * FROM user");
            $stmt->execute();
            $result = $stmt->get_result();

            // Loop through the results and display them in the table
            $i = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['password']."</td>";
                echo "<td><a class='btn btn-secondary' href='update.php?id=".$row['id']."'>Update</a></td>";
                echo "<td><a class='btn btn-danger' href='hapus.php?id=".$row['id']."'>Hapus</a></td>";
                echo "</tr>";
                $i++;
            }

            // Close the statement and the connection
            $stmt->close();
            $con->close();
            ?>
                </table>
            </div>
            <div class="tambah">
                <button type="button" class="btn btn-primary" data-toggle="modals" data-target="#myModal">Tambah User</button>
            </div>
        </div>
        <!-- Modal -->
        <div id="myModal" class="modals">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Tambah User</h4>
					</div>
                    <form action="tambah.php" method="post">
					<div class="modal-body">
                        <div class="form-group">
                            <label>Username</label>
							<input name="name" type="text" class="form-control" required>
                        </div>
						<div class="form-group">
							<label>Password</label>
							<input name="pass" type="password" class="form-control" required>
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modals">Batal</button>
							<input type="submit" class="btn btn-primary" value="Submit">
						</div>
					</form>
				</div>
			</div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script/admin.js"></script>
        <script>
            $(document).ready(function() {
                // show the modal when the button is clicked
                $("button").click(function() {
                    $(".modals").show();
                });

                // hide the modal when the close button is clicked
                $(".btn-danger").click(function() {
                    $(".modals").hide();
                });
            });
        </script>
    </body>
</html>