<?php
session_start();
include('../publish/ketnoi.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $sid = $_SESSION['id']; //lấy id từ indexlogin
        $ten = $_POST['fullanme'];
        $sodt = $_POST['sodt'];
        $diachi = $_POST['address'];
        $sql = "update nguoidung set TenDayDu=:ten,SoDienThoai=:sodt,diachi=:address where IDNguoiDung=:sid";
        $query = $dbh->prepare($sql);
        $query->bindParam(':sid', $sid, PDO::PARAM_STR);
        $query->bindParam(':ten', $ten, PDO::PARAM_STR);
        $query->bindParam(':sodt', $sodt, PDO::PARAM_STR);
        $query->bindParam(':address', $diachi, PDO::PARAM_STR);
        $query->execute(); 

        echo '<script>alert("Hồ sơ của bạn đã được cập nhật")</script>';
    }

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
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="../assets/css/style_header.css" rel="stylesheet" />
        <link href="../assets/css/style_main.css" rel="stylesheet" />     
        <link rel="stylesheet" href="../assets/css/style_footer.css"/>
    </head>
    <body>
    <?php include('../includes/header.php'); ?>
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Thông tin của tôi</h4>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-9 col-md-offset-1">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                            Thông tin của tôi
                            </div>
                            <div class="panel-body">
                                <form name="signup" method="post">
                                    <?php
                                    $sid = $_SESSION['id'];
                                    $sql = "SELECT IDNguoiDung,TenDayDu,EmailId,SoDienThoai,NgayDangKi,NgayCapNhat,TrangThai,diachi from  nguoidung  where IDNguoiDung=:sid ";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {               ?>

                                            <div class="form-group">
                                                <label>ID : </label>
                                                <?php echo htmlentities($result->IDNguoiDung); ?>
                                            </div>

                                            <div class="form-group">
                                                <label>Ngày đăng ký : </label>
                                                <?php echo htmlentities($result->NgayDangKi); ?>
                                            </div>
                                            <?php if ($result->NgayCapNhat != "") { ?>
                                                <div class="form-group">
                                                    <label>Ngày cập nhật cuối cùng : </label>
                                                    <?php echo htmlentities($result->NgayCapNhat); ?>
                                                </div>
                                            <?php } ?>


                                            <div class="form-group">
                                                <label>Trạng thái hồ sơ : </label>
                                                <?php if ($result->TrangThai == 1) { ?>
                                                    <span style="color: green"><i class="fa-solid fa-face-smile-beam fa-2x"></i></span>
                                                <?php } else { ?>
                                                    <span style="color: red">bị chặn</span>
                                                <?php } ?>
                                            </div>


                                            <div class="form-group">
                                                <label>Nhập Tên đầy đủ</label>
                                                <input class="form-control" type="text" name="fullanme" value="<?php echo htmlentities($result->TenDayDu); ?>" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Nhập Địa Chỉ</label>
                                                <input class="form-control" type="text" name="address" value="<?php echo htmlentities($result->diachi); ?>" autocomplete="off" required />
                                            </div>


                                            <div class="form-group">
                                                <label>Số điện thoại :</label>
                                                <input class="form-control" type="text" name="sodt" maxlength="10" value="<?php echo htmlentities($result->SoDienThoai); ?>" autocomplete="off" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Nhập Email</label>
                                                <input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId); ?>" autocomplete="off" required readonly />
                                            </div>
                                    <?php }
                                    } ?>

                                    <button type="submit" name="update" class="btn btn-primary" id="submit">Cập nhật bây giờ </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('../includes/footer.php'); ?>                           
        <script src="../assets/script/jquery-1.10.2.js"></script>
        <script src="../assets/script/bootstrap.js"></script>
    </body>

    </html>
<?php } ?>