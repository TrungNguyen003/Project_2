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
    <link href="assets/css/bootstrap.css" rel="stylesheet" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="assets/css/style_header.css" rel="stylesheet" />
    <link href="assets/css/style_main.css" rel="stylesheet" />

    <title>Document</title>
  </head>

  <body>
    <?php include('includes/header.php'); ?>
    <div class="prd-search">
      <form id="product-search" action="" method="GET">
        <input class="search" type="text" value="" name="name" placeholder="Tìm kiếm" required>
        <button type="submit" value=""><i class="fa-solid fa-magnifying-glass"></i></button>
      </form>
    </div>
    <div class="main-content">
      <div id="banner">
        <div class="box-left">
          <h2>
            <span>THỨC ĂN</span>
            <br>
            <span>DỊCH VỤ...</span>
          </h2>
          <p>Chuyên cung cấp các dịch vụ, món ăn đảm bảo dinh dưỡng
            hợp vệ sinh đến thú cưng,phục vụ 1 cách
            hoàn hảo nhất</p>
          <button>Mua ngay</button>
        </div>
        <div class="box-right">
          <img src="assets/img/pet_rego_slider-reversed.png" alt="">
          <img src="assets/img/PetInsurance-1.png" alt="">
        </div>
      </div>
      <div class="to-bottom">
      </div>
      <div class="category">
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="line">|</a> &nbsp;&nbsp;&nbsp;<a href="#">Danh mục sản phẩm<a></h5>
      </div>
      <section>
        <div class="content-wrapper">
          <div class="container">
            <div class="row pad-botm">
              <div class="col-md-12">
                <h4 class="header-line">Sản Phẩm mới</h4>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <!-- Advanced Tables -->
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <?php $sql = "SELECT sach.TenSach,theloai.TenTheLoai,tacgia.TenTacGia,sach.MaSach,sach.GiaSach,sach.id as IDSach,sach.HinhSach,sach.DuocPhatHanh from  sach join theloai on theloai.id=sach.CatId join tacgia on tacgia.id=sach.IDTacGia";
                      $query = $dbh->prepare($sql);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $result) {               ?>
                          <div class="col-md-3" style="float:left; height:300px;">
                            <img src="admin/imgsach/<?php echo htmlentities($result->HinhSach); ?>" width="150">
                            <br /><b><?php echo htmlentities($result->TenSach); ?></b><br />
                            <?php echo htmlentities($result->TenTheLoai); ?><br />
                            <?php echo htmlentities($result->TenTacGia); ?><br />
                            <?php echo htmlentities($result->MaSach); ?><br />
                            <?php echo htmlentities($result->GiaSach); ?><br />
                          </div>

                      <?php $cnt = $cnt + 1;
                        }
                      } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="assets/js.js"></script>
  </body>

  </html>
<?php } ?>