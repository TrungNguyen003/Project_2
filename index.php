<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style_index.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>🐶</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <main>&nbsp</main>
        <div class="content-left">
            <h1>
                Open <br> the menu to <br> see more pets
            </h1>
            <p> Một chú chó không nhất thiết phải là cả cuộc đời bạn nhưng <br>chúng có thể khiến cuộc sống của bạn thêm màu sắc và toàn diện hơn.</p>
        </div>
        <div class="content-min"></div>
        <div class="content-right">
            <img id="anh1" src="assets/img/unnamed.jpg">
            <img id="anh2" src="assets/img/341751645_3419254721632567_2835827517458195052_n.png">
        </div>
    <div class="button-move">
            <button class="btn btn-info" onclick="document.getElementById('id01').style.display='block'">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <h3>Shop &nbsp <i class="fa-solid fa-arrow-right"></i></h3>
            </button>
    </div>
    <div id="id01" class="modal">
    <div class="form-login">
      <div class="grid">
        <h2><i class="fa-solid fa-user fa-5x"></i><h2>L &nbsp; O &nbsp; G &nbsp; I &nbsp; N</h2></h2>
        <form action="login.php" method="POST" class="form login">
          <div class="form__field">
            <label for="login__username">
              <svg class="icon">
                <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">Username</span>
            </label>
            <input autocomplete="username" id="login__username" type="text" name="username" class="form__input"
              placeholder="Username" required>
          </div>

          <div class="form__field">
            <label for="login__password">
              <svg class="icon">
                <use xlink:href="#icon-lock"></use>
              </svg><span class="hidden">Password</span>
            </label>
            <input id="login__password" type="password" name="password" class="form__input" placeholder="Password"
              required>
          </div>

          <button class="loginn" type="submit" name="submit">DANG NHAP</button>
        </form>
        <div class="container" style="background-color:#f1f1f1">
          <button class="cancel" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
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