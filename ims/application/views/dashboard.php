<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php

$ims_connect = mysqli_connect("localhost", "root", "", "ims_db_gh");
$query = "SELECT name, qty FROM `products`";
$result = mysqli_query($ims_connect, $query);

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
                 <h3>" . $row['name'] . "</h3><h4>Quantity Left: <b>" . $row['qty'] . "</b></h4>
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