<?php
    $connect = mysqli_connect("localhost", "root", "", "ims_db_dept_gh_old");
    $query = "SELECT * FROM feed_datatable ORDER BY ID DESC";
    $result = mysqli_query($connect, $query);
?>