<?php
session_start();
session_destroy(); // Destroy the session
header("Location: form.php"); // Redirect to login page
exit();
?>
