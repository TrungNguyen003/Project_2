<?php
session_start();
error_reporting(0);
include('publish/ketnoi.php');
if (isset($_POST['login'])) {
    $TenNguoiDung = $_POST['TenNguoiDung'];
    $password = md5($_POST['password']);
    $sql = "SELECT TenNguoiDung,IDNguoiDung,Password FROM admin WHERE TenNguoiDung=:TenNguoiDung and Password=:password";
    $query = $dbh->prepare($sql); //chuan bi 
    $query->bindParam(':TenNguoiDung', $TenNguoiDung, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ); //Chỉ định rằng phương thức tìm nạp sẽ trả về mỗi hàng dưới dạng một đối tượng có tên thuộc tính tương ứng với tên cột được trả về trong tập hợp kết quả.
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['idad'] = $result->IDNguoiDung;
        $_SESSION['alogin'] = $_POST['TenNguoiDung'];
        echo "<script type='text/javascript'> document.location ='view/bangdieukhien_ad_view.php'; </script>";
    }
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không hợp lệ!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/loginad.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
<div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">ĐĂNG NHẬP ADMIN</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            ĐĂNG NHẬP
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Điền tên đăng nhập</label>
                                    <input class="form-control" type="text" name="TenNguoiDung" autocomplete="off" required />
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                                </div>
                                <button type="submit" name="login" class="btn btn-info"> ĐĂNG NHẬP </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>