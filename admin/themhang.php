<?php
session_start();
error_reporting(0);
include('includes/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['add'])) {
        $TenSach = $_POST['TenSach'];
        $loaisach = $_POST['loaisach'];
        $tacgia = $_POST['tacgia'];
        $masach = $_POST['masach'];
        $gia = $_POST['gia'];
        $imgsach = $_FILES["cuonsachanh"]["name"];
        $extension = substr($imgsach, strlen($imgsach) - 4, strlen($imgsach));
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        $tenanhsach = md5($imgsach . time()) . $extension;
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Định dạng không hợp lệ. Chỉ cho phép định dạng jpg / jpeg/ png /gif');</script>";
        } else {
            move_uploaded_file($_FILES["cuonsachanh"]["tmp_name"], "img/" . $tenanhsach);
            $sql = "INSERT INTO  sach(TenSach,CatId,IDTacGia,MaSach,GiaSach,HinhSach) VALUES(:TenSach,:loaisach,:tacgia,:masach,:gia,:tenanhsach)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':TenSach', $TenSach, PDO::PARAM_STR);
            $query->bindParam(':loaisach', $loaisach, PDO::PARAM_STR);
            $query->bindParam(':tacgia', $tacgia, PDO::PARAM_STR);
            $query->bindParam(':masach', $masach, PDO::PARAM_STR);
            $query->bindParam(':gia', $gia, PDO::PARAM_STR);
            $query->bindParam(':tenanhsach', $tenanhsach, PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo "<script>alert('Thêm sách thành công');</script>";
                echo "<script>window.location.href='quanlyhanghoa.php'</script>";
            } else {
                echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
                echo "<script>window.location.href='quanlyhanghoa.php'</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/qlhh.css">
    <title>Document</title>
</head>
<body>
<div class="grid-container">

<!-- Header -->
<header class="header">
  <div class="menu-icon" onclick="openSidebar()">
    <span class="material-icons-outlined">menu</span>
  </div>
  <div class="header-left">
  </div>
  <div class="header-right">
    <span class="material-icons-outlined">notifications</span>
    <span class="material-icons-outlined">email</span>
    <span class="material-icons-outlined">account_circle</span>
  </div>
</header>
<!-- End Header -->

<!-- Sidebar -->
<aside id="sidebar">
   <div class="sidebar-title">
    <div class="sidebar-brand">
      <span></span></span> Manager Pet.
    </div>
    <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
  </div>

  <ul class="sidebar-list">
    <li class="sidebar-list-item active">
      <a href="bangdieukhien.php">
      <i class="fa-solid fa-table-columns"></i> &nbsp;
          Bảng điền khiển
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="#">
      <i class="fa-brands fa-shopify"></i> &nbsp;
         Tạo đơn mới
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="quanlydichvu.php">
      <i class="fa-solid fa-list-check"></i> &nbsp;
        Quản lý dịch vụ
      </a>
    </li>
    <li class="sidebar-list-item ">
      <a href="#">
      <i class="fa-solid fa-users"></i> &nbsp;
        Quản lý khách hàng
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="quanlyhanghoa.php">
      <i class="fa-solid fa-table-cells"></i> &nbsp;
          Quản lý hàng hóa
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="#">
      <i class="fa-solid fa-chart-simple"></i> &nbsp;
          Doanh thu
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="#">
      <i class="fa-solid fa-person-skating"></i> &nbsp;
          Đăng xuất
      </a>
    </li>
  </ul>
</aside>
<!-- End Sidebar -->

<!-- Main -->
<main class="main-container">
<div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-12">
                        <h4 class="header-line">Thêm sách</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                            Thông tin sách
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post" enctype="multipart/form-data">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên Sách<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="TenSach" autocomplete="off" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Loại<span style="color:red;">*</span></label>
                                            <select class="form-control" name="loaisach" required="required">
                                                <option value=""> Chọn danh mục</option>
                                                <?php
                                                $TrangThai = 1;
                                                $sql = "SELECT * from theloai where TrangThai=:TrangThai";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':TrangThai', $TrangThai, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {               ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->TenTheLoai); ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> Tác giả<span style="color:red;">*</span></label>
                                            <select class="form-control" name="tacgia" required="required">
                                                <option value=""> Chọn tác giả</option>
                                                <?php

                                                $sql = "SELECT * from  tacgia ";
                                                $query = $dbh->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {               ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->TenTacGia); ?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mã sách<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="masach" id="masach" required="required" autocomplete="off" />
                                            <p class="help-block">Mã Sách phải là duy nhất</p>
                                            <span id="masach-availability-TrangThai" style="font-size:12px;"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Giá<span style="color:red;">*</span></label>
                                            <input class="form-control" type="text" name="gia" autocomplete="off" required="required" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>cuốn sách hình ảnh<span style="color:red;">*</span></label>
                                            <input class="form-control" type="file" name="cuonsachanh" autocomplete="off" required="required" />
                                        </div>
                                    </div>
                                    <button type="submit" name="add" id="add" class="btn btn-info">Tạo </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
</body>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>  
</html>
<?php } ?>