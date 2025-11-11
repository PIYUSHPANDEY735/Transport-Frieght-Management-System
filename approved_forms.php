<?php
session_start(); // Start the session
include('config/connection.php');


if (isset($_SESSION['name'])) {
} else {
    echo "No user is logged in.";
}

$username = $_SESSION['name'];
$user_id = $_SESSION['user_id'];

// Query to fetch user-specific forms
$sql = "SELECT * FROM user_forms WHERE user_id = $user_id AND status = 'Approved';";
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
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        User Dashboard
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="index.php" class="btn btn-primary d-none d-sm-inline-block">
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
            <h2 class="text-center mb-4">Your Approved Buily Forms</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Form ID</th>
                            <th>Owner Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Download</th>
                            <th>View Record</th>
                            <!-- I haven't mentioned all the Input fields here-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['owner_name']}</td>";
                            echo "<td>{$row['address']}</td>";
                            echo "<td>{$row['phone_number']}</td>";
                            echo "<td>{$row['status']}</td>";
                        ?> <!--- Here is the Download Button in an column  -->
                            <td><a href="generate_pdf.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Download PDF</a></td>
                           <td><a href='user_record.php?form_id="<?= $row['id'] ?>"' class="btn btn-primary">View Record</a></td>
                        <?php
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<?php

include('includes/footer.php');

?>