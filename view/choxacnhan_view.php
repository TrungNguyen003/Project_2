<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    include('../model/huydonhang_delete.php');

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="../assets/css/style_header.css" rel="stylesheet" />
        <link href="../assets/css/style_main.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/css/style_footer.css" />
    </head>

    <body>
        <?php include('../includes/header.php'); ?>

        <div class="main-content">
            <div class="category">
                <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="line">|</a> &nbsp;&nbsp;&nbsp;<a href="#">Danh mục sản phẩm<a>&nbsp;&nbsp;&nbsp;<a class="line">|</a>&nbsp;&nbsp;&nbsp;<a href="#">Giỏ hàng<a></h5>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-15">
                        <h4 class="header-line">Quản lý giỏ hàng</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-15">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Giỏ hàng
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Mã sản phẩm </th>
                                                <!-- <th>Ngày thêm</th> -->
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>TT</th>
                                                <th>trạng thái</th>
                                                <th>Địa chỉ</th>
                                                <th>Hoạt động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../model/choxacnhan_list.php");
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) { ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center"><img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="100"><br><?php echo htmlentities($result->TenSP); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->MaSP); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->SoLuong); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->Gia); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->thanhtien); ?><?php echo ("<sup>đ</sup>") ?></td>
                                                        <td class="center"><?php if ($result->trangthai == 0) {
                                                                                echo htmlentities("Chờ thanh toán");
                                                                            } else if ($result->trangthai == 1) {
                                                                                echo htmlentities("Đã đặt hàng/chờ xác nhận");
                                                                            } else if ($result->trangthai == 4) {
                                                                                echo htmlentities("Đơn hàng đang được giao");
                                                                            } else {
                                                                                echo htmlentities("Đơn đã hoàn thành");
                                                                            }
                                                                            ?></td>
                                                        <td class="center"><?php echo htmlentities($result->diachi); ?></td>
                                                        <td class="center">
                                                            <?php if ($result->trangthai == 4) { ?>
                                                                <a href="xacnhandon_view.php?id=<?php echo htmlentities($result->id); ?>"><button class="btn btn-success"><i class="fa fa-edit ">&nbsp;</i>Đã nhận đơn</button>
                                                            <?php } else { ?>
                                                                <a href="choxacnhan_view.php?del=<?php echo htmlentities($result->id); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"> <button class=" btn btn-danger"><i class="fa fa-pencil"></i> Hủy đơn</button>
                                                            <?php } ?>
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
            <div class="inline">

            </div>
        </div>
    </body>
    <?php include('../includes/footer.php'); ?>

    </html>
<?php } ?>