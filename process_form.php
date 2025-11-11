<?php
session_start();
include("config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form_id is set and not empty
    if (isset($_POST['form_id']) && !empty($_POST['form_id'])) {
        $form_id = $_POST['form_id'];
    } else {
        echo "Error: Form ID is not provided.";
        exit();
    }

    if (isset($_POST['approve'])) {
        // Approve form
        $sql = "UPDATE user_forms SET status = 'Approved' WHERE id = $form_id";
    } elseif (isset($_POST['reject'])) {
        // Reject form and delete from the database
        $sql = "DELETE FROM user_forms WHERE id = $form_id";
    } else {
        echo "Error: No action specified.";
        exit();
    }

    // Perform the database query
    if (mysqli_query($conn, $sql)) {
        // Check if the form was rejected
        if (isset($_POST['reject'])) {
            // Get the user_id who submitted the form
            $result = mysqli_query($conn, "SELECT user_id FROM user_forms WHERE id = $form_id");
            
            // Check if the query was successful
            if ($result) {
                $form_data = mysqli_fetch_assoc($result);
                
                // Check if form_data is valid
                if ($form_data && isset($form_data['user_id'])) {
                    $user_id = $form_data['user_id'];

                    // Set the rejection message in the session for the user
                    $_SESSION['rejected'] = "Your submitted form has been rejected.";
                    
                    // Redirect to the user dashboard
                    header("Location: main.php?success=Form Rejected");
                    exit();
                }
                 else {
                    header("location: main.php?success=Form Rejected");
                    exit();
                }
            } else {
                echo "Error fetching user data: " . mysqli_error($conn);
                exit();
            }
        } else {
            header("Location: main.php?success=Form Approved");
            exit();
        }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        exit();
    }
}
?>

