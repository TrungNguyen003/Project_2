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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>🐶 Shop Pets</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="../assets/css/style_header.css" rel="stylesheet" />
        <link href="../assets/css/style_main.css" rel="stylesheet" />
        <link href="../assets/css/style_giohang.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../assets/css/style_footer.css">



    </head>

    <body>
        <?php include('../includes/header.php'); ?>
        <section>
        <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-md-15">
                                <h4 class="header-line">Lịch sử mua hàng</h4>
                            </div>

                        </div>
                    </div>
                    <form method="post">
                        <div class="col-md-15">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tr>
                                    <td>#</td>                            
                                    <td>Tên sản phẩm</td>
                                    <td>Mã Sản phẩm </td>
                                    <!-- <th>Ngày thêm</th> -->
                                    <td>Số lượng</td>
                                    <td>Giá</td>
                                    <td>Trạng Thái</td>
                                    <td>Ngày đặt</td>
                                    <td>Địa chỉ</td>
                                </tr>
                                <?php
                               
                               include_once("../model/lichsumuahang_list.php");
                          
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt); ?></td>                                           
                                            <td class="center"><img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="100"><br><?php echo htmlentities($result->TenSP); ?></td>
                                            <td class="center"><?php echo htmlentities($result->MaSP); ?></td>

                                            <td class="center"><?php echo htmlentities($result->SoLuong); ?></td>
                                            <td class="center"><?php echo htmlentities($result->thanhtien); ?></td>
                                            <td class="center"><?php if ($result->trangthai == 0) {
                                                                    echo htmlentities("Chờ thanh toán");
                                                                } else if ($result->trangthai == 1) {
                                                                    echo htmlentities("Đã đặt hàng/chờ xác nhận");
                                                                } else {
                                                                    echo htmlentities("Đơn đã hoàn thành");
                                                                }
                                                                ?></td>
                                            <td class="center"><?php echo htmlentities($result->NgayDat); ?></td>
                                            <td class="center"><?php echo htmlentities($result->diachi); ?></td>


                                        </tr>
                                        <?php $cnt = $cnt + 1;
                                    }
                                } ?>
                        
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>   
    </body>
    <?php include('../includes/footer.php'); ?>
    </html>
<?php } ?>