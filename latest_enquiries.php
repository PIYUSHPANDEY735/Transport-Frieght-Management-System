<?php

session_start(); // Start the session
include('config/connection.php');

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: form.php"); // Redirect to login if not logged in
    exit();
}
?>
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-info">
        <?= $_SESSION['message']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<?php
// Fetch the latest enquiries
$enquirysql = "SELECT * FROM contact_enquiries ORDER BY submitted_at DESC";
$enquiryresult = $conn->query($enquirysql);

?>
<?php

include("includes/header.php");

?>

<style>
    .modal-dialog {
        max-width: 100%;
        position: relative;
    }

    @media (min-width:1280px) {
        .half {
            width: 50% !important;
        }

        .flexx {
            /* width:100%; */
            height: auto;
            position: relative;
            display: flex;
            /* align-items: center;
            justify-content: space-around; */
        }
    }

    .boldtext textarea::placeholder {
        color: orange !important;
        font-weight: 600;
        font-size: 20px;
    }
</style>

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
                            Registered Users
                        </a>
                    </div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="main.php" class="btn btn-primary d-none d-sm-inline-block">
                            Back To Home
                        </a>
                    </div>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="admin_forms.php" class="btn btn-primary d-none d-sm-inline-block">
                            Approved Forms
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
             <div class="page-body">
            <div class="container mt-5">
            <h2 class="text-center mb-4">Latest Contact Enquires</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Phone</th>
                            <th>Timing</th>
                            <th>View Record</th>
                            <th>Delete Record</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php if ($enquiryresult->num_rows > 0): ?>
        <?php while ($row = $enquiryresult->fetch_assoc()): ?>
            <tr>
                <td><?= $row['Name'] ?></td>
                <td><?= $row['Email'] ?></td>
                <td><?= $row['Subject'] ?></td>
                <td><?= $row['Phone'] ?></td>
                <td><?= $row['submitted_at'] ?></td>
                <td><a href='view_enquiry.php?form_name="<?= $row['Name'] ?>"' class="btn btn-primary">View Enquiry</a></td>
                <td>
                    <form method="POST" action="delete_enquiry.php" onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                        <input type="hidden" name="enquiry_id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger">Delete Enquiry</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No enquiries found</td>
        </tr>
    <?php endif; ?>
    <?php $conn->close(); ?>
</tbody>

                </table>
            </div>
        </div>     
            </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>