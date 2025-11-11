<?php
session_start();
include('config/connection.php');

// Turn on error reporting to debug any issues
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'vendor/autoload.php'; // Make sure this path is correct based on your setup

use Dompdf\Dompdf;
use Dompdf\Options;


if (!isset($_SESSION['name'])) {
    echo "No user is logged in.";
    exit();
}

if (isset($_GET['id'])) {
    $form_id = $_GET['id'];

    // Fetch the specific form data from the database
    $sql = "SELECT * FROM user_forms WHERE id = $form_id;";
    $result = mysqli_query($conn, $sql);
    $form = mysqli_fetch_assoc($result);

    // DATABASE VALUES
    $builty_id = $form['id'];
    $builty_timing = $form['created_at'];
    $from = $form['starting_point'];
    $to = $form['destination_point'];
    $date = $form['created_at'];
    $owner_name = $form['owner_name'];
    $address_owner = $form['address'];
    $phone_no = $form['phone_number'];
    $driver_name = $form['driver_name'];
    $mobile_no = $form['mobile_number'];
    $license_no = $form['license_number'];
    $truck_no = $form['truck_number'];
    $engine_no = $form['engine_number'];
    $chassis_no = $form['chasis_number'];
    $goods_description = $form['description_of_goods'];
    $net_wt = $form['nett_weight'];
    $settled_rate = $form['settled_rate'];
    $freight = $form['freight'];
    $consignor = $form['consignor'];
    $consignee = $form['consignee'];

    // $options = new Options();
    // $options->set('defaultFont', 'Courier');
    // $dompdf = new Dompdf($options);
    
    // Initialize DOMPDF
    $dompdf = new Dompdf();

    // Create HTML for the PDF
   $html = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f9f9f9;
            font-size: 15px;
        }

        .container {
            width: 100%;
            /* max-width: 210mm; */
            height: auto;
            background-color: white;
            /* border: 2px solid #000; */
            margin: 0 auto;
            box-sizing: border-box;
            background-color: #f9f96f;
        }

        .header {
            text-align: center;
            padding: 10px;
            /* border-bottom: 2px solid #000; */
            background-color: #9395c7;
        }

        .header h1 {
            font-size: 30px;
            margin: 0;
            font-weight: bolder;
            color: #000000;

        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #000000;
            font-weight: 600;
        }

        .content {
            margin-top: 20px;
            padding-right: 10px;
            padding-left: 10px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        .details-table th,
        .details-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .details-table th {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 2px solid #000;
        }

        .footer .hindi {
            font-family: "Mangal", sans-serif;
            font-size: 14px;
            margin-top: 10px;
        }

        .footer .note {
            margin-top: 10px;
            color: #555;
        }

        .main_builty {
            width: 100%;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: space-around;
            background-color: #6f6fd1;
        }

        .builty_id,
        .builty_timing {
            width: 50%;
            height: auto;
            position: relative;
        }

      

        .table_column {
            width: 100%;
            height: auto;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .column_flex {
            width: 50%;
            height: auto;
            position: relative;
        }

        .column_flex tr,
        .column_flex td,
        .column_flex th {
            width: auto;
            height: auto;
            position: relative;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="main_builty" style="background-color:#b1b2c9;">
            <div class="builty_id">
                <span><strong>Builty ID </strong> = ' . $builty_id . '</span>
            </div>
            <div class="builty_timing">
                <span><strong>Builty Timing </strong> = ' . $builty_timing . '</span>
            </div>
        </div>

        <div class="header" style="background-color:#b1b2c9;">
            <h1>Transport Management Company</h1>
            <p>PAN : TANDOMPAN | Reg No : 2027/2026 | GST No: 000000000</p>
            <p>Address of THat COmpany Uttarakhand</p>
            <p>Contact : +91 8860910067 | Email : peeyushpandey735@gmail.com</p>
        </div>

        <!-- Consignor and Consignee Section -->
        <div class="content">
            <div class="section-title">Main Details</div>
            <table class="details-table">
                <tr>
                    <th>Consignor</th>
                    <td>' . $consignor . '</td>
                </tr>
                <tr>
                    <th>Consignee</th>
                    <td>' . $consignee . '</td>
                </tr>
            </table>
        </div>

        <!-- Builty Form Details Section -->
        <div class="content">
            <div class="section-title">Builty Form Details</div>
            <table class="details-table">
                <tr>
                    <th style="width:150px;">From</th>
                    <td style="width:150px;">' . $from . '</td>
                    <th style="width:150px;">To</th>
                    <td style="width:150px;">' . $to . '</td>
                </tr>
                <tr>
                    <th style="width:150px;">Owner Name</th>
                    <td style="width:150px;">' . $owner_name . '</td>
                    <th style="width:150px;">Phone Number</th>
                    <td style="width:150px;">' . $phone_no . '</td>
                </tr>
                <tr>
                    <th style="width:150px;">Driver Name</th>
                    <td style="width:150px;">' . $driver_name . '</td>
                    <th style="width:150px;">Mobile Number</th>
                    <td style="width:150px;">' . $mobile_no . '</td>
                </tr>
                <tr>
                    <th style="width:150px;">Truck Number</th>
                    <td style="width:150px;">' . $truck_no . '</td>
                    <th style="width:150px;">Engine Number</th>
                    <td style="width:150px;">' . $engine_no . '</td>
                </tr>
                <tr>
                    <th>Chasis Number</th>
                    <td>' . $chassis_no . '</td>
                    <th>License Number</th>
                    <td>' . $license_no . '</td>
                </tr>
            </table>
            <table class="details-table">
                <tr>
                    <th>Description of Goods</th>
                    <td style="width:600px;">' . $goods_description . '</td>
                </tr>
                </table>
                <table class="details-table">
                <tr>
                    <th style="width:150px;">Nett Weight</th>
                    <td style="width:150px;">' . $net_wt . '</td>
                    <th style="width:150px;">Settled Rate</th>
                    <td style="width:150px;">' . $settled_rate . '</td>
                </tr>
                <tr>
                    <th>Total Freight</th>
                    <td>' . $freight . '</td>
                    <th>Advance Freight</th>
                    <td> </td>
                </tr>
                <tr>
                    <th>Balance</th>
                    <tr></tr>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>';

    // Load HTML content
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream("form_$form_id.pdf", array("Attachment" => true));
} else {
    echo "No form ID provided.";
}
