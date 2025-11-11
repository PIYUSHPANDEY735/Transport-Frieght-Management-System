<?php
session_start();
include('config/connection.php');

// Check if the request method is POST and enquiry_id is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enquiry_id'])) {
    $enquiry_id = $_POST['enquiry_id'];

    // Prepare the DELETE query
    $sql = "DELETE FROM contact_enquiries WHERE id = ?";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("i", $enquiry_id);

        // Execute the query
        if ($stmt->execute()) {
            $_SESSION['message'] = "Enquiry deleted successfully!";
        } else {
            $_SESSION['message'] = "Error deleting enquiry: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        $_SESSION['message'] = "Failed to prepare the delete statement.";
    }

    // Close connection
    $conn->close();

    // Redirect back to the enquiries page
    header("Location: latest_enquiries.php");
    exit();
} else {
    $_SESSION['message'] = "Invalid request.";
    header("Location: latest_enquiries.php");
    exit();
}
?>
