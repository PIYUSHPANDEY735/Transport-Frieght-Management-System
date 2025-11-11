<?php
session_start();
include('config/connection.php');

// Check if form_id is provided in the URL
if (isset($_GET['form_name'])) {
    $form_name = $_GET['form_name'];

    // Fetch the form details and the user who submitted it
    $query = " Select * from contact_enquiries where Name = $form_name";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $enquiry_data = mysqli_fetch_assoc($result);
    } else {
        echo "Enquiry not found.";
        exit();
    }
} else {
    echo "No Enquiry provided.";
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
                        <a href="latest_enquiries.php" class="btn btn-primary d-none d-sm-inline-block">
                            Back To Enquiries
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
                    <h3 class="card-title">Contact Enquiry Details</h3>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        
                        <div class="datagrid-item">
                            <div class="datagrid-title">Name</div>
                            <div class="datagrid-content"><?php echo $enquiry_data['Name']; ?></div>
                        </div>
                        
                         <div class="datagrid-item">
                            <div class="datagrid-title">Email</div>
                            <div class="datagrid-content"><?php echo $enquiry_data['Email']; ?></div>
                        </div>
                        
                        <div class="datagrid-item">
                            <div class="datagrid-title">Subject</div>
                            <div class="datagrid-content"><?php echo $enquiry_data['Subject']; ?></div>
                        </div>

  <div class="datagrid-item">
                            <div class="datagrid-title">Phone</div>
                            <div class="datagrid-content"><?php echo $enquiry_data['Phone']; ?></div>
                        </div>
                        
                          <div class="datagrid-item">
                            <div class="datagrid-title">Message</div>
                            <div class="datagrid-content"><?php echo $enquiry_data['Message']; ?></div>
                        </div>
                          <div class="datagrid-item">
                            <div class="datagrid-title">Submitted At</div>
                            <div class="datagrid-content"><?php echo $enquiry_data['submitted_at']; ?></div>
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