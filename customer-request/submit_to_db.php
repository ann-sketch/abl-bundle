<?php

require_once("./connection.php");


if (empty(!$_POST['name']) and empty(!$_POST['products'])  and empty(!$_POST['qty'])) {
    $name = $_POST['name'];
    $products = $_POST['products'];
    $qty = $_POST['qty'];


    $product = mysqli_query($ims_products_connect, "SELECT * FROM `products` WHERE `name` = '$products'");
    $product_qty = mysqli_fetch_assoc($product)['qty'];

    if ($product_qty >= $qty) {
        $deficient_msg = "Quantity is available<br>";
        // echo "Quantity is available<.br>";
        mysqli_real_query($procurement_connect, "INSERT INTO `products_request` (`name`, `product`, `qty`, `deficient`) VALUES ('$name', '$products', '$qty', '$deficient_msg')");
    } else {
        // echo "Quantity is not available<br>";
        // echo "checking if there are enough quantity in the inventory...<br>";
        $total = calc_raw_stock($ims_connect) + $product_qty;
        if ($total >= $qty) {
            // echo "";
            $deficient_msg = "Deficient: None.<br>Quantity is not available.<br>An extra " . calc_raw_stock($ims_connect) . " products can be produced from raw stock.<br>";
            mysqli_real_query($procurement_connect, "INSERT INTO `products_request` (`name`, `product`, `qty`, `deficient`) VALUES ('$name', '$products', '$qty', '$deficient_msg')");
        } else {
            // echo "Not enough quantity in the warehouse.<br>";
            $deficient = $qty - $total;
            $d_cap = $deficient;
            $d_preform = $deficient;
            $d_box = $deficient / 24;
            $deficient_msg = "Deficient products:<br>Cap: " . $d_cap . "<br>Preform: " . $d_preform . "<br>Box: " . round($d_box) . "<br>";
            mysqli_real_query($procurement_connect, "INSERT INTO `products_request` (`name`, `product`, `qty`, `deficient`) VALUES ('$name', '$products', '$qty', '$deficient_msg')");
        }
    }
    echo "Your Request has been sent successesfully. <br> You'll be notified after request has been processed.";
} else {
    echo "Fill all the fields<br>";
}


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



// echo '<pre>';
// var_dump($b);
// echo '</pre>';


// $procurement_connect->close();
// header("Location: ./index.php");