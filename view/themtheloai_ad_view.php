<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  include('../controller/add_ad_theloai.php');  
?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐶 Shop Pets</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/tdh.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

  </head>

  <body>
  <?php include('../admin/includes/header.php'); ?>

    <main class="main-container">
      <div class="content-wrapper">
        <div class="container">
          <div class="row pad-botm">
            <div class="col-md-12">
              <h4 align="center">Thêm thể loại</h4>

            </div>

          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <div class=" panel panel-info">
                <div class="panel-heading">
                  Thông tin danh mục
                </div>
                <div class="panel-body">
                  <form role="form" method="post">
                    <div class="form-group">
                      <label>Tên danh mục</label>
                      <input class="form-control" type="text" name="loaisach" autocomplete="off" required />
                    </div>
                    <div class="form-group">
                      <label>Trạng thái</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="TrangThai" id="TrangThai" value="1" checked="checked"> Hoạt động
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="TrangThai" id="TrangThai" value="0">Không hoạt động
                        </label>
                      </div>

                    </div>
                    <button type="submit" name="create" class="btn btn-info">Tạo </button>

                  </form>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </main>
    </div>
  </body>
  <?php include('footer.php'); ?>
  <script src="../admin/assets/js/scripts.js"></script>
  <script src="../jquery-1.10.2.js"></script>
  <script src="../bootstrap.js"></script>

  </html>
<?php } ?>