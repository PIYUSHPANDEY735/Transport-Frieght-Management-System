<?php
session_start();
include('config/connection.php');

// Check if form_id is provided in the URL
if (isset($_GET['form_id'])) {
    $form_id = $_GET['form_id'];

    // Fetch the form details and the user who submitted it
    $query = "
    SELECT user_forms.*, users.Name 
    FROM user_forms 
    JOIN users ON user_forms.user_id = users.user_id 
    WHERE user_forms.id = $form_id";

    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $form_data = mysqli_fetch_assoc($result);
    } else {
        echo "Form not found.";
        exit();
    }
} else {
    echo "No form ID provided.";
    exit();
}
?>

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
                        <a href="admin_forms.php" class="btn btn-primary d-none d-sm-inline-block">
                            Back To Approved Forms
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
                    <h3 class="card-title">Buily Form Details</h3>
                </div>
                <div class="card-body">
                    <div class="datagrid">
                        
                        <div class="datagrid-item">
                            <div class="datagrid-title">Submitted By</div>
                            <div class="datagrid-content"><?php echo $form_data['Name']; ?></div>
                        </div>
                        
                         <div class="datagrid-item">
                            <div class="datagrid-title">Submitted At</div>
                            <div class="datagrid-content"><?php echo $form_data['created_at']; ?></div>
                        </div>

                    <div class="datagrid-item">
                            <div class="datagrid-title">From</div>
                            <div class="datagrid-content"><?php echo $form_data['starting_point']; ?></div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">To</div>
                            <div class="datagrid-content"><?php echo $form_data['destination_point']; ?></div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">Owner Name</div>
                            <div class="datagrid-content"><?php echo $form_data['owner_name']; ?></div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">Driver Name</div>
                            <div class="datagrid-content"><?php echo $form_data['driver_name']; ?></div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">Truck Number</div>
                            <div class="datagrid-content"><?php echo $form_data['truck_number']; ?></div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">Engine Number</div>
                            <div class="datagrid-content"><?php echo $form_data['engine_number']; ?></div>
                        </div>

                        <div class="datagrid-item">
                            <div class="datagrid-title">Chasis Number</div>
                            <div class="datagrid-content"><?php echo $form_data['chasis_number']; ?></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Description of Goods</div>
                            <div class="datagrid-content"><?php echo $form_data['description_of_goods']; ?></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Nett Weight</div>
                            <div class="datagrid-content"><?php echo $form_data['nett_weight']; ?></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Settled Rate</div>
                            <div class="datagrid-content"><?php echo $form_data['settled_rate']; ?></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Freight</div>
                            <div class="datagrid-content"><?php echo $form_data['freight']; ?></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Consignor</div>
                            <div class="datagrid-content"><?php echo $form_data['consignor']; ?></div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Consignee</div>
                            <div class="datagrid-content"><?php echo $form_data['consignee']; ?></div>
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