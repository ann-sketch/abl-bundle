<?php
include "connection.php";

if (empty(!$_POST['name']) and empty(!$_POST['products'])  and empty(!$_POST['qty'])) {
    $name = $_POST['name'];
    $products = $_POST['products'];
    $qty = $_POST['qty'];
    echo $name;
    echo $products;
    echo $qty;
}


