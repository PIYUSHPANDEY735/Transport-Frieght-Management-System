<?php
session_start();
include('config/connection.php');

// Check if the request method is POST and enquiry_id is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];

    // Prepare the DELETE query
    $sql = "DELETE FROM users WHERE user_id = ?";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $user_id);

        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['message'] = "User deleted successfully!";
        } else {
            $_SESSION['message'] = "Error deleting User: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        $_SESSION['message'] = "Failed to prepare the delete User.";
    }

    // Close connection
    $conn->close();

    // Redirect back to the enquiries page
    header("Location: registered_users.php");
    exit();
} else {
    $_SESSION['message'] = "Invalid request.";
    header("Location: registered_users.php");
    exit();
}
?>
