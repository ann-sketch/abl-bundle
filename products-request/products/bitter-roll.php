<?php

require_once("../../env.php");

$query = "SELECT * FROM products_request WHERE product = 'Adonko Bitters (Roll)' ORDER BY ID DESC";
$result = mysqli_query($procurement_connect, $query);

function calc_raw_stock($ims_connect)
{
    $cap_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'cap'"))['qty'];
    $preform_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'preform'"))['qty'];
    $box_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'box'"))['qty'];

    $number_of_products = min($cap_qty, $preform_qty);
    if ($number_of_products <= $box_qty * 24) {
        return $number_of_products;
    }
}
$product_forecast = calc_raw_stock($ims_connect);
$number_of_finished_products = get_qty($ims_products_connect, "Adonko Bitters (Roll)");
$total_number_of_products_requested = mysqli_fetch_assoc(mysqli_query($procurement_connect, "SELECT SUM(qty) FROM products_request WHERE product = 'Adonko Bitters (Roll)' AND is_approved = '0' ORDER BY ID DESC"))['SUM(qty)'];
if ($number_of_finished_products > $total_number_of_products_requested) {
    $product_deficiency = 0;
} else {
    $product_deficiency = abs(get_qty($ims_products_connect, "Adonko Bitters (Roll)") - $total_number_of_products_requested);
}

function get_qty($ims_products_connect, $products)
{
    $product = mysqli_query($ims_products_connect, "SELECT * FROM `products` WHERE `name` = '$products'");
    $product_qty = mysqli_fetch_assoc($product)['qty'];
    if ($product_qty) {
        return $product_qty;
    }
    return 0;
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <!-- <title>Ample Admin Lite Template by WrapPixel</title> -->
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png"> -->
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        html {
            overflow: scroll;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 0;
            /* Remove scrollbar space */
            background: transparent;
            /* Optional: just make scrollbar invisible */
        }

        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Product Request's Info</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                            <li><a href="../" class="fw-normal">Back To Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-2 col-md-12">
                        <div class="white-box analytics-info" style="display: flex; height: 85%;">
                            <ul class="list-inline two-part d-flex align-items-center justify-content-around mb-0 flex-wrap">
                                <h3 class="box-title m-0" style="font-size: 20px;">Product Name</h3>
                                <li style="margin-left: 0px;margin-top: -80px;">
                                    <span class="counter text-success">Adonko Bitters (Roll)</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info" style="height: 85%;">
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <h3 class="box-title m-0">Number Of Finished Products Available</h3>
                                <li class="ms-auto">
                                    <span class="counter text-success"><?php echo $number_of_finished_products ?></span>
                                </li>
                            </ul>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <h3 class="box-title m-0">Total Number of Products Requested</h3>
                                <li class="ms-auto">
                                    <span class="counter text-success"><?php echo $total_number_of_products_requested ?></span>
                                </li>
                            </ul>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <h3 class="box-title m-0">Deficiency in Products</h3>
                                <li class="ms-auto">
                                    <span class="counter text-success"><?php echo $product_deficiency ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="white-box analytics-info">
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <h3 class="box-title m-0">
                                    <!-- <a href="ims/Controller_Products"></a> -->
                                    Number Of Products that Raw Stocks can Produce
                                </h3>
                                <li class="ms-auto">
                                    <span class="counter text-success"><?php echo $product_forecast ?></span>
                                </li>
                            </ul>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <h3 class="box-title m-0">Total Number of Products needed to cover deficiency</h3>
                                <li class="ms-auto">
                                    <span class="counter text-success">
                                        <?php
                                        $stocks_needed_to_cover_deficiency = 0;
                                        if ($product_deficiency != 0) {
                                            $stocks_needed_to_cover_deficiency = $product_deficiency - $product_forecast;
                                        }
                                        echo $stocks_needed_to_cover_deficiency;
                                        ?></span>
                                </li>
                            </ul>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <u>
                                    <h3 class="box-title m-0">Deficiency In Raw Stocks</h3>
                                </u>
                            </ul>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <h5 class="box-title m-0" style="font-size: 15px;">Caps: <?php echo $stocks_needed_to_cover_deficiency ?> </h5>
                            </ul>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <h5 class="box-title m-0" style="font-size: 15px;">Preforms: <?php echo $stocks_needed_to_cover_deficiency ?> </h5>
                            </ul>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <h5 class="box-title m-0" style="font-size: 15px;">Boxes: <?php echo round($stocks_needed_to_cover_deficiency / 24) ?> </h5>
                            </ul>

                        </div>
                    </div>
                    <!-- <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Adonko 123</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><?php echo $product_forecast ?></span>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Requests</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="employee_data" class="table table-striped table-bordered" data-order='[[ 0, "desc" ]]'>
                                    <thead>
                                        <tr>
                                            <td>
                                                <h5>Customer's Name</h5>
                                            </td>
                                            <td>
                                                <h5>Product</h5>
                                            </td>
                                            <td>
                                                <h5>Quantity</h5>
                                            </td>
                                            <td>
                                                <h5>Date</h5>
                                            </td>
                                            <td>
                                                <h5>Action</h5>
                                            </td>
                                            <td>
                                                <h5>Deficient</h5>
                                            </td>
                                            <td>
                                                <h5>Is Supplied</h5>
                                            </td>
                                        </tr>
                                    </thead>

                                    <?php
                                    if ($result === false) {
                                        echo "Error: " . $query . "<br>" . $procurement_connect->error;
                                    } else {
                                        while ($row = mysqli_fetch_array($result)) {

                                            // if ($row["is_approved"] AND $row["is_supplied"]) {
                                            if ($row["is_approved"]) {
                                                $approve_text = "Approved";
                                                $btn_color = "btn-success";
                                            } else {
                                                $approve_text = "Approve";
                                                $btn_color = "btn-warning";
                                            }
                                            if ($row["is_supplied"]) {
                                                $supplied_text = "Yes";
                                                $s_btn_color = "btn-warning";
                                            } else {
                                                $supplied_text = "No";
                                                $s_btn_color = "btn-secondary";
                                            }
                                            $deficient = $row["deficient"];

                                            echo '  
                                                <tr>  
                                                    <td>' . $row["name"] . '</td>  
                                                    <td>' . $row["product"] . '</td>  
                                                    <td>' . $row["qty"] . '</td>  
                                                    <td>' . $row["date"] . '</td>  
                                                    <td>' . "
                                                    <form action='update_db.php' method='POST'>
                                                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                                                        <input type='hidden' name='purpose' value='approve'>
                                                        <button type='submit' class='btn $btn_color' >$approve_text</button>
                                                    </form>"
                                                . '</td>  
                                                    <td>' . '
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product' . $row["id"] . '">
                                                    View
                                                    </button>

                                                    <div class="modal fade" id="product' . $row["id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>' . $deficient . '</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                    ' . '</td>  
                                                    <td>' .
                                                "
                                                    <form action='update_db.php' method='POST'>
                                                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                                                        <input type='hidden' name='purpose' value='supply'>
                                                        <button type='submit' class='btn $s_btn_color' >$supplied_text</button>
                                                    </form>"

                                                . '</td>  
                                                </tr>  
                                                ';
                                        }
                                    }

                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer text-center"> 2021 © Adonko Bitters Company Ltd</a>
                </footer>

            </div>

        </div>
        <!-- All Jquery -->
        <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/app-style-switcher.js"></script>
        <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!--Wave Effects -->
        <script src="js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="js/custom.js"></script>
        <!--This page JavaScript -->
        <!--chartis chart-->
        <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
        <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
        <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>