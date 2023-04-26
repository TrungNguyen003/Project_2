    <?php if ($_SESSION['login']) {
    ?>
        <section class="menu-section">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="navbar-collapse collapse ">
                            <ul id="menu-top" class="nav navbar-nav navbar-right">
                                <li><a href="bangdieukhien.php" class="menu-top-active">Bảng điều khiển</a></li>
                                <li><a href="muonsach.php" class="menu-top-active"> Mượn sách</a></li>
                                <li>
                                    <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Quản lý sách của tôi <i class="fa-solid fa-id-card"></i> &nbsp;<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="sachdaphathanh.php"> Sách đã mượn </a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href=""> sách đã mượn online</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown"> Tài khoản <i class="fa-solid fa-id-card"></i> &nbsp;<i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="taikhoannguoidung.php">Tài khoảng của tôi </a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="">Đổi mật khẩu</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <header class="header">
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