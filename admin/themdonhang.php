<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    
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
      <div class="container" ng-app="myBag" ng-controller="bagController" ng-init="fetchPro(); fetchCart();">
			<br />
			<h3 align="center">Trang bán hàng</h3>
			<br />
			<div class="row">
			<div class="col-md-6">
			<h3 align="center">Mặt hàng</h3>
			<form method="post">
				<div class="row">
					<div class="col-md-6" ng-repeat = "product in products">
						<div class="products">
							<img ng-src="images/{{product.pro_image}}" class="img-fluid" style="width:auto; height:150px;" /><br />
							<h5 class="text-info"></h5>
							<h6></h6>
							<button type="button" name="add_to_cart" class="btn btn-info form-control" ng-click="add_to_bag(product)" > Add to Bag</button>
							
						</div>
					</div>
				</div>
			</form>

			</div>
			<div class="col-md-6">

			<h3 align="center">Đơn hàng</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>  
						<th width="40%">Tên hàng</th>  
						<th width="10%">Số lượng</th>  
						<th width="20%">Giá</th>  
						<th width="15%">Tổng cộng</th>  
						<th width="5%">Hoạt động</th>  
					</tr>
					<tr ng-repeat = "cart in carts">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><button type="button" class="btn btn-danger btn-xs" ng-click="delete_pro(cart.p_id)">X</button></td>
					</tr>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td colspan="2"></td>
					</tr>
				</table>
				<button type="button" class="btn btn-success form-control" > Checkout</button>
			</div>
			</div>

			</div>

		</div>
      </main>
    </div>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>