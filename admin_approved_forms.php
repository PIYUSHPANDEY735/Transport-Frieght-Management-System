<?php
session_start(); // Start the session
include('config/connection.php');


if (isset($_SESSION['name'])) {
} else {
    echo "No user is logged in.";
}
?>
<?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-info">
        <?= $_SESSION['message']; ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<?php

// Query to fetch user-specific forms
$sql = "SELECT * FROM user_forms WHERE status = 'Approved' ORDER BY created_at DESC;";
$result = mysqli_query($conn, $sql);

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

    /* .modal-header{
        display: flex;
        flex-direction: column;
    } */
</style>
<?php

include('includes/header.php');
?>

<header class="navbar navbar-expand-md d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                        <a href="main.php" class="btn btn-primary d-none d-sm-inline-block">
                            Back to Home
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Admin Approved Buily Forms</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Form ID</th>
                            <th>Owner Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>View Record</th>
                            <th>Delete Record</th>
                            <!-- I haven't mentioned all the Input fields here-->
                        </tr>
                    </thead>
                    <tbody>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['owner_name'] ?></td>
                <td><?= $row['address'] ?></td>
                <td><?= $row['phone_number'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><a href='view_record.php?form_id=<?= $row['id'] ?>' class="btn btn-primary">View Record</a></td>
                <td>
                    <form method="POST" action="delete_builty.php" onsubmit="return confirm('Are you sure you want to delete this Builty?');">
                        <input type="hidden" name="builty_id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-danger">Delete Builty</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">No Builty found</td>
        </tr>
    <?php endif; ?>
    <?php $conn->close(); ?>
</tbody>

                </table>
            </div>
        </div>
    </div>

</div>

<?php

include('includes/footer.php');

?>