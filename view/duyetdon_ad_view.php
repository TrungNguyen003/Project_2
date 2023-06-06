<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    include('../controller/update_ad_duyetdonhang.php');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

        <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/css/tdh.css">
    </head>

    <body>

    <?php include('../admin/includes/header.php'); ?>
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line" align="center">Duyệt Đơn Hàng</h4>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                            Duyệt Đơn Hàng
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <?php
                                    $id = intval($_GET['id']);
                                    $sql = "SELECT nguoidung.IDNguoiDung,nguoidung.diachi ,nguoidung.TenDayDu,nguoidung.EmailId,nguoidung.SoDienThoai,sanpham.TenSP,sanpham.MaSP,duyetdon.NgayDat,duyetdon.trangthai,duyetdon.Gia,duyetdon.SoLuong,duyetdon.Gia*duyetdon.SoLuong AS thanhtien,duyetdon.id as id,duyetdon.trangthaimua,sanpham.id as bid,sanpham.HinhSP from  duyetdon join nguoidung on nguoidung.IDNguoiDung=duyetdon.idnguoidung join sanpham on sanpham.id=duyetdon.idSP where duyetdon.id=:id";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':id', $id, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {               ?>



                                            <input type="hidden" name="idsp" value="<?php echo htmlentities($result->bid); ?>">
                                            <h4>Chi tiết yêu cầu</h4>
                                            <hr />
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>ID người dùng :</label>
                                                    <?php echo htmlentities($result->IDNguoiDung); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tên :</label>
                                                    <?php echo htmlentities($result->TenDayDu); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email Id :</label>
                                                    <?php echo htmlentities($result->EmailId); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>SĐT :</label>
                                                    <?php echo htmlentities($result->SoDienThoai); ?>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Địa chỉ:</label>
                                                    <?php echo htmlentities($result->diachi); ?>
                                                </div>
                                            </div>

                                            <h4>Chi tiết sản phẩm</h4>
                                            <hr />

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sản phẩm:</label>
                                                    <img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="120">
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tên sản phẩm :</label>
                                                    <?php echo htmlentities($result->TenSP); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mã sản phẩm :</label>
                                                    <?php echo htmlentities($result->MaSP); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Giá :</label>
                                                    <?php echo htmlentities($result->Gia); echo ("<sup>đ</sup>") ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ngày yêu đặt sản phẩm:</label>
                                                    <?php echo htmlentities($result->NgayDat); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Trạng Thái :</label>
                                                    <?php
                                                    if ($result->trangthai == 0) {
                                                        echo htmlentities("Đã xác nhận");
                                                    } else if ($result->trangthai == 2) {
                                                        echo htmlentities("Đã hoàn thành");
                                                    } else {
                                                        echo htmlentities("Yêu cầu đặt hàng");
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tổng(VND) :</label>
                                                    <?php echo htmlentities($result->thanhtien); echo ("<sup>đ</sup>")?>
                                                </div>
                                            </div>
                                            <?php if ($result->trangthai == 1) { ?>
                                                <button type="submit" name="return" id="submit" class="btn btn-info">Chấp nhận</button>

                            </div>

                <?php }
                                        }
                                    } ?>
                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php include('includes/footer.php'); ?>
        <script src="jquery-1.10.2.js"></script>
        <script src="bootstrap.js"></script>
        <script src="custom.js"></script>

    </body>

    </html>
<?php } ?>