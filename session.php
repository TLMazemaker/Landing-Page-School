<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['role'])) {
    header("Location: 404.html");
    exit();
}

// Set session variables
$role = $_SESSION['role'];
?>