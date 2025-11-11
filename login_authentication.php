<?php
session_start();
include("config/connection.php");

// Get the email and password from the POST request
$naam = $_POST['email'];
$code = $_POST['pass'];

// Escape special characters to prevent SQL injection
$naam = stripcslashes($naam);
$code = stripcslashes($code);
$naam = mysqli_real_escape_string($conn, $naam);
$code = mysqli_real_escape_string($conn, $code);

// Check if the user is an admin
$sql_admin = "SELECT * FROM admin WHERE Email='$naam' AND Password='$code'";
$result_admin = mysqli_query($conn, $sql_admin);
$count_admin = mysqli_num_rows($result_admin);

// Check if the user is a regular user
$sql_user = "SELECT * FROM users WHERE Email='$naam' AND Password='$code'";
$result_user = mysqli_query($conn, $sql_user);
$count_user = mysqli_num_rows($result_user);

// If admin credentials are correct, redirect to admin dashboard
if ($count_admin == 1) {
    $_SESSION['name'] = $naam; // Store admin email in session
    header("Location: main.php");
    exit();
}
// If user credentials are correct, redirect to user dashboard
else if ($count_user == 1) {
   // Debugging - Check if 'user_id' exists in the fetched data
   $row_user = mysqli_fetch_assoc($result_user); // Fetch the user data

   // Assuming user_id is present, store in session
   $_SESSION['name'] = $naam; // Store user email in session
   $_SESSION['user_id'] = $row_user['user_id']; // Store user_id in session
   $_SESSION['Name'] = $row_user['Name'];
   header("location: index.php");
   exit();
}
// If neither admin nor user credentials are correct, show login error
else {
    echo "<script>alert('Login Failed, Try Again');</script>";
    header("Location: form.php");
    exit();
}
