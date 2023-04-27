    <?php if ($_SESSION['login']) {
    ?>
        <header class="header" id="navbar">
            <a href="" class="logo">Pet.</a>
            <nav>
  <label for="drop" class="toggle">&#8801; Menu</label>
  <input type="checkbox" id="drop" />
  <ul class="menu">
    <li><a href="#">Home</a></li>
    <li> 
      <!-- First Tier Drop Down -->
      <label for="drop-1" class="toggle">Service +</label>
      <a href="#">Service</a>
      <input type="checkbox" id="drop-1"/>
      <ul>
        <li><a href="#">Service 1</a></li>
        <li><a href="#">Service 2</a></li>
        <li><a href="#">Service 3</a></li>
      </ul>
    </li>
    <li> <a href="#">Portfolio</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Submit</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">About</a></li>
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