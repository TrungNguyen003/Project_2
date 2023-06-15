<?php
ob_start();
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    include('../model/muasanpham_model.php');
     
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>🐶 Shop Pets</title>
        <link href="../assets/css/font-awesome.css" rel="stylesheet" />
        <link href="../assets/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https:cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="../assets/css/style_header.css" rel="stylesheet" />
        <link href="../assets/css/style_detail.css" rel="stylesheet" />
        <link href="../assets/css/style_main.css" rel="stylesheet" />
        <link href="../assets/css/style_footer.css" rel="stylesheet" />

      
    </head>

    <body>
        <?php include('../includes/header.php'); ?>
 
        <div class="main-content">
            <div class="to-bottom">
            </div>
            <div class="category">
                <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="line">|</a> &nbsp;&nbsp;&nbsp;<a href="#">Danh mục sản phẩm<a>&nbsp;&nbsp;&nbsp;<a class="line">|</a>&nbsp;&nbsp;&nbsp;<a href="#">Thức ăn <a></h5>
            </div>
        </div>
        <!--  -->
        <div class="panel-body">
            
            <?php
            $idsp = intval($_GET['idsp']);
            $sql = " SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.MoTa,sanpham.id as idsp,sanpham.HinhSP,sanpham.DuocPhatHanh from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai where sanpham.id=:idsp;";
            $query = $dbh->prepare($sql);
            $query->bindParam(':idsp', $idsp, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            $cnt = 1;
            if ($query->rowCount() > 0) {
                foreach ($results as $result) {
            ?> <div class="center">
                <!-- in hình -->
                        <img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="400">   
                        <?php $_SESSION['anhsp'] = $result->HinhSP ?>
                        <div class="items"> 
                            <h2> <?php echo htmlentities($result->TenSP); ?></h2>  
                            <?php echo ("<h4 style=color:#ee5d94;>"); echo htmlentities($result->GiaSP); echo ("<sup>đ</sup></h4>") ?><br>
                            <?php $_SESSION['gia'] = $result->GiaSP ?>
                            <!-- from check số lượng và mua sản phẩm -->
                            <div class="quantity" >
                                <form role="form" method="post">
                                    <input type="number" name="quantity" min="1" max="9" step="1" value="1">  
                                    <!-- khi nhấn button mua thì nó sẽ truyền số lượng input với lấy id sản phẩm từ button -->
                                    <button type="submit" name="issue" id="submit" class="buy-now">Mua ngay <i class="fa-solid fa-cart-plus"></i></button> 
                                </form>
                            </div>
                            <!-- mấy cái dưới chỉ là in ra thôi -->
                            <?php echo ("<h5>Mã đơn hàng:  &nbsp;");
                            echo htmlentities($result->MaSP);
                            echo ("</h5>") ?>
                            <?php if ($result->DuocPhatHanh == '1') { ?>
                                <h5>Tình trạng: Hết hàng</h5>
                            <?php } else if ($result->DuocPhatHanh == '2') { ?>
                                <h5>...</h5>
                            <?php } else { ?>
                                <h5>Tình trạng: &nbsp; Còn hàng</h5>
                            <?php } ?>
                            <?php echo ("<h4> Mô tả </h4><h5>");
                            echo htmlentities($result->MoTa);
                            echo ("</h5>") ?>

                        </div>
                    </div>
            <?php $cnt = $cnt + 1;
                }
            } ?>
        </div>
        <div class="comm">
            <form action="" method="post">
                <!-- <label>Name: <input type="text" name="name"></label> -->
                <label>Đánh giá(0)<br> <textarea cols="50" rows="3" name="comment" placeholder="Viết đánh giá" required></textarea></label>
            </form>
        </div>
        <section>
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h3 class="header-line">Sản Phẩm tương tự</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Advanced Tables -->
                           
                                    <div class="panel-body">
                                        <?php $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP,sanpham.DuocPhatHanh from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai  WHERE sanpham.Noibat=1";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $result) {               ?>
                                                <div class="col-md-3" style="float:left; height:300px;">
                                                    <figure class="snip1205">
                                                        <img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="200" height="200px">
                                                        <a class="mua" href="../view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>">Mua</a>
                                                        <br /><b><?php echo htmlentities($result->TenSach); ?></b><br />
                                                        <?php echo htmlentities($result->TenTheLoai); ?><br />
                                                        <?php echo htmlentities($result->TenTacGia); ?><br />
                                                        <?php echo htmlentities($result->MaSach); ?><br />
                                                        <?php echo htmlentities($result->GiaSP); ?><br />
                                                    </figure>
                                                </div>
                                        <?php $cnt = $cnt + 1;
                                            }
                                        } ?>

                                    </div>
                                    <div class="view-more">
                                        <button class="button-view"><a href="#">Xem Thêm</a></button>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="end-button">
        </div>
    </body>
    <?php include('../includes/footer.php'); ?>
    <script src="assets/js.js"></script>                            
    </html>
<?php } ?>