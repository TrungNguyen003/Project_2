<?php
session_start();
error_reporting(0);
include('includes/ketnoi.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="assets/css/style_header.css" rel="stylesheet" />
    <link href="assets/css/style_main.css" rel="stylesheet" />

    <title>Document</title>
  </head>

  <body>
    <?php include('includes/header.php'); ?>
    <div class="main-content">
    <div id="banner">
            <div class="box-left">
                <h2>
                    <span>THỨC ĂN</span>
                    <br>
                    <span>DỊCH VỤ...</span>
                </h2>
                <p>Chuyên cung cấp các dịch vụ, món ăn đảm bảo dinh dưỡng
                    hợp vệ sinh đến người thú cưng,phục vụ 1 cách
                    hoàn hảo nhất</p>
                <button>Mua ngay</button>
            </div>
            <div class="box-right">
                <img src="assets/img/pet_rego_slider-reversed.png" alt="">
                <img src="assets/img/PetInsurance-1.png" alt="">
            </div>
            <div class="to-bottom">
                <a href="">
                    <img src="assets/to_bottom.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <script src="assets/js.js"></script>
  </body>

  </html>
<?php } ?>