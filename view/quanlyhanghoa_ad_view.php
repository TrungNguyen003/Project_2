<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    include('../controller/delete_ad_hanghoa.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="../admin/assets/css/bootstrap.css" rel="stylesheet"> 
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/tdh.css">
  </head>
  <body>
  <?php include('../admin/includes/header.php'); ?>
    
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
      <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Quản lý sách</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Danh sách sách
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sách</th>
                                                <th>Loại</th>
                                                <th>Tác giả</th>
                                                <th>Mã Sách</th>
                                                <th>Giá Mượn</th>
                                                <th>Chỉnh Sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                             include_once("../model/quanlyhanghoa_list.php");
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {               ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center" width="400">
                                                            <img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="100">
                                                            <br /><b><?php echo htmlentities($result->TenSP); ?></b>
                                                        </td>
                                                        <td class="center"><?php echo htmlentities($result->TenTheLoai); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->TenPhanLoai); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->MaSP); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->GiaSP); ?></td>
                                                        <td class="center">

                                                            <a href="../view/suasanpham_ad_view.php?idsp=<?php echo htmlentities($result->idsp); ?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                                                <a href="../view/quanlyhanghoa_ad_view.php?del=<?php echo htmlentities($result->idsp); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" >  <button class=" btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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
                    </div>
                </div>
            </div>
        </div>
    <?php include('quanlytheloai.php'); ?>

      </main>
    </div>
    <script src="../admin/assets/js/scripts.js"></script>
  </body>
</html>
<?php } ?>