<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
  
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/tdh.css">
    </head>
    <body>
    <?php include('../admin/includes/header.php'); ?>
        
<!-- Header -->
<main class="main-container">
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Quản lý Phê duyệt</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Phê duyệt đơn hàng
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Tên sách</th>
                                                <th>Mã Sách </th>
                                                <th>Ngày Mượn</th>
                                                <th>Trạng Thái</th>
                                                <th>Hoạt động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                           include_once("../model/pheduyetdon_list.php");
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {               ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->TenDayDu); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->TenSP); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->MaSP); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->NgayDat); ?></td>
                                                        <td class="center"><?php if ($result->trangthai == 0) {
                                                                                echo htmlentities("Đã xác nhận");
                                                                            } else if($result->trangthai == 2){
                                                                                echo htmlentities("Đã hoàn thành");
                                                                            }else{
                                                                                echo htmlentities("Yêu cầu đặt hàng");
                                                                            }
                                                                            ?></td>
                                                        <td class="center">
                                                            <a href="duyetdon_ad_view.php?id=<?php echo htmlentities($result->id); ?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Xem/Phê Duyệt</button>
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
</main>
    </body>
        <script src="jquery-1.10.2.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="bootstrap.js"></script>
        <script src="jquery.dataTables.js"></script> 
        <script src="datatable.bootstrap.js"></script>
        <script src="custom.js"></script>
    </html>
<?php } ?>