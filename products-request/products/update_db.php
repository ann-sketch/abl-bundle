<?php 

require_once("../../env.php");

$id = $_POST["id"];
$purpose = $_POST["purpose"];

if ($purpose == 'approve'){
    $query = "UPDATE `products_request` SET `is_approved`='1' WHERE id='$id'" ;
    echo $query;
} else if ($purpose == 'supply'){
    $already_approved = mysqli_fetch_assoc(mysqli_query($procurement_connect, "SELECT is_supplied FROM `products_request` WHERE id='$id'"))["is_supplied"];
    if ($already_approved){
        $query = "UPDATE `products_request` SET `is_supplied`='0' WHERE id='$id'" ;
    } else {
        $query = "UPDATE `products_request` SET `is_supplied`='1' WHERE id='$id'" ;
    }
    // echo $already_approved;
    
}
mysqli_real_query($procurement_connect, $query);

$procurement_connect->close();
// echo "success";
header('Location: ' . $_SERVER['HTTP_REFERER']);