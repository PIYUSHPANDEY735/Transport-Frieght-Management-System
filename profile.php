<?php

session_start(); // Start the session
include('config/connection.php');
// Assuming user email is stored in the session after login
$user_email = $_SESSION['name'];
$user_id = $_SESSION['user_id'];

// Query to get user details from the 'users' table
$sql = "SELECT * FROM users WHERE Email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch user details
    $user = $result->fetch_assoc();
    
    // Example: Display user information
    $name = $user['Name'];
    $email = $user['Email'];
    $phone = $user['Mobile_Number'];
    $city = $user['City'];
    $address = $user['Address'];
    $userid = $user['user_id'];
    // Fetch other fields as needed
} else {
    echo "No user found.";
}


// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: ../form.php"); // Redirect to login if not logged in
    exit();
}
$username = $_SESSION['name'];

// Sample user data (replace with data from your database)
//$username = $_SESSION['name'];
//$email = $_SESSION['email'];  Assume email is also stored in session
?>

<?php

include('includes/header.php');
?>

<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="index.php">
                <img src="includes/sitelogo.png" alt="Site Logo" style="width:250px;" />
            </a>
        </div>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(static/avatars/000m.jpg);border-radius:25px;"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div><?php echo htmlspecialchars($username); ?></div>
                        <!-- <div class="mt-1 small text-secondary"></div> -->
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="javascript:;" class="dropdown-item">Status : &nbsp;<strong style="color:green"> Active</strong></a>
                    <a href="profile.php" class="dropdown-item">Profile</a>
                    <a href="logout.php" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="page-wrapper">
    <!-- Page header -->
    <!-- <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Account Settings
                    </h2>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-md-12 d-flex flex-column">
                        <div class="card-body">
                            <h2 class="mb-4">My Account</h2>
                            <!-- <h3 class="card-title">Profile Details</h3> -->
                            <div class="row align-items-center">
                                <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url(static/avatars/000m.jpg);border-radius:50px;width:44px;height:44px;"></span>
                                </div>
                                <div class="col-auto">
                                    <h3 class="profile-name"><?php echo $name; ?></h3>
                                </div>
                            </div>
                            <h3 class="card-title mt-4">Email : &nbsp;<?php echo $user_email; ?></h3>
                            
                            <h3 class="card-title mt-4">Mobile Number : &nbsp;<?php echo $phone;?></h3>
                           
                            <h3 class="card-title mt-4">City : &nbsp;<?php echo $city;?></h3>
                            
                            <h3 class="card-title mt-4">Address : &nbsp;<?php echo $address;?></h3>

                            <h3 class="card-title mt-4">User Id : &nbsp;<?php echo $user_id; ?></h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include('includes/footer.php');

?>