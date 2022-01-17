<?php

require_once("../../env.php");

$name = $_POST['name'];
$qty = $_POST['qty'];
$prev_qty = $_POST['prev_qty'];

$final_qty = $qty + $prev_qty;
$description = "$qty was added to $prev_qty, making a total of $final_qty";

mysqli_real_query($ims_connect, "UPDATE products SET qty = '$final_qty' WHERE name = '$name'");

mysqli_real_query($ims_connect, "INSERT INTO `restock_history`(`item`, `description`) VALUES ('$name','$description')");


echo "Restocked Successfully!";

?>