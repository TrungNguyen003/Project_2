<?php
session_start();
error_reporting(0);
include('publish/ketnoi.php');
if ($_SESSION['login'] != '') {
    $_SESSION['login'] = '';
}   
if (isset($_POST['login'])) {
    $email = $_POST['emailid'];
    $password = md5($_POST['password']);
    $sql = "SELECT EmailId,Password,IDNguoiDung,TrangThai FROM nguoidung WHERE EmailId=:email and Password=:password";
    $query = $dbh->prepare($sql); //Chuẩn bị một câu lệnh để thực thi và trả về một đối tượng câu lệnh
    $query->bindParam(':email', $email, PDO::PARAM_STR);  //Liên kết một tham số với tên biến đã chỉ định, liệt kê tham số theo biến đã chỉ định
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ); //Chỉ định rằng phương thức tìm nạp sẽ trả về mỗi hàng dưới dạng một đối tượng có tên thuộc tính tương ứng với tên cột được trả về trong tập hợp kết quả.
    if ($query->rowCount() > 0) {  //rowcount Trả về số hàng bị ảnh hưởng bởi câu lệnh SQL cuối cùng
        foreach ($results as $result) {
            $_SESSION['id'] = $result->IDNguoiDung;
            if ($result->TrangThai == 1) {
                $_SESSION['login'] = $_POST['emailid'];
                echo "<script type='text/javascript'> document.location ='mainshop.php'; </script>";
            } else {
                echo "<script>alert('Tài khoản của bạn đã bị chặn. Vui lòng liên hệ với quản trị viên');</script>";
            }
        }
    } else {
        echo "<script>alert('Tài khoản hoặc mật khẩu không hợp lệ!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🐶 Shop Pets</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


</head>
<body>
    <div class="background">
    <header>
        <a href="#" class="logo"><h2>Pet<i class="fa-solid fa-paw"></i></h2></a>
        <ul class="navlist">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="#">Contact</a></li>          
        </ul>
        <div class="bx bx-menu" id="menu-icon"></div>
    </header>
    <section class="hero">  
        <div class="hero-text">
            <h1> Open <br> the menu to <br> see more pets</h1>
            <p> Một chú chó không nhất thiết phải là cả cuộc đời bạn nhưng <br>chúng có thể khiến cuộc sống của bạn thêm màu sắc và toàn diện hơn.</p>
            <a href="#">...</a>
            <a href="#" class="ctaa"  onclick="document.getElementById('id01').style.display='block'"><i class="ri-play-fill"></i>Xem thêm</a>
        </div>
        <div class="hero-img">
            <img src="png/efffect_hero.png" width="100%">

        </div>
    </section>
    <div class="iconss">  
        <i class="ri-facebook-line"></i>
        <i class="ri-mail-line"></i>
        <i class="ri-instagram-line"></i>
    </div>
    <div class="effect-icons">
        <img src="png/effcect1.png">
        <img src="png/icon-effect.png">
        <img src="png/effcect1.png">
        <img src="png/icon-effect.png">   
        <img src="png/effcect1.png">
        <img src="png/effect3.png">
                
    </div>
</div>
<!-- form login -->
<div id="id01" class="modal">
    <div class="form-login">
      <div class="grid">
        <div class="user-login">
          <h1>Login</h1>
        </div>
        <form  method="POST" class="form login">
          <div class="form__field">
            <label for="login__username">
              <svg class="icon">
                <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">Username</span>
            </label>
            <input autocomplete="emailid" id="login__username" type="text" name="emailid" class="form__input"
              placeholder="emailid" required>
          </div>
          <div class="form__field">
            <label for="login__password">
              <svg class="icon">
                <use xlink:href="#icon-lock"></use>
              </svg><span class="hidden">Password</span>
            </label>
            <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
          </div>
         <div class="loginn">
          <button  type="login" name="login"> <span></span>
            <span></span>
            <span></span>
            <span></span>Đăng nhập</button> <a class="reg" href="dangki.php">Not a member?</a>
         </div>
        </form>
        <div class="container">
          <button class="cancel" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><i class="ri-arrow-left-line"></i>Thoát</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </div>
    </div>
  </div>

  <svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
      <path
        d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
      <path
        d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
      <path
        d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
  </svg>
</body>
<script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/script/script.js"></script>
    <script>
        // Get the modal
    var modal = document.getElementById('id01');
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>   
</html>