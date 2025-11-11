<?php
session_start();
include("config/connection.php");

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $city = $_POST['city'];
	$address = $_POST['address'];
	$pass = $_POST['password'];
	 // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_email_query);
    $stmt->bind_param("s", $email); // Bind the email parameter

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        $_SESSION['error_message'] = "This email is already registered. Please use a different email.";
        header("location: form.php");
        exit();
    }
    else{
	$query = "INSERT INTO `users`(`Name`, `Email`, `Mobile_Number`, `City`, `Address`, `Password`) VALUES ('$name','$email','$mobile','$city','$address','$pass')";
    
	$res = mysqli_query($conn, $query);

	if ($res) {
		header("location: index.php");
		exit();
	} else {
		echo "<script>alert('Invalid Result');</script>";
	}
    }
}

?>