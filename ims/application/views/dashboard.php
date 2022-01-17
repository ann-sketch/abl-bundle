<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php

$hostname = getenv('hostname');
$username = getenv('username');
$password = getenv('password');


$ims_connect = mysqli_connect($hostname, $username, $password, "ims_db_gh");
$query = "SELECT name, qty FROM `products` ORDER BY name ASC";
$result = mysqli_query($ims_connect, $query);

function calc_raw_stock($ims_connect)
{
  $cap_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'cap'"))['qty'];
  $preform_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'preform'"))['qty'];
  $box_qty = mysqli_fetch_assoc(mysqli_query($ims_connect, "SELECT * FROM `products` WHERE `name` = 'carton'"))['qty'];

  $number_of_products = min($cap_qty, $preform_qty);
  if ($number_of_products <= $box_qty * 24) {
    return $number_of_products;
  }
}
$product_forecast = calc_raw_stock($ims_connect);

?>

<style>
  :root {
    --surface-color: #fff;
    --curve: 40;
  }

  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Noto Sans JP', sans-serif;
    background-color: #fef8f8;
  }

  .cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin: 4rem 5vw;
    padding: 0;
    list-style-type: none;
  }

  .card {
    position: relative;
    display: block;
    height: 100%;
    border-radius: calc(var(--curve) * 1px);
    overflow: hidden;
    text-decoration: none;
  }

  .card__image {
    width: 100%;
    height: auto;
  }

  .card__overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    border-radius: calc(var(--curve) * 1px);
    background-color: var(--surface-color);
    transform: translateY(100%);
    transition: .2s ease-in-out;
  }

  .card:hover .card__overlay {
    transform: translateY(0);
  }

  .card__header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 2em;
    padding: 2em;
    border-radius: calc(var(--curve) * 1px) 0 0 0;
    background-color: var(--surface-color);
    transform: translateY(-100%);
    transition: .2s ease-in-out;
  }

  .card__arc {
    width: 80px;
    height: 80px;
    position: absolute;
    bottom: 100%;
    right: 0;
    z-index: 1;
  }

  .card__arc path {
    fill: var(--surface-color);
    d: path("M 40 80 c 22 0 40 -22 40 -40 v 40 Z");
  }

  .card:hover .card__header {
    transform: translateY(0);
  }

  .card__thumb {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    border-radius: 50%;
  }

  .card__title {
    font-size: 20px;
    margin: 0 0 .3em;
    color: #6A515E;
  }

  .card__tagline {
    display: block;
    margin: 1em 0;
    font-family: "MockFlowFont";
    font-size: .8em;
    color: #D7BDCA;
  }

  .card__status {
    font-size: .8em;
    color: #D7BDCA;
  }

  .card__description {
    font-size: 16px;
    padding: 0 2em 2em;
    margin: 0;
    color: gray;
    font-family: "MockFlowFont";
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    overflow: hidden;
  }
</style>

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

        <!--  -->
        <?php
        $adonko_123_query = "SELECT name, qty FROM `products` WHERE name LIKE '%123%' ORDER BY name ASC";
        $adonko_2fingers_query = "SELECT name, qty FROM `products` WHERE name LIKE '%fingers%' ORDER BY name ASC";
        $adonko_ginger_query = "SELECT name, qty FROM `products` WHERE name LIKE '%ginger%' ORDER BY name ASC";
        $adonko_bitters_query = "SELECT name, qty FROM `products` WHERE name LIKE '%bitters%' ORDER BY name ASC";
        $adonko_drygin_query = "SELECT name, qty FROM `products` WHERE name LIKE '%dry%' ORDER BY name ASC";
        $other_materials_query = "SELECT name,qty FROM products
                                WHERE name NOT LIKE '%123%'
                                  AND name NOT LIKE '%fingers%'
                                  AND name NOT LIKE '%ginger%'
                                  AND name NOT LIKE '%bitters%'
                                  AND name NOT LIKE '%dry%'
                                ORDER BY name ASC";


        $adonko_123_result = mysqli_query($ims_connect, $adonko_123_query);
        $adonko_2fingers_result = mysqli_query($ims_connect, $adonko_2fingers_query);
        $adonko_ginger_result = mysqli_query($ims_connect, $adonko_ginger_query);
        $adonko_bitters_result = mysqli_query($ims_connect, $adonko_bitters_query);
        $adonko_drygin_result = mysqli_query($ims_connect, $adonko_drygin_query);
        $other_materials_result = mysqli_query($ims_connect, $other_materials_query);

        ?>
        <!--  -->

        <ul class="cards">
          <li>
            <a href="" class="card">
              <img src="assets/images/123.png" class="card__image" alt="" />
              <div class="card__overlay">
                <div class="card__header">
                  <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                    <path />
                  </svg>
                  <div class="card__header-text">
                    <h3 class="card__title">Adonko 123</h3>

                    <!-- <span class="card__status">1 hour ago</span> -->
                  </div>
                </div>
                <?php while ($row = mysqli_fetch_array($adonko_123_result)) { ?>
                  <span class="card__description"><?php echo $row['name'] . "<br>Quantity Left: " . $row['qty']; ?></span>
                <?php } ?>

              </div>
            </a>
          </li>
          <li>
            <a href="" class="card">
              <img src="assets/images/2fingers.png" class="card__image" alt="" />
              <div class="card__overlay">
                <div class="card__header">
                  <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                    <path />
                  </svg>
                  <div class="card__header-text">
                    <h3 class="card__title">Adonko 2fingers</h3>

                    <!-- <span class="card__status">1 hour ago</span> -->
                  </div>
                </div>
                <?php while ($row = mysqli_fetch_array($adonko_2fingers_result)) { ?>
                  <span class="card__description"><?php echo $row['name'] . "<br>Quantity Left: " . $row['qty']; ?></span>
                <?php } ?>

              </div>
            </a>
          </li>
          <li>
            <a href="" class="card">
              <img src="assets/images/ginger.png" class="card__image" alt="" />
              <div class="card__overlay">
                <div class="card__header">
                  <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                    <path />
                  </svg>
                  <div class="card__header-text">
                    <h3 class="card__title">Adonko Ginger</h3>

                    <!-- <span class="card__status">1 hour ago</span> -->
                  </div>
                </div>
                <?php while ($row = mysqli_fetch_array($adonko_ginger_result)) { ?>
                  <span class="card__description"><?php echo $row['name'] . "<br>Quantity Left: " . $row['qty']; ?></span>
                <?php } ?>

              </div>
            </a>
          </li>
          <li>
            <a href="" class="card">
              <img src="assets/images/bitters.png" class="card__image" alt="" />
              <div class="card__overlay">
                <div class="card__header">
                  <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                    <path />
                  </svg>
                  <div class="card__header-text">
                    <h3 class="card__title">Adonko Bitters</h3>

                    <!-- <span class="card__status">1 hour ago</span> -->
                  </div>
                </div>
                <?php while ($row = mysqli_fetch_array($adonko_bitters_result)) { ?>
                  <span class="card__description"><?php echo $row['name'] . "<br>Quantity Left: " . $row['qty']; ?></span>
                <?php } ?>

              </div>
            </a>
          </li>
          <li>
            <a href="" class="card">
              <img src="assets/images/drygin.png" class="card__image" alt="" />
              <div class="card__overlay">
                <div class="card__header">
                  <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                    <path />
                  </svg>
                  <div class="card__header-text">
                    <h3 class="card__title">Adonko Dry Gin</h3>

                    <!-- <span class="card__status">1 hour ago</span> -->
                  </div>
                </div>
                <?php while ($row = mysqli_fetch_array($adonko_drygin_result)) { ?>
                  <span class="card__description"><?php echo $row['name'] . "<br>Quantity Left: " . $row['qty']; ?></span>
                <?php } ?>

              </div>
            </a>
          </li>
          <li>
            <a href="" class="card">
              <img src="https://thumbs.dreamstime.com/z/pile-preform-shape-plastic-bottles-injection-process-material-pet-bottle-blowing-drinking-water-factory-174660891.jpg" class="card__image" alt="" />
              <div class="card__overlay">
                <div class="card__header">
                  <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                    <path />
                  </svg>
                  <div class="card__header-text">
                    <h3 class="card__title">Other Materials</h3>

                    <!-- <span class="card__status">1 hour ago</span> -->
                  </div>
                </div>
                <?php while ($row = mysqli_fetch_array($other_materials_result)) { ?>
                  <span class="card__description"><?php echo $row['name'] . "<br>Quantity Left: " . $row['qty']; ?></span>
                <?php } ?>
              </div>
            </a>
          </li>
        </ul>

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
      <!-- <div class="row">

        <div class='col-lg-6 col-xs-6'>
          <div class='small-box bg-aqua'>
            <div class='inner'>
                 <h3 style="white-space:normal">Number of Products that can be produced from raw stocks: <b><?php echo $product_forecast ?></b></h3>
              </div>
            </div>
          </div>
      </div> -->



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