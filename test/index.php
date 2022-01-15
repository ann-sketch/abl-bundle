<?php

$ims_dept_connect = mysqli_connect('localhost', 'root', '', "ims_db_dept_gh_old");
$feed_datatable = mysqli_fetch_assoc(mysqli_query($ims_dept_connect, "SELECT * FROM feed_datatable ORDER BY ID DESC"));

var_dump($feed_datatable['date']) ;