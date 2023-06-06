<?php
session_start();
error_reporting(0);   //tắt tất cả các báo cáo lỗi
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else { ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/styles_bdk.css">
  </head>

  <body>
    <?php include('../admin/includes/header.php'); ?>
    <!-- End Sidebar -->

    <!-- Main -->
    <main class="main-container">
      <div class="main-title">
        <h2>DASHBOARD</h2>
      </div>
      <div class="main-cards">

        <a class="card" href="../view/themdonhang_ad_view.php">
          <div class="card-inner">
            <h2>Thêm đơn hàng</h2>
            <i class="fa-brands fa-shopify fa-3x"></i>
          </div>
        </a>

        <a class="card" href="../view/pheduyetdon_ad_view.php">
          <div class="card-inner">

            <h2>Duyệt đơn &nbsp; <?php
                                  $sql2 = "SELECT id from duyetdon where (trangthaimua='' || trangthaimua is null)";
                                  $query2 = $dbh->prepare($sql2);
                                  $query2->execute();
                                  $results2 = $query2->fetchAll(PDO::FETCH_OBJ); //Chỉ định rằng phương thức tìm nạp sẽ trả về mỗi hàng dưới dạng một đối tượng có tên thuộc tính tương ứng với tên cột được trả về trong tập hợp kết quả.
                                  $trangthai = $query2->rowCount();
                                  ?>
              <?php echo htmlentities($trangthai); ?>
            </h2>
            <i class="fa-solid fa-scroll fa-3x"></i>

          </div>
        </a>
        <a class="card" href="../view/lichsubanhang_ad_view.php">
          <div class="card-inner">
            <h2>Lịch sử bán hàng</h2>
          </div>


        </a>
      </div>
      <div class="main-title">
        <h2>Quản lý sản phẩm / Dịch vụ </h2>
      </div>
      <div class="main-cards">
        <a class="card" href="../view/quanlyhanghoa_ad_view.php">
          <div class="card-inner">
            <h2>Quản lý &nbsp; <?php
                        $sql = "SELECT id from sanpham ";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ); //Chỉ định rằng phương thức tìm nạp sẽ trả về mỗi hàng dưới dạng một đối tượng có tên thuộc tính tương ứng với tên cột được trả về trong tập hợp kết quả.
                        $allsach = $query->rowCount();
                        ?>
              <?php echo htmlentities($allsach); ?></h2>

          </div>

        </a>

        <a class="card" href="../view/themsanpham_ad_view.php">
          <div class="card-inner">
            <h2>Thêm sản phẩm</h2>
          </div>

        </a>
        <a class="card" href="../view/themtheloai_ad_view.php">
          <div class="card-inner">
            <h2>Thêm thể loại</h2>
            <i class="fa-solid fa-scroll fa-3x"></i>
          </div>

        </a>
      </div>
      <div class="main-title">
        <h2>Quản lý khách hàng</h2>
      </div>
      <div class="main-cards">
        <a class="card" href="../view/quanlykhachhang_ad_view.php">
          <div class="card-inner">
            <h3>Quản lý khách hàng &nbsp; 
            <?php
                        $sql = "SELECT id from nguoidung ";
                        $query = $dbh->prepare($sql);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ); //Chỉ định rằng phương thức tìm nạp sẽ trả về mỗi hàng dưới dạng một đối tượng có tên thuộc tính tương ứng với tên cột được trả về trong tập hợp kết quả.
                        $allnguoidung = $query->rowCount();
                        ?>
              <?php echo htmlentities($allnguoidung); ?></h3>
            </h2>
          </div>

        </a>
      </div>
    </main>
    </div>
    <script src="../admin/assets/js/scripts.js"></script>
  </body>

  </html>
<?php } ?>