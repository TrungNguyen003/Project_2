<?php
session_start();
error_reporting(0);
include('includes/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "delete from sach  WHERE id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['delmsg'] = "Đã xóa danh mục thành công ";
        header('location:quanlysach.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/qlhh.css">
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
          <li class="sidebar-list-item">
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
          <li class="sidebar-list-item">
            <a href="quanlykhachhang.php">
            <i class="fa-solid fa-users"></i> &nbsp;
              Quản lý khách hàng
            </a>
          </li>
          <li class="sidebar-list-item active">
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
                        <h4 class="header-line">Quản lý sách</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            Danh sách sách
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên sách</th>
                                                <th>Loại</th>
                                                <th>Tác giả</th>
                                                <th>Mã Sách</th>
                                                <th>Giá Mượn</th>
                                                <th>Chỉnh Sửa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $sql = "SELECT sach.TenSach,theloai.TenTheLoai,tacgia.TenTacGia,sach.MaSach,sach.GiaSach,sach.id as idsach,sach.HinhSach from  sach join theloai on theloai.id=sach.CatId join tacgia on tacgia.id=sach.IDTacGia";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {               ?>
                                                    <tr class="odd gradeX">
                                                        <td class="center"><?php echo htmlentities($cnt); ?></td>
                                                        <td class="center" width="300">
                                                            <img src="imgsach/<?php echo htmlentities($result->HinhSach); ?>" width="100">
                                                            <br /><b><?php echo htmlentities($result->TenSach); ?></b>
                                                        </td>
                                                        <td class="center"><?php echo htmlentities($result->TenTheLoai); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->TenTacGia); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->MaSach); ?></td>
                                                        <td class="center"><?php echo htmlentities($result->GiaSach); ?></td>
                                                        <td class="center">

                                                            <a href="suasach.php?idsach=<?php echo htmlentities($result->idsach); ?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                                                <a href="quanlysach.php?del=<?php echo htmlentities($result->idsach); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" >  <button class=" btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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
    </div>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>
<?php } ?>