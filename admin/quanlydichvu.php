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
            <a href="#">
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
      </main>
    </div>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>