<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {


?>
    <!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
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
                        <?php $sid = $_GET['stdid']; ?>
                        <h4 class="header-line">#<?php echo $sid; ?> Lịch sử mua hàng</h4>
                    </div>


                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <?php echo $sid; ?> Chi tiết
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên</th>
                                                <th>Sản phẩm / dịch vụ</th>
                                                <th>Ngày mua</th>
                                                <th>Số lượng</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                               include_once("../model/lichsuhoatdong_list.php");
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {               ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->TenDayDu); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->TenSP); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->NgayDat); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->SoLuong); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->thanhtien); ?></td>
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
        <script src="../admin/assets/js/jquery-1.10.2.js"></script>
        <script src="../admin/assets/js/scripts.js"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="../admin/assets/js/bootstrap.js"></script>
        <!-- DATATABLE SCRIPTS  -->
        <script src="../admin/assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="../admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="../admin/assets/js/custom.js"></script>
    </body>

    </html>
<?php } ?>