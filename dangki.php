<?php
session_start();
include('model/xulydangki.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <script type="text/javascript">
        function valid() {
            if (document.dangki.password.value != document.dangki.confirmpassword.value) {
                alert("Trường mật khẩu và xác nhận mật khẩu không khớp !");
                document.dangki.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
   <!-- form logout -->
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">Đăng ký người dùng</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 col-md-offset-1">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            ĐĂNG KÝ
                        </div>
                        <div class="panel-body">
                            <form name="dangki" method="post" onSubmit="return valid();">
                                <div class="form-group">
                                    <label>Nhập Tên đầy đủ</label>
                                    <input class="form-control" type="text" name="ten" autocomplete="off" required />
                                </div>


                                <div class="form-group">
                                    <label>Số điện thoại :</label>
                                    <input class="form-control" type="text" name="sodienthoai" maxlength="10" autocomplete="off" required />
                                </div>

                                <div class="form-group">
                                    <label>Nhập Email</label>
                                    <input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()" autocomplete="off" required />
                                    <span id="user-availability-TrangThai" style="font-size:12px;"></span>
                                </div>

                                <div class="form-group">
                                    <label>Nhập Địa Chỉ</label>
                                    <input class="form-control" type="text" name="address"  autocomplete="off" required />
                                    <span id="user-availability-TrangThai" style="font-size:12px;"></span>
                                </div>

                                <div class="form-group">
                                    <label>Nhập mật khẩu</label>
                                    <input class="form-control" type="password" name="password" autocomplete="off" required />
                                </div>

                                <div class="form-group">
                                    <label>Xác nhận mật khẩu</label>
                                    <input class="form-control" type="password" name="confirmpassword" autocomplete="off" required />
                                </div>

                                <button type="submit" name="dangki" class="btn btn-danger" id="submit">Đăng ký ngay </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery-1.10.2.js"></script>
</body>
</html>