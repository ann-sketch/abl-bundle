<?php 

require_once("../../env.php");

$id = $_POST["id"];
$purpose = $_POST["purpose"];

if ($purpose == 'approve'){
    $query = "UPDATE `products_request` SET `is_approved`='1' WHERE id='$id'" ;
} else if ($purpose == 'supply'){
    if (mysqli_fetch_assoc(mysqli_query($procurement_connect, "SELECT is_approved FROM `products_request` WHERE id='$id'"))["is_approved"] == 1){
        $query = "UPDATE `products_request` SET `is_supplied`='1' WHERE id='$id'" ;
    }
}

// echo $query;

mysqli_real_query($procurement_connect, $query);
$procurement_connect->close();
// echo "success";
header("Location: ./next-level.php");
