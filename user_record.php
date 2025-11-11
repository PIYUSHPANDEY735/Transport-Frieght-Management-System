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
include('includes/navbar.php');
?>

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