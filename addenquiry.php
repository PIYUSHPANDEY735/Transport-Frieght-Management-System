<?php include('config/connection.php') ?>
<?php
if (isset($_POST['contact_form'])) {
    // Collect form data
    $name = $_POST['form_name'];
    $email = $_POST['form_email'];
    $subject = $_POST['form_subject'];
    $phone = $_POST['form_phone'];
    $message = $_POST['form_message'];

    // Insert form data into database
    $sql = "INSERT INTO contact_enquiries (`Name`, `Email`, `Subject`, `Phone`, `Message`) VALUES ('$name', '$email', '$subject','$phone','$message')";

    if ($conn->query($sql) === TRUE) {
        header("location: https://piyush4.netlify.app/");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();


?>