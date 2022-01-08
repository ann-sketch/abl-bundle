<?php
require_once("../env.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="./style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <!-- Navigation -->
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
            <div class="container">
                <a class="navbar-brand" href="#">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> -->

        <!-- Page Content -->
        <div class="container">
            <div class="card border-0 shadow my-5">
                <div class="card-body p-5">
                    <h1 class="">Make A Request</h1>
                    <hr>
                    <!-- <form action="sumbit_to_db.php" method="POST"> -->
                    <div class="row">
                        <div class="col-6">
                            <label for="products" class="guide">Customer's Name:</label>
                        </div>
                        <div class="col-6">
                            <input type="text" name="name" id="name" placeholder="Enter Your Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="products" class="guide">Select Product:</label>
                        </div>
                        <div class="col-6">
                            <select name="products" id="products" required>
                                <option value="Adonko Dry Gin (Roll)">Adonko Dry Gin (Roll)</option>
                                <option value="Adonko Atadwe Ginger (Bottle)">Adonko Atadwe Ginger (Bottle)</option>
                                <option value="Adonko 123 (Roll)">Adonko 123 (Roll)</option>
                                <option value="Adonko 123 (Bottle)">Adonko 123 (Bottle)</option>
                                <option value="Adonko Bitters (Roll)">Adonko Bitters (Roll)</option>
                                <option value="Adonko Bitters (Bottle)">Adonko Bitters (Bottle)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="guide">Select Quantity:</label>
                        </div>
                        <div class="col-6">
                            <input type="text" name="qty" id="qty" placeholder="Enter Quantity" required>
                            <!-- <br> -->
                            <h6 id="checkAvailability" style="margin-top:20px;"></h6>
                            <br>
                            <button type="submit" onclick="checkAvailability()" class="btn btn-success">Make Request</button>
                        </div>
                    </div>
                    <!-- </form> -->
                    <!-- <p class="lead">In this snippet, the background image is fixed to the body element. Content on the page will
                        scroll, but the image will remain in a fixed position!</p>
                    <p class="lead">Scroll down...</p> -->
                    <!-- <div style="height: 700px"></div> -->
                    <!-- <p class="lead mb-0">You've reached the end!</p> -->
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkAvailability() {
            $.post("submit_to_db.php", {
                    name: $("#name").val(),
                    products: $("#products").val(),
                    qty: $("#qty").val()
                },
                function(text) {
                    document.getElementById("checkAvailability").innerHTML = text;
                });
        }


        // function checkA
    </script>


</body>

</html>