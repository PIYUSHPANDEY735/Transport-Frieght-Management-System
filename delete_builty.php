<?php
session_start();
include('config/connection.php');

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: form.php"); // Redirect to login if not logged in
    exit();
}

// Check if builty_id is set in the POST request
if (isset($_POST['builty_id'])) {
    $builty_id = $_POST['builty_id'];

    // Prepare the DELETE statement
    $sql = "DELETE FROM user_forms WHERE id = ?";
    
    // Initialize prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $builty_id); // "i" indicates the type is integer

        // Execute the statement
        if ($stmt->execute()) {
            // Success message
            $_SESSION['success_message'] = "Builty deleted successfully!";
        } else {
            // Error message
            $_SESSION['error_message'] = "Error deleting builty.";
        }

        // Close the statement
        $stmt->close();
    } else {
        // Prepare error message
        $_SESSION['error_message'] = "Database error: Could not prepare statement.";
    }
} else {
    // Error if builty_id is not set
    $_SESSION['error_message'] = "Builty ID not set.";
}

// Redirect back to the page with the enquiry list
header("Location: admin_approved_forms.php");
exit();
?>
