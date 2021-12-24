<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        html,
        body,
        .container {
            height: 100vh;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 400px;
            height: 400px;
            border-radius: 50px;
            background: url("https://images.pexels.com/photos/256318/pexels-photo-256318.jpeg?cs=srgb&dl=pexels-pixabay-256318.jpg&fm=jpg"), rgba(0, 0, 0, 0.5);
            background-blend-mode: overlay;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            box-shadow: 20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;
            text-align: center;
            color: #fff;
            margin-left: 20px;
            margin-right: 20px;
            transition: 1s;
        }

        .wrapper:hover {
            width: 500px;
            height: 500px;
        }

        .wrapperII {
            background-image: url("https://adonko-bitters.com/wp-content/uploads/elementor/thumbs/WhatsApp-Image-2019-08-25-at-7.30.18-PM-oct0gu1j693rqo4bmtm8lioqemysn5w1e8j45lkskg.jpeg");
        }

        a,
        a:hover {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-6 wrapper">
                <a href="<?= base_url('../ims') ?>">
                    <h1>
                        Raw Stock
                    </h1>
                </a>
            </div>
            <div class="col-6 wrapper wrapperII">
                <a href="<?= base_url('../ims-products') ?>">
                    <h1>Finished Products</h1>
                </a>
            </div>
        </div>
    </div>
</body>

</html>