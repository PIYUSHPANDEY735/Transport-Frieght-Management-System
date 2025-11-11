<?php
session_start(); // Start the session
include('config/connection.php');


// if (isset($_SESSION['name'])) {
    
//     $name = $_SESSION['name'];

    
//     $sql = "SELECT * FROM admin WHERE Name = '$name'"; 
//     $result = mysqli_query($conn, $sql);

    
//     if (mysqli_num_rows($result) == 1) {
//         header("Location: main.php");
//         exit();
//     }
// } else {
//     echo "No user is logged in.";
// }


// Check if the user is logged in

if (!isset($_SESSION['name'])) {
    // If the user is not logged in, redirect to login page
    header("Location: form.php");
    exit();
}

// Check if the logged-in user is the admin
 if ($_SESSION['name'] == "shribalaji.roadline@gmail.com") {
     // Redirect to admin's main page
     header("Location: main.php");
     exit();
 }

$user_id = $_SESSION['user_id'];
$username = $_SESSION['name'];

// Query to fetch user-specific forms
$sql = "SELECT * FROM user_forms WHERE user_id = $user_id AND status = 'Pending'";
$result = mysqli_query($conn, $sql);

if (isset($_SESSION['rejected'])) {
    echo "<script>
        alert('" . $_SESSION['rejected'] . "');
        setTimeout(function() {
            window.location.href = 'user_dashboard.php';
        }, 3000);
    </script>";
    unset($_SESSION['rejected']);
}

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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
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
                        <a href="approved_forms.php" class="btn btn-primary d-none d-sm-inline-block">
                            Approved Forms
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-6 col-md-12 col-lg-12">
                    <div class="modal" id="modal-report" style="display: block;position:relative;">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                                <!-- <div class="modal-header">
                                    <div class="company-title">SHRI BALAJI ROAD LINE</div>
                                    <div class="modal-title">Builty Report</div>
                                </div> -->

                                <!-- Destination Details -->
                                <form method="POST" action="submit_builty.php">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="form-label fifty">From*</label>
                                                <input type="text" class="form-control" name="starting_point" placeholder="Starting Point" required>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="form-label fifty">To*</label>
                                                <input type="text" class="form-control" name="destination_point" placeholder="Destination Point" required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Owner Details -->

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Owner Name</label>
                                                    <input type="text" class="form-control" name="owner_name" placeholder="Devesh Dixit" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address" placeholder="Oakwood Avenue, Apt. 12B, Springfield, IL 62704">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="text" class="form-control" name="phone_number" placeholder="+91 98765 43212" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Driver Details -->

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Driver Name</label>
                                                    <input type="text" class="form-control" name="driver_name" placeholder="Raju Singh" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Mobile Number</label>
                                                    <input type="text" class="form-control" name="mobile_number" placeholder="+1 234 567 8901" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">License Number</label>
                                                    <input type="text" class="form-control" name="license_number" placeholder="DL12345678901234" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Truck Details -->

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Truck Number</label>
                                                    <input type="text" class="form-control" name="truck_number" placeholder="AB 12 XY 3456" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Engine Number</label>
                                                    <input type="text" class="form-control" name="engine_number" placeholder="ENG1234567890XYZ" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Chasis Number</label>
                                                    <input type="text" class="form-control" name="chasis_number" placeholder="CHAS1234567890XYZ" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-1 boldtext mt-3">
                                                    <!-- <label class="form-label">Client name</label> -->
                                                    <textarea rows="5" cols="4" name="consignor" class="form-control" placeholder="CONSIGNOR"></textarea>
                                                </div>
                                                <div class="mb-2 boldtext mt-2">
                                                    <!-- <label class="form-label">Client name</label> -->
                                                    <textarea rows="5" cols="4" name="consignee" class="form-control" placeholder="CONSIGNEE"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label"> Description of Goods</label>
                                                    <textarea rows="11" cols="4" class="form-control" name="description_of_goods" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-1">
                                                <div>
                                                    <label class="form-label">Nett Wt.</label>
                                                    <textarea class="form-control" rows="11" name="nett_weight" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div>
                                                    <label class="form-label">Setteled Rate</label>
                                                    <textarea class="form-control" rows="11" name="settled_rate"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div>
                                                    <label class="form-label">Freight</label>
                                                    <textarea class="form-control" rows="11" name="freight"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <input class="btn btn-link link-secondary" type="reset" value="Reset">
                                        <input class="btn btn-primary ms-auto" data-bs-dismiss="modal" type="submit" value="Request Builty">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="container mt-5">
            <h2 class="text-center mb-4">Your Submitted Builty</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Form ID</th>
                            <th>Owner Name</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <!--<th>View Record</th>-->
                            <!-- <th>City</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?> 
                        <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['owner_name'] ?></td>
                                <td><?= $row['address'] ?></td>
                                <td><?= $row['phone_number'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <!--<td>Random DATA</td>-->
                                
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