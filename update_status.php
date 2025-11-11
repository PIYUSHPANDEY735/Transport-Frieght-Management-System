<?php
 // Include database connection
session_start();
include("config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_id = $_POST['form_id'];
    $new_status = $_POST['new_status'];

    // Update the status in the user_forms table
    $sql = "UPDATE user_forms SET status='$new_status' WHERE id='$form_id'";
    if (mysqli_query($conn, $sql)) {
        // Optionally, send a notification to the user here
        // e.g., sendEmailToUser($form_id);
        header("Location: main.php"); // Redirect back to admin dashboard
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }
}
?>
