<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
      <a href="../view/bangdieukhien_ad_view.php">
      <i class="fa-solid fa-table-columns"></i> &nbsp;
          Bảng điền khiển
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="../view/themdonhang_ad_view.php">
      <i class="fa-brands fa-shopify"></i> &nbsp;
         Tạo đơn mới
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="../view/quanlykhachhang_ad_view.php">
      <i class="fa-solid fa-users"></i> &nbsp;
        Quản lý khách hàng
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="../view/quanlyhanghoa_ad_view.php">
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
</body>
<script>
      $(document).ready(function(){
    $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
    });
    });
    </script>
</html>