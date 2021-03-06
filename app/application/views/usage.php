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
	<style>
		@font-face {
			font-family: "Raleway-Regular";
			src: url("../fonts/raleway/Raleway-Regular.ttf");
		}

		@font-face {
			font-family: "Raleway-Bold";
			src: url("../fonts/raleway/Raleway-Bold.ttf");
		}

		@font-face {
			font-family: "Raleway-SemiBold";
			src: url("../fonts/raleway/Raleway-SemiBold.ttf");
		}

		@font-face {
			font-family: "Satisfy-Regular";
			src: url("../fonts/satisfy/Satisfy-Regular.ttf");
		}

		* {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
		}

		body {
			font-family: "Raleway-Regular";
			font-size: 13px;
			margin: 0;
		}

		:focus {
			outline: none;
		}

		textarea {
			resize: none;
		}

		input,
		textarea,
		select,
		button {
			font-family: "Raleway-Regular";
			font-size: 13px;
			color: #ccc;
		}

		select {
			-moz-appearance: none;
			-webkit-appearance: none;
			cursor: pointer;
		}

		select option[value=""][disabled] {
			display: none;
		}

		p,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6,
		ul {
			margin: 0;
		}

		ul {
			padding: 0;
			margin: 0;
			list-style: none;
		}

		a {
			text-decoration: none;
		}

		textarea {
			resize: none;
		}

		img {
			max-width: 100%;
			vertical-align: middle;
		}

		.wrapper {
			max-width: 1400px;
			display: flex;
			align-items: center;
			height: 100vh;
			margin: auto;
			justify-content: center;
		}

		.wizard {
			width: 878px;
			position: relative;
			margin: auto;
		}

		.inner {
			display: flex;
			align-items: center;
			position: relative;
		}

		.inner .image-holder {
			width: 58.88%;
		}

		.inner .form-content {
			width: 41.12%;
			padding: 15px 16px;
			background: #333;
			height: 462px;
			box-shadow: 0px 7px 18px 0px rgba(0, 0, 0, 0.2);
			-webkit-box-shadow: 0px 7px 18px 0px rgba(0, 0, 0, 0.2);
			-moz-box-shadow: 0px 7px 18px 0px rgba(0, 0, 0, 0.2);
			-ms-box-shadow: 0px 7px 18px 0px rgba(0, 0, 0, 0.2);
			-o-box-shadow: 0px 7px 18px 0px rgba(0, 0, 0, 0.2);
		}

		.inner .form-content .form-inner {
			border: 1px solid #524b42;
			height: 100%;
			padding: 68px 37px;
		}

		.inner .form-content .form-inner.form-inner-last {
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.form-header {
			text-align: center;
			margin-bottom: 35px;
		}

		.form-header h3 {
			font-family: "Raleway-Bold";
			font-size: 25px;
			color: #fff;
			text-transform: uppercase;
			margin-bottom: 9px;
		}

		.form-header p {
			font-family: "Satisfy-Regular";
			font-size: 18px;
			color: #cdaa7c;
		}

		.form-holder {
			position: relative;
		}

		.form-holder i {
			position: absolute;
			top: 1px;
			right: 0;
			color: #fff;
		}

		.form-holder.select-holder {
			width: 67px;
			display: inline-block;
			margin-right: 14px;
		}

		.form-holder.select-holder:last-child {
			margin-right: 0;
		}

		.form-holder.select-holder i {
			right: 10px;
			top: 50%;
			transform: translateY(-50%);
		}

		.form-row {
			margin-bottom: 28px;
		}

		.form-row label {
			color: #ccc;
			margin-bottom: 7px;
			display: block;
		}

		.form-row label i {
			margin-right: 3px;
		}

		.form-control {
			height: 26px;
			border: none;
			border-bottom: 2px solid #666;
			width: 100%;
			color: #fff;
			font-family: "Raleway-SemiBold";
			background: none;
		}

		.form-control:focus {
			border-color: #e9e0cf;
		}

		.form-control::-webkit-input-placeholder {
			color: #666;
			text-transform: uppercase;
		}

		.form-control::-moz-placeholder {
			color: #666;
			text-transform: uppercase;
		}

		.form-control:-ms-input-placeholder {
			color: #666;
			text-transform: uppercase;
		}

		.form-control:-moz-placeholder {
			color: #666;
			text-transform: uppercase;
		}

		select.form-control {
			padding-bottom: 0;
			text-transform: uppercase;
			border: 2px solid #666;
			height: 31px;
			padding: 0 9px;
		}

		select.form-control option {
			color: #666;
		}

		select.form-control:focus {
			border-color: #666;
		}

		.select {
			position: relative;
		}

		.select .select-control {
			height: 26px;
			border-bottom: 2px solid #666;
			width: 100%;
			color: #fff;
			font-family: "Raleway-SemiBold";
			cursor: pointer;
		}

		.select .dropdown {
			display: none;
			position: absolute;
			top: 100%;
			width: 100%;
			background: #fff;
			z-index: 9;
		}

		.select .dropdown li {
			padding: 5px 10px;
		}

		.select .dropdown li:hover {
			background: #81acee;
		}

		.datepicker-here {
			text-transform: uppercase;
		}

		.ready {
			text-align: center;
			margin-bottom: 56px;
		}

		.ready span {
			width: 38px;
			height: 38px;
			border-radius: 50%;
			background: #cdaa7c;
			display: flex;
			justify-content: center;
			align-items: center;
			margin: auto;
		}

		.ready span i {
			font-size: 40px;
			margin-top: 3px;
			display: inline-block;
		}

		.ready .text-1 {
			font-family: "Raleway-Bold";
			color: #fff;
			font-size: 25px;
			text-transform: uppercase;
			margin-top: 36px;
			margin-bottom: 9px;
		}

		.ready .text-2 {
			font-family: "Satisfy-Regular";
			color: #cdaa7c;
			font-size: 18px;
		}

		.actions ul {
			display: flex;
			justify-content: space-between;
			width: 253px;
			position: absolute;
			bottom: 79px;
			right: 52px;
		}

		.actions ul.step-last {
			justify-content: flex-end;
		}

		.actions li a {
			padding: 0;
			border: none;
			display: inline-flex;
			height: 41px;
			width: 92px;
			align-items: center;
			justify-content: center;
			font-family: "Raleway-SemiBold";
			color: #fff;
			cursor: pointer;
			text-transform: uppercase;
			border: 1px solid #666;
		}

		.actions li a:hover {
			background: #cdaa7c;
			border-color: transparent;
		}

		.actions li.step-2 a {
			width: 118px;
		}

		.actions li:last-child {
			display: none !important;
		}

		.actions li[aria-disabled="true"] a {
			opacity: 0;
			transition: all 1s;
		}

		@media (max-width: 991px) {
			.actions li.step-2 a {
				width: 100px;
			}

			.actions ul {
				width: 224px;
				right: 44px;
			}

			.inner .form-content .form-inner {
				padding: 60px 29px;
			}
		}

		@media (max-width: 767px) {
			.inner {
				display: block;
			}

			.inner .image-holder {
				width: 100%;
			}

			.inner .form-content {
				width: 100%;
			}

			.actions ul {
				width: auto;
				left: 44px;
				right: 44px;
			}
		}

		/*# sourceMappingURL=style.css.map */
	</style>
</head>

<body>
	<div class="wrapper">
		<form action="" id="wizard">
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
									<option value="volvo">Volvo</option>
									<option value="saab">Saab</option>
									<option value="mercedes">Mercedes</option>
									<option value="audi">Audi</option>
								</select>
							</div>
							<div class="form-row">
								<input type="text" class="form-control" placeholder="Enter Closing Stock">
							</div>
							<div class="d-flex justify-content-end">
								<button class="btn float-right" style="background-color: darkgoldenrod; color: #fff;">Save</button>
							</div>
						</div>
					</div>
				</div>
			</section>
		</form>
	</div>
</body>

</html>