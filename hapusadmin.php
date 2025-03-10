<?php
// Include the database connection file
include 'session.php';
include('koneksi.php');

// Get the id parameter from the query string
$id = $_GET['id'];

// Delete the corresponding row from the login table
$sql = "DELETE FROM admin WHERE id=$id";
$result = mysqli_query($con, $sql);

// Check if the deletion was successful and redirect to kelola.php
if ($result) {
  header('Location: keladmin.php');
  exit;
} else {
  echo "Error deleting record: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>