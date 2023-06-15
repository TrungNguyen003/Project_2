<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    include('../controller/add_ad_order.php');
    include('../controller/delete_ad_xoadon.php');
    include('../controller/print_ad_order.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>🐶 Shop Pets</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="stylesheet" href="../assets/css/tdh.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        


    </head>

    <body>
  <?php include('../admin/includes/header.php'); ?>
       
            <!--  -->
            <main class="main-container">
                <div class="container" ng-app="myBag" ng-controller="bagController" ng-init="fetchPro(); fetchCart();">
                    <br />
                    <h3 align="center">Trang bán hàng</h3>
                    <br />
                    <div class="row">
                        <div class="col-md-8">
                            <h3 align="center">Mặt hàng</h3>
                            <form method="post">
                                <div class="row">
                                    <div class="col-md-10" ng-repeat="product in products">
                                        <div class="products">
                                            <!-- <img ng-src="images/{{product.pro_image}}" class="img-fluid" style="width:auto; height:150px;" /><br />
							<h5 class="text-info"></h5>
							<h6></h6> -->
                                            <?php $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {               ?>
                                                    <div class="col-md-4" style="float:left">                                                            
                                                        <figure class="snip1205"> 
                                                        <img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="150" height="150"><br>                                                                                                                                                                                                               
                                                            <input type="checkbox" name="orderId[]" value="<?php echo ($result->idsp); ?>">  
                                                            <input type="number" name="quantity" min="1" max="9" step="1" value="1">                                                                                                
                                                            <br /><b><?php echo htmlentities($result->TenSP); ?></b><br />
                                                            <?php echo htmlentities($result->MaSP); ?><br />
                                                            <?php echo htmlentities($result->GiaSP); ?><br />
                                                            <?php $_SESSION['gia'] = $result->GiaSP ?>
                                                        </figure>
                                                    </div>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>
                                        </div>                                     
                                        <button  type="submit" name="order" class="btn btn-success form-control" data-toggle="modal"> <span>Thêm+</span></button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-4">
                        <form class="" action="" method="post">
                        <div class="panel-body">
                                <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <td><i class="fa-solid fa-check"></i></td>
                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Tổng cộng</th>                                       
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $idad = $_SESSION['idad'];
                                            $sql =
                                                "SELECT admin.TenDayDu,sanpham.TenSP,chitietsanphamdaban.SoLuong,chitietsanphamdaban.Gia,chitietsanphamdaban.Gia*chitietsanphamdaban.SoLuong AS thanhtien,
                                                sanpham.MaSP,chitietsanphamdaban.id as id 
                                                from  chitietsanphamdaban join admin on admin.IDNguoiDung=chitietsanphamdaban.idnguoidung join sanpham on sanpham.id=chitietsanphamdaban.IdSP WHERE chitietsanphamdaban.RetrunTrangThai IS NULL";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                            ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo htmlentities($cnt); ?></td>
                                                        <td><input type="checkbox" name="orderId[]" value="<?php echo ($result->id); ?>"></td>
                                                        <td><?php echo htmlentities($result->TenSP); ?></td>
                                                        <td><?php echo htmlentities($result->SoLuong); ?></td>
                                                        <td><?php echo htmlentities($result->Gia) ?></td>
                                                        <td><?php echo htmlentities($result->thanhtien) ?></td>
                                            <?php $cnt = $cnt + 1;
                                                }
                                            } ?>
                                                                       
                                        </tbody>
                                    </table>                                  
                                    <tr>
                                    <td colspan="3">
                                            <?php
                                            $sql = "SELECT SUM(chitietsanphamdaban.Gia*chitietsanphamdaban.SoLuong) as tong FROM chitietsanphamdaban WHERE chitietsanphamdaban.RetrunTrangThai IS NULL;";
                                            $query = $dbh->prepare($sql);
                                            $query->execute();
                                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) { ?>
                                                    <?php echo ("Tổng: &nbsp;  "); ?> <?php echo htmlentities($result->tong); ?> <?php echo ("<sup>đ</sup>") ?>
                                            <?php  }
                                            } ?>
                                        </td>

                                        <td colspan="3" align="center">
                                            <form method="post" action="cc.php"> <button type="submit" name="print" class="btn btn-success form-control" data-toggle="modal"> <span>hoàn</span></button></form>
                                        </td>
                                        <td colspan="3" align="center">
                                        <button type="submit" name="delete" class="btn btn-danger form-control" data-toggle="modal"> <span>Xóa</span></button>
                                        </td>
                                    </tr> 
                                    </form>
                                </div>
                            </div>
                     
                        </div>
            </main>
        </div>
    </body>
    <?php include('includes/footer.php'); ?>
    <script src="assets/js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>

    </html>
<?php } ?>