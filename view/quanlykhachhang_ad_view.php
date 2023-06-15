<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
  header('location:index.php');
} else {
  include('../controller/block_ad_nguoidung.php');
  include('../controller/active_ad_nguoidung.php');
?>
  <!DOCTYPE html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>🐶 Shop Pets</title>
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/tdh.css">
  </head>

  <body>
    <!------MENU SECTION START-->
    <?php include('../admin/includes/header.php'); ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="container">
        <div class="row pad-botm">
          <div class="col-md-12">
            <h4 class="header-line">Quản lý khách hàng</h4>
          </div>


        </div>
        <div class="row">
          <div class="col-md-12">
            <!-- Advanced Tables -->
            <div class="panel panel-default">
              <div class="panel-heading">
                Danh sách khách hàng
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Ngày đăng kí</th>
                        <th>trạng thái</th>
                        <th>Hoat động</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sql = "SELECT * from nguoidung";
                      $query = $dbh->prepare($sql);
                      $query->execute();
                      $results = $query->fetchAll(PDO::FETCH_OBJ);
                      $cnt = 1;
                      if ($query->rowCount() > 0) {
                        foreach ($results as $result) {               ?>
                          <tr class="odd gradeX">
                            <td class="center"><?php echo htmlentities($cnt); ?></td>
                            <td class="center"><?php echo htmlentities($result->IDNguoiDung); ?></td>
                            <td class="center"><?php echo htmlentities($result->TenDayDu); ?></td>
                            <td class="center"><?php echo htmlentities($result->EmailId); ?></td>
                            <td class="center"><?php echo htmlentities($result->SoDienThoai); ?></td>
                            <td class="center"><?php echo htmlentities($result->NgayDangKi); ?></td>
                            <td class="center"><?php if ($result->TrangThai == 1) {
                                                  echo htmlentities("Hoạt động");
                                                } else {
                                                  echo htmlentities("Bị chặn");
                                                }
                                                ?></td>
                            <td class="center">
                              <?php if ($result->TrangThai == 1) { ?>
                                <a href="../view/quanlykhachhang_ad_view.php?inid=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Bạn chắc chắn muốn chặn người này?');"> <button class="btn btn-danger">Chặn</button>
                                <?php } else { ?>

                                  <a href="../view/quanlykhachhang_ad_view.php?id=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Bạn chắc chắn muốn bỏ chặn người này?');"><button class="btn btn-primary">Bỏ chặn</button>
                                  <?php } ?>

                                  <a href="../view/lichsuhoatdong_ad_view.php?stdid=<?php echo htmlentities($result->IDNguoiDung); ?>"><button class="btn btn-success">Xem</button>


                            </td>
                          </tr>
                      <?php $cnt = $cnt + 1;
                        }
                      } ?>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
            <!--End Advanced Tables -->
          </div>
        </div>



      </div>
    </div>
    <script src="../admin/assets/js/scripts.js"></script>   
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../adminassets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="../admin/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="../admin/assets/js/custom.js"></script>
  </body>

  </html>
<?php } ?>