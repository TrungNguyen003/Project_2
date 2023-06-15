<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐶 Shop Pets</title>
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/script/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href="../assets/css/style_header.css" rel="stylesheet" />
    <link href="../assets/css/style_main.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style_footer.css">

    <title>Document</title>
  </head>

  <body>
    <?php include('../includes/header.php'); ?>
    <div class="main-content">
      <div id="banner">
        <div class="box-left">
          <h2>
            <span>THỨC ĂN</span>
            <br>
            <span>DỊCH VỤ...</span>
          </h2>
          <p>Chuyên cung cấp các dịch vụ,<br> món ăn đảm bảo dinh dưỡng
            hợp vệ sinh đến thú cưng,phục vụ 1 cách
            hoàn hảo nhất</p>
          <button>Mua ngay</button>
        </div>
      </div>

      <div class="effect-icons">
        <img src="../png/giphy (1).gif">
        <img src="../png/giphy (1).gif">
        <img src="../png/giphy (1).gif">
        <img src="../png/giphy (1).gif">
        <img src="../png/giphy (1).gif">
        <img src="../png/giphy (1).gif">
      </div>
      <div class="to-bottom">
      </div>
      <div class="category">
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="line">|</a> &nbsp;&nbsp;&nbsp;<a href="#">Danh mục sản phẩm<a> | <a href="#">Thức ăn</a></h5>
      </div>
    </div>
    <!--  -->
    <section>
      <div class="content-wrapper">
        <div class="container">
          <div class="row pad-botm">
            <div class="col-md-12">
              <h2 class="header-line">Thức ăn</h2>
              <div class="linee">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- Advanced Tables -->

                <div class="panel-body">
                  <?php 
                  include_once("../model/thucan_list.php");
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) {               ?>
                      <div class="col-md-3" style="float:left;">
                        <figure class="snip1205">
                          <a href="trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>"><img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="250"></a><br>
                          <a class="mua" href="trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>">Mua</a>
                          <br /><b><?php echo htmlentities($result->TenSP); ?></b><br />
                          <?php echo htmlentities($result->TenTheLoai); ?><br />
                          <?php echo htmlentities($result->GiaSach); ?><br />
                        </figure>
                      </div>
                  <?php $cnt = $cnt + 1;
                    }
                  } ?>

                </div>
                <div class="view-more">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

    <!--  -->


    <div class="end-main">
    </div>
    <div class="container-btn">
      <div class="paginationn">
        <button class="btn1" onclick="backBtn()">Prev</button>
        <ul class="pagination-btn">
          <li class="link activeee" value="1" onclick="activeLink()">1</li>
          <li class="link" value="2" onclick="activeLink()">2</li>
          <li class="link" value="3" onclick="activeLink()">3</li>
          <li class="link" value="4" onclick="activeLink()">4</li>
          <li class="link" value="5" onclick="activeLink()">5</li>
          <li class="link" value="6" onclick="activeLink()">6</li>
        </ul>
        <button class="btn2" onclick="nextBtn()">Next</button>
      </div>
    </div>

  </body>

  <?php include('../includes/footer.php'); ?>
  <script src="../assets/script/pagiation.js"></script>
  <script src="../assets/js.js"></script>

  <script src="../assets/script/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS  -->
  <script src="../assets/script/bootstrap.js"></script>
  <!-- DATATABLE SCRIPTS  -->
  <script src="../assets/script/dataTables/jquery.dataTables.js"></script>
  <script src="../assets/script/dataTables/dataTables.bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
  <script src="../assets/script/custom.js"></script>
  <script src="../assets/script/main-shop.js">

  </script>

  </html>
<?php } ?>