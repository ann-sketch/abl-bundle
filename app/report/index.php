<?php
include "../../env.php";
$query = "SELECT * FROM daily_usage_products ORDER BY product_name ASC";
$result = mysqli_query($procurement_connect, $query);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Adonko Bitters Ltd</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <div class="row">
      <?php

      while ($row = mysqli_fetch_assoc($result)) {
        $url = "url('" . $row['img_url'] . "')";
        echo '
          <div class="col-lg-6 item-card" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), ' . $url . ';">
            <a href="item-report/' . $row["report_url"] . '.php">
              <h1>' . $row["product_name"] . '</h1>
            </a>
          </div>
        ';
      }

      ?>
    </div>
  </div>
</body>

</html>