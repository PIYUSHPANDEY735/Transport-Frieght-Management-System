<?php

session_start(); // Start the session
include('config/connection.php');

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    header("Location: form.php"); // Redirect to login if not logged in
    exit();
}

$username = $_SESSION['name'];


// Fetch all pending forms from the database
$formsql = "SELECT * FROM user_forms where status='Pending' ORDER BY created_at DESC;";
$formresult = mysqli_query($conn, $formsql);

?>
<?php

include('includes/header.php');
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
                        <a href="latest_enquiries.php" class="btn btn-primary d-none d-sm-inline-block">
                            Latest Enquiries
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
    <!-- Page body -->
    <div class="page-body">

        <div class="container mt-5">
            <h2 class="text-center mb-4">Submitted Builty Forms</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Form ID</th>
                            <th>Owner Name</th>
                            <th>Driver Name</th>
                            <th>Truck Number</th>
                            <th>Status</th>
                            <th>Timing</th>
                            <th>View Record</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($formresult)): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['owner_name'] ?></td>
                                <td><?= $row['driver_name'] ?></td>
                                <td><?= $row['truck_number'] ?></td>
                                <td>
                                  <form method="POST" action="process_form.php" class="d-inline">
                                        <input type="hidden" name="form_id" value="<?= $row['id'] ?>">
                                        <button type="submit" name="approve" class="btn btn-success">Approve</button>
                                    </form>
                                    <form method="POST" action="process_form.php" class="d-inline">
                                        <input type="hidden" name="form_id" value="<?= $row['id'] ?>">
                                        <button type="submit" name="reject" class="btn btn-danger">Reject</button>
                                    </form> 
                                   
                                </td>
                                <td><?= $row['created_at'] ?></td>
                                <td><a href='view_record.php?form_id="<?= $row['id'] ?>"' class="btn btn-primary">View Record</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>

<?php

include('includes/footer.php');

?>