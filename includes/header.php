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
        <header class="header" id="navbar">
        <a href="" class="logo">Pet.</a>
            <nav>
  <label for="drop" class="toggle">&#8801;</label>
  <input type="checkbox" id="drop" />
  <ul class="menu">
    <li class="active"><a href="#">Trang chủ</a></li>
    <li> 
      <!-- First Tier Drop Down -->
      <label for="drop-1" class="toggle">Dịch vụ +</label>
      <a href="#">Dịch vụ</a>
      <input type="checkbox" id="drop-1"/>
      <ul>
        <li class="active_2"><a href="#">Service 1</a></li>
        <li><a href="#">Service 2</a></li>
        <li><a href="#">Service 3</a></li>
      </ul>
    </li>
    <li> <a href="#">Phụ kiện</a></li>
    <li><a href="#">Giới thiệu</a></li>
    <li><a href="#">Liên hệ</a></li>
    <li><a href="#">Giỏ hàng</a></li>
    <li><a href="#">Tài khoản</a></li>
  </ul>
</nav>
        </header>
    <?php } else { ?>
        <header class="header" id="navbar">
            <a href="" class="logo">Pet.</a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <ul class="menu">
                <li><a href="#work">về chúng tôi</a></li>
                <li><a href="#contact">Mới</a></li>
                <li><a href="#contact">new</a></li>
                <div class="rightt">
                    <li id="item1"><a href="#contact">Đăng nhập</a></li>
                    <li id="item2"><a href="#contact">Đăng kí</a></li>
                </div>
            </ul>
        </header>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    
    <script>
$(document).on('click','ul li',function(){
  $(this).addClass('active').siblings().removeClass('active')
})
</script>
</body>
</html>