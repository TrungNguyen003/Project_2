<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Document</title>
</head>

<body>
  <?php if ($_SESSION['login']) {
  ?>
    <header  class="header" id="navbar">
      <a href="" class="logo">Pet<i class="fa-solid fa-paw"></i></a>
      <nav>
        <label for="drop" class="toggle">&#8801;</label>
        <input type="checkbox" id="drop" />
        <ul class="menu">
        <li>
          <form action="view/timkiem_view.php" method="post">
          <a class="searchh">
            <input class="search" type="text" value="" name="noidung" placeholder="Tìm kiếm" required>
            <button type="submit" name="btn"><i class="fa-solid fa-magnifying-glass"></i></button>
          </a>       
          </form>             
          </li>
          <li class="active"><a href="mainshop.php">Trang chủ</a></li>
          <li> <a href="view/thucung_view.php">Thú cưng</a></li>
          <li> <a href="view/phukien_view.php">Phụ kiện</a></li>
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="view/dichvu_view.php">Dịch vụ</a></li>
          <li><a class="cart" href="view/giohang_view.php"><i class="fa-solid fa-cart-shopping"></i>
              <?php
              $rsts = 0;
              $sid = $_SESSION['id'];
              $sql3 = "SELECT id from duyetdon where idnguoidung=:sid and (trangthaimua=:rsts || trangthai=3 || trangthaimua='')";
              $query3 = $dbh->prepare($sql3);
              $query3->bindParam(':sid', $sid, PDO::PARAM_STR);
              $query3->bindParam(':rsts', $rsts, PDO::PARAM_STR);
              $query3->execute();
              $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
              $trangthai = $query3->rowCount();
              ?>
             <?php echo htmlentities("($trangthai)");?> 
            </a>
          </li>
          <li>
            <!-- First Tier Drop Down -->
            <label for="drop-1" class="toggle"><i class="fa-solid fa-user"></i>+</label>
            <a href="#" class="user"><i class="fa-solid fa-user"></i></a>
            <input type="checkbox" id="drop-1" />
            <ul>
              <li class="active_2"><a href="view/choxacnhan_view.php">Đang đợi
                  <?php
                  $rsts = 0;
                  $sid = $_SESSION['id'];
                  $sql3 = "SELECT id from duyetdon where idnguoidung=:sid and (trangthaimua=:rsts || trangthai=1 or trangthai=4|| trangthaimua='')";
                  $query3 = $dbh->prepare($sql3);
                  $query3->bindParam(':sid', $sid, PDO::PARAM_STR);
                  $query3->bindParam(':rsts', $rsts, PDO::PARAM_STR);
                  $query3->execute();
                  $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                  $trangthai = $query3->rowCount();
                  ?>
                  <?php echo htmlentities("($trangthai)"); ?>
                </a>
              </li>
              <li>
                <a href="view/taikhoannguoidung_view.php">Tài khoản</a>
              </li>
              <li><a href="view/lichsumuahang_view.php">Lịch sử mua hàng</a></li>
              <li><a href="dangxuat.php">Đăng xuất</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </header>
  <?php } else { ?>
    <header class="header" id="navbar">
      <a href="" class="logo">Pet.</a>
      <input class="menu-btn" type="checkbox" id="menu-btn" />
      <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
      <ul class="menu">
        <li><a href="#work">Hỗ trợ</a></li>
        <li><a href="#contact">facebook &nbsp;<i class="fa-brands fa-facebook"></i></a></li>
        <li><a href="#contact">phone &nbsp;<i class="fa-solid fa-phone"></i></a></li>
        <div class="rightt">
          <li id="item1"><a href="#contact">Đăng nhập</a></li>
          <li id="item2"><a href="#contact">Đăng kí</a></li>
        </div>
      </ul>
    </header>
  <?php } ?>
  <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

  <script>
    $(document).on('click', 'ul li', function() {
      $(this).addClass('active').siblings().removeClass('active')
    })
  </script>


</body>

</html>