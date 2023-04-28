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
    <title>Document</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
<div class="content">
  <div>

  </div>
</div>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="assets/img/istock-669656070.png" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="assets/img/pet_rego_slider-reversed.png" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="assets/img/PetInsurance-1.png" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
    <script src="assets/js.js"></script>
</body>
</html>
<?php } ?>