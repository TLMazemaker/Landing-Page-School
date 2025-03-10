<?php
include 'session.php';
require_once 'koneksi.php';

if (isset($_POST['name']) && isset($_POST['pass'])) {
  // Prepare and bind the SQL statement
  $stmt = $con->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $pass);

  // Sanitize the user inputs
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $pass = mysqli_real_escape_string($con, $_POST['pass']);

  // Execute the statement and check for errors
  if (!$stmt->execute()) {
      echo "Error: " . $stmt->error;
  } else {
      echo "Data stored successfully.";
      header("Location: kelola.php");
exit();

  }

  // Close the statement
  $stmt->close();
}
// Close the connection
$con->close();
?>