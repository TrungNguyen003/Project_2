<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    include('../model/dat_xoahang_model.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
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
        <div class="main-content">
            <div class="category">
                <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="line">|</a> &nbsp;&nbsp;&nbsp;<a href="#">Danh mục sản phẩm<a>&nbsp;&nbsp;&nbsp;<a class="line">|</a>&nbsp;&nbsp;&nbsp;<a href="#">Giỏ hàng<a></h5>
            </div>
        </div>
        <section>
        <div class="container">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-md-15">
                                <h4 class="header-line">Quản lý giỏ hàng</h4>
                            </div>

                        </div>
                    </div>
                    <form method="post">
                        <div class="col-md-15">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tr>
                                    <td>#</td>
                                    <td><i class="fa-solid fa-check"></i></td>
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
                               
                               include_once("../model/giohang_list.php");
                          
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                    foreach ($results as $result) { ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt); ?></td>
                                            <td>
                                                <input type="checkbox" name="orderId[]" value="<?php echo ($result->id); ?>">
                                            </td>
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
                                            <td class="center"><?php echo htmlentities($result->ngaymuon); ?></td>
                                            <td class="center"><?php echo htmlentities($result->diachi); ?></td>


                                        </tr>
                                        <?php $cnt = $cnt + 1;
                                    }
                                } ?>
                              
                                <tr>
                                    <td colspan="3" align="center">
                                        <?php if ($result->trangthai == 0) { ?>
                                        <button type="submit" name="order" class="btn btn-info" data-toggle="modal"> <span>Đặt hàng</span></button>
                                        <button type="submit" name="delete" class="btn btn-danger" data-toggle="modal"> <span>Xóa</span></button>
                                        <?php } else { ?>
                                            <?php echo ("<h3>Giỏ hàng rỗng</h3>"); ?>
                                        <?php } ?>
                                    </td>
                                    <td colspan="7" align="center"> <?php
                                                                    $sid = $_SESSION['id'];
                                                                    $sql = "SELECT SUM(duyetdon.Gia*duyetdon.SoLuong) as tong FROM duyetdon WHERE duyetdon.IDNguoiDung=:sid and duyetdon.trangthai=0";
                                                                    $query = $dbh->prepare($sql);
                                                                    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                                                                    $query->execute();
                                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                                    if ($query->rowCount() > 0) {
                                                                        foreach ($results as $result) { ?>
                                                <?php if ($result->trangthai == 0) { ?>
                                                    <?php echo ("<h3>Tổng Tiền: &nbsp;  "); ?> <?php echo htmlentities($result->tong); ?> <?php echo ("</h3>") ?>
                                                <?php } else { ?>
                                                    <?php echo ("<h3>Tổng Tiền: 0&nbsp;  "); ?>
                                                <?php } ?>
                                        <?php  }
                                                                    } ?></td>
                                </tr>
                            


                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>
        <!--  -->
    </body>
    <?php include('../includes/footer.php'); ?>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>

    </html>
<?php } ?>