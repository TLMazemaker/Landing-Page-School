<?php
// Include the database connection code
include 'session.php';
require_once 'koneksi.php';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the values from the form submission
    $id = $_POST['id'];
    $username = $_POST['name'];
    $password = $_POST['pass'];

    // Prepare and execute the SQL statement to update the row in the table
    $stmt = $con->prepare("UPDATE admin SET username=?, password=? WHERE id=?");
    $stmt->bind_param("ssi", $username, $password, $id);
    $result = $stmt->execute();

    // Check if the update was successful
    if ($result) {
        echo "Update successful!";
        header("Location: keladmin.php");
    } else {
        echo "Update failed: " . $stmt->error;
    }

    // Close the statement and the connection
    $stmt->close();
    $con->close();
}

// Check if the ID parameter is set in the URL
else {
    $id = $_GET['id'];

    // Prepare and execute the SQL statement to retrieve the data for the row with the specified ID
    $stmt = $con->prepare("SELECT * FROM admin WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $username = $row['username'];
    $password = $row['password'];

    // Close the statement
    $stmt->close();
}
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
                            <a href="kelola.php" class="nav-link-a">KELOLA USER</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">KELOLA ADMIN</a>
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
            <p>Kelola Admin</p>  
        </div>
        <div class="instruct">
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input name="name" type="text" class="form-control" value="<?php echo htmlspecialchars($username); ?>">
                    </div>
					<div class="form-group">
						<label>Password</label>
						<input name="pass" type="password" class="form-control" value="<?php echo htmlspecialchars($password); ?>">
					</div>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
					<div class="modal-footer">
						<button onclick="pindah('keladmin')" class="btn btn-danger">Batal</button>
						<input type="submit" class="btn btn-secondary" value="Update">
					</div>
                </div>
            </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="script/admin.js"></script>
    </body>
</html>