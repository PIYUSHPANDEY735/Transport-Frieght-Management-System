<?php
session_start();
include('config/connection.php');

// Check if form_id is provided in the URL
if (isset($_GET['user_name'])) {
    $user_name = $_GET['user_name'];

    // Fetch the form details and the user who submitted it
    $query = " Select * from users where Name = $user_name";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "No User Registered.";
    exit();
}
?>

<?php

include('includes/header.php');

?>

<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="main.php">
                <img src="includes/sitelogo.png" alt="Site Logo" style="width:250px;" />
            </a>
        </div>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(static/avatars/000m.jpg);border-radius:25px;"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>admin@gmail.com</div>
                        <!-- <div class="mt-1 small text-secondary"></div> -->
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="javascript:;" class="dropdown-item">Status : &nbsp;<strong style="color:green"> Active</strong></a>
                    <a href="admin_profile.php" class="dropdown-item">Profile</a>
                    <a href="logout.php" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Admin Dashboard
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="registered_users.php" class="btn btn-primary d-none d-sm-inline-block">
                            Back To Registered Users
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Registered User Details</h3>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        
                        <div class="datagrid-item">
                            <div class="datagrid-title">Name</div>
                            <div class="datagrid-content"><?php echo  $user_data['Name']; ?></div>
                        </div>
                        
                         <div class="datagrid-item">
                            <div class="datagrid-title">Email</div>
                            <div class="datagrid-content"><?php echo  $user_data['Email']; ?></div>
                        </div>
                        
                        <div class="datagrid-item">
                            <div class="datagrid-title">Mobile Number</div>
                            <div class="datagrid-content"><?php echo  $user_data['Mobile_Number']; ?></div>
                        </div>

  <div class="datagrid-item">
                            <div class="datagrid-title">City</div>
                            <div class="datagrid-content"><?php echo  $user_data['City']; ?></div>
                        </div>
                        
                          <div class="datagrid-item">
                            <div class="datagrid-title">Address</div>
                            <div class="datagrid-content"><?php echo  $user_data['Address']; ?></div>
                        </div>
                          <div class="datagrid-item">
                            <div class="datagrid-title">Registered At</div>
                            <div class="datagrid-content"><?php echo  $user_data['created_at']; ?></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php

include('includes/footer.php');

?>