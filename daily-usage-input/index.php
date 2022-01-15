<?php
include "../env.php";
$query = "SELECT * FROM daily_usage_products ORDER BY product_name ASC";
$result = mysqli_query($procurement_connect, $query);
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>ADONKO BITTERS REPORT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- STYLE CSS -->
	<link rel="stylesheet" href="css/style.css">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
	<div class="wrapper">
		<form action="submit_to_db.php" method='POST' wizard">
			<!-- SECTION 2 -->
			<h4></h4>
			<section>
				<div class="inner">
					<div class="image-holder">
						<img src="https://adonko-bitters.com/wp-content/uploads/elementor/thumbs/WhatsApp-Image-2019-08-25-at-7.30.18-PM-oct0gu1j693rqo4bmtm8lioqemysn5w1e8j45lkskg.jpeg" alt="">
					</div>
					<div class="form-content">
						<div class="form-inner" style=" align-items: center;">
							<div class="form-header">
								<h3>ADONKO BITTERS</h3>
								<p>~ Daily Usage ~</p>
							</div>
							<div class="form-row">
								<select class="form-control" name="item" id="item">

									<?php 

									while ($row = mysqli_fetch_assoc($result)) {
										echo "<option value='" . $row['product_name'] . "'>" . $row['product_name'] . "</option>";
									}

									?>
								</select>
							</div>
							<div class="form-row">
								<input type="text" class="form-control" name="closing" placeholder="Enter Closing Stock">
							</div>
							<div class="d-flex justify-content-end">
								<button class="btn float-right" id="save-btn" style="background-color: darkgoldenrod; color: #fff;" onclick="save()">Save</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
	<script>
		function save() {
			document.getElementById("save-btn").style.backgroundColor = "green";
			document.getElementById("save-btn").innerHTML = "Saved";
		}
	</script>

</body>

</html>