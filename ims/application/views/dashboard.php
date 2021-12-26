<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php

$ims_connect = mysqli_connect(getenv('hostname'), getenv('username'), getenv('password'), "ims_db_gh");
$query = "SELECT name, qty FROM `products`";
$result = mysqli_query($ims_connect, $query);

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
$product_forecast = calc_raw_stock($ims_connect);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <?php if ($is_admin == true) : ?>

      <div class="row">
        <?php while ($row = mysqli_fetch_array($result)) {
          echo "<div class='col-lg-3 col-xs-6'>
          <div class='small-box bg-aqua'>
            <div class='inner'>
                 <h3 style='white-space:normal'>" . $row['name'] . "</h3><h4>Quantity Left: <b>" . $row['qty'] . "</b></h4>
              </div>
            </div>
          </div>";
        } ?>
        <!-- ./col -->
        <!-- <div class="col-lg-3 col-xs-6"> -->
          <!-- small box -->
          <!-- <div class="small-box bg-green"> -->
            <!-- <div class="inner"> -->
              <!-- <h3><?php echo $total_paid_orders ?></h3> -->

              <!-- <h4><b>Total Orders</b></h4> -->
            <!-- </div> -->
            <!-- <div class="icon"> -->
              <!-- <i class="fa fa-dollar"></i> -->
              <!-- </div> -->
              <!-- <a href="<?php echo base_url('orders/') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
              <!-- </div> -->
              <!-- </div> -->
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <div class="row">

        <div class='col-lg-6 col-xs-6'>
          <div class='small-box bg-aqua'>
            <div class='inner'>
                 <h3 style="white-space:normal">Number of Products that can be produced from raw stocks: <b><?php echo $product_forecast ?></b></h3>
              </div>
            </div>
          </div>
      </div>



      <!-- /.row -->
    <?php endif; ?>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript">
  $(document).ready(function() {
    $("#dashboardMainMenu").addClass('active');
  });
</script>