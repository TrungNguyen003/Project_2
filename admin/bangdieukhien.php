<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
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
          Manager Pet.
          </div>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="bangdieukhien.php">
                Bảng điền khiển
                <i class="fa-solid fa-table-columns"></i>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
               Tạo đơn mới
               <i class="fa-brands fa-shopify"></i>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
              Quản lý dịch vụ
              <i class="fa-solid fa-list-check"></i>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="quanlykhachhang.php">
              Quản lý khách hàng
              <i class="fa-solid fa-users"></i>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="quanlyhanghoa.php">
                Quản lý hàng hóa
                <i class="fa-solid fa-table-cells"></i>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
                Doanh thu
                <i class="fa-solid fa-chart-simple"></i>
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="#">
                Đăng xuất
                <i class="fa-solid fa-person-skating"></i>
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>
        <div class="main-cards">
         <a class="card" href="hehe.html">
            <div class="card-inner">
               <h2>Thêm đơn hàng</h2>
               <i class="fa-brands fa-shopify fa-3x"></i>
             
            </div>
            <h1>bla bla</h1>
         </a>

        <a class="card" href="">
            <div class="card-inner">
              <h2>Duyệt đơn</h2>
              <i class="fa-solid fa-scroll fa-3x"></i>
            </div>
            <h1>bla bla</h1>
          
        </a>
          <a class="card" href="#">   
            <div class="card-inner">
              <h2>Thanh Toán</h2>
              <i class="fa-regular fa-money-bill-1 fa-3x"></i>
            </div>
              <h1>bla bla</h1>
          </a>

          <a class="card" href="#">           
            <div class="card-inner">
              <h2>Trạng thái dịch vụ</h2>
              <i class="fa-solid fa-ellipsis fa-2x"></i>
            </div>
              <h1>bla bla</h1>
          </a>
        </div>
      </main>
    </div>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>