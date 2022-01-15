<?php

require_once("../env.php");

$item = $_POST['item'];
$closing = $_POST['closing'];

$a = mysqli_query($procurement_connect, "SELECT date FROM daily_usage WHERE item = '$item' ORDER BY id DESC LIMIT 1;");
$date = substr(mysqli_fetch_assoc($a)['date'], 0, 10);

function is_same_day($date)
{
    // echo $date, date("Y-m-d");
    
    return date("Y-m-d") == $date;
}

if (is_same_day($date)) {
    echo "first";
    mysqli_real_query($procurement_connect, "UPDATE `daily_usage` SET `item`='$item', `closing`='$closing' WHERE date='$date' AND item='$item'");
} else {
    mysqli_real_query($procurement_connect, "INSERT INTO `daily_usage`(`item`,`closing`) VALUES ('$item','$closing')");
    echo "second";
}

// header("Location: ./index.php");