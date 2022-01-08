<?php

require_once("../env.php");

$query = "SELECT * FROM products_request ORDER BY ID DESC";
$result = mysqli_query($procurement_connect, $query);
// $connect->close();
function calc_raw_stock($ims_connect)
{
    $cap_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'cap'"))['qty'];
    $preform_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'preform'"))['qty'];
    $box_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'carton'"))['qty'];

    $number_of_products = min($cap_qty, $preform_qty);
    if ($number_of_products <= $box_qty * 24) {
        return $number_of_products;
    }
}
$product_forecast = calc_raw_stock($ims_connect);

// Adonko Dry Gin 
// Adonko Atadwe Ginger (Bottle)
// Adonko 123 (Roll)
// Adonko Bitters (Rolls)
// Adonko Bitters (Bottle)
// Adonko 123 (Bottle)

$dry_gin_requests = mysqli_num_rows(mysqli_query($procurement_connect, "SELECT id FROM products_request WHERE product = 'Adonko Dry Gin (Roll)'"));
$atadwe_ginger_requests = mysqli_num_rows(mysqli_query($procurement_connect, "SELECT id FROM products_request WHERE product = 'Adonko Atadwe Ginger (Bottle)'"));
$adonko_123_roll_requests = mysqli_num_rows(mysqli_query($procurement_connect, "SELECT id FROM products_request WHERE product = 'Adonko 123 (Roll)'"));
$adonko_123_bottle_requests = mysqli_num_rows(mysqli_query($procurement_connect, "SELECT id FROM products_request WHERE product = 'Adonko 123 (Bottle)'"));
$adonko_bitters_roll_requests = mysqli_num_rows(mysqli_query($procurement_connect, "SELECT id FROM products_request WHERE product = 'Adonko Bitters (Roll)'"));
$adonko_bitters_bottle_requests = mysqli_num_rows(mysqli_query($procurement_connect, "SELECT id FROM products_request WHERE product = 'Adonko Bitters (Bottle)'"));


$dry_gin_number_of_finished_products = get_qty($ims_products_connect, "Adonko Dry Gin (Roll)");
$atadwe_ginger_number_of_finished_products = get_qty($ims_products_connect, "Adonko Atadwe Ginger (Bottle)");
$adonko_123_roll_number_of_finished_products = get_qty($ims_products_connect, "Adonko 123 (Roll)");
$adonko_123_bottle_number_of_finished_products = get_qty($ims_products_connect, "Adonko 123 (Bottle)");
$adonko_bitters_roll_number_of_finished_products = get_qty($ims_products_connect, "Adonko Bitters (Roll)");
$adonko_bitters_bottle_number_of_finished_products = get_qty($ims_products_connect, "Adonko Bitters (Bottle)");

function get_product_card($name, $requests, $number_of_products, $url, $procurement_connect, $ims_products_connect)
{
    $total_number_of_products_requested = mysqli_fetch_assoc(mysqli_query($procurement_connect, "SELECT SUM(qty) FROM products_request WHERE product = '$name' AND is_approved = '0' ORDER BY ID DESC"))['SUM(qty)'];
    if ($number_of_products > $total_number_of_products_requested) {
        $product_deficiency = 0;
    } else {
        $product_deficiency = abs(get_qty($ims_products_connect, "Adonko Next Level") - $total_number_of_products_requested);
    }
    return '
    <div class="col-lg-4 col-md-12">
        <div class="white-box analytics-info">
            <h3 class="box-title">
                <a href="products/' . $url . '.php">' . $name . '</a>
            </h3>
            <ul class="list-inline two-part d-flex align-items-center m-0">
                <h3 class="m-0">Number of Requests</h3>
                <li class="ms-auto"><span class="counter text-success">' . ($requests ? $requests : 0) . '</span></li>
            </ul>
            <ul class="list-inline two-part d-flex align-items-center m-0">
                <h3 class="m-0">Products Remaining</h3>
                <li class="ms-auto"><span class="counter text-success">' . $number_of_products . '</span></li>
            </ul>
            <ul class="list-inline two-part d-flex align-items-center m-0">
                <h3 class="m-0">Deficiency</h3>
                <li class="ms-auto"><span class="counter text-success">' . $product_deficiency . '</span></li>
            </ul>
        </div>
    </div>
';
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
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->

        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Product Forecast</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <?php
                    echo get_product_card("Adonko Dry Gin (Roll)", $dry_gin_requests, $dry_gin_number_of_finished_products, "dry-gin", $procurement_connect, $ims_products_connect);
                    echo get_product_card("Adonko Atadwe Ginger (Bottle)", $atadwe_ginger_requests, $atadwe_ginger_number_of_finished_products, "atadwe-ginger", $procurement_connect, $ims_products_connect);
                    echo get_product_card("Adonko 123 (Roll)", $adonko_123_roll_requests, $adonko_123_roll_number_of_finished_products, "123-roll", $procurement_connect, $ims_products_connect);
                    echo get_product_card("Adonko 123 (Bottle)", $adonko_123_bottle_requests, $adonko_123_bottle_number_of_finished_products, "123-bottle", $procurement_connect, $ims_products_connect);
                    echo get_product_card("Adonko Bitters (Roll)", $adonko_bitters_roll_requests, $adonko_bitters_roll_number_of_finished_products, "bitter-roll", $procurement_connect, $ims_products_connect);
                    echo get_product_card("Adonko Bitters (Bottle)", $adonko_bitters_bottle_requests, $adonko_bitters_bottle_number_of_finished_products, "bitters-bottle", $procurement_connect, $ims_products_connect);
                    ?>
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