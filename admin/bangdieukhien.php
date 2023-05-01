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
    <script>
      $(document).ready(function(){
    $('ul li a').click(function(){
    $('li a').removeClass("active");
    $(this).addClass("active");
    });
});
    </script>
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
        <div class="main-title">
          <h2>DASHBOARD</h2>
        </div>
        <div class="main-cards">

         <a class="card" href="themdonhang.php">
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
        <div class="main-title">
          <h2>Quản lý hàng</h2>
        </div>
        <div class="main-cards">
         <a class="card" href="quanlyhanghoa.php">
            <div class="card-inner">
               <h2>Quản lý sản phẩm</h2>
             
            </div>
            <h1>bla bla</h1>
         </a>

        <a class="card" href="themhang.php">
            <div class="card-inner">
              <h2>Thêm sản phẩm</h2>
            </div>
            <h1>bla bla</h1> 
        </a>
        <a class="card" href="">
            <div class="card-inner">
              <h2>Thêm thể loại</h2>
              <i class="fa-solid fa-scroll fa-3x"></i>
            </div>
            <h1>bla bla</h1>
          
        </a>
        </div>
        <div class="main-title">
          <h2>Quản lý khách hàng</h2>
        </div>
        <div class="main-cards">
         <a class="card" href="hehe.html">
            <div class="card-inner">
               <h2>Quản lý khách hàng</h2>
             
            </div>
            <h1>bla bla</h1>
         </a>

        <a class="card" href="">
            <div class="card-inner">
              <h2>Đăng kí thành viên</h2>
            </div>
            <h1>bla bla</h1>      
        </a>
        </div>
      </main>
    </div>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>