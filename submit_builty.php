<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("config/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    // Assuming user is logged in and user_id is stored in session
    $user_id = $_SESSION['user_id'];

    // Fetch form data
    $starting_point = $_POST['starting_point'];
    $destination_point = $_POST['destination_point'];
    $owner_name = $_POST['owner_name'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $driver_name = $_POST['driver_name'];
    $mobile_number = $_POST['mobile_number'];
    $license_number = $_POST['license_number'];
    $truck_number = $_POST['truck_number'];
    $engine_number = $_POST['engine_number'];
    $chasis_number = $_POST['chasis_number'];
    $description_of_goods = $_POST['description_of_goods'];
    $nett_weight = $_POST['nett_weight'];
    $settled_rate = $_POST['settled_rate'];
    $freight = $_POST['freight'];

    // Set default values for consignor and consignee
    $consignor = isset($_POST['consignor']) ? $_POST['consignor'] : 'Not Filled';
    $consignee = isset($_POST['consignee']) ? $_POST['consignee'] : 'Not Filled';

    // Insert form data into user_forms table with status 'Pending'
    $sql = "INSERT INTO user_forms (user_id, starting_point, destination_point, owner_name, address, phone_number, 
            driver_name, mobile_number, license_number, truck_number, engine_number, chasis_number, description_of_goods, 
            nett_weight, settled_rate, freight, status, consignor, consignee) 
            VALUES ('$user_id', '$starting_point', '$destination_point', '$owner_name', '$address', '$phone_number', 
            '$driver_name', '$mobile_number', '$license_number', '$truck_number', '$engine_number', '$chasis_number', 
            '$description_of_goods', '$nett_weight', '$settled_rate', '$freight', 'Pending', '$consignor', '$consignee')";

    // Execute query
    if (mysqli_query($conn, $sql)) {
        // Redirect to index with success message
        header("Location: index.php?success=Form submitted successfully!");
        exit(); // Make sure to call exit after a header redirect
    } else {
        echo "<script>alert('Error submitting form: " . mysqli_error($conn) . "');</script>";
    }
}
?>
