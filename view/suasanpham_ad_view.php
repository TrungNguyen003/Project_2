<?php
session_start();
include('../publish/ketnoi.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    include('../controller/update_ad_suasanpham.php');

    
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="tacgia" content="" />
        <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/tdh.css">
        </head>

    <body>
      
    <?php include('../admin/includes/header.php'); ?>

   
        <div class="content-wrapper">
            <div class="container">
                <div class="row pad-botm">
                    <div class="col-md-8">
                        <h4 class="header-line">Thêm sách</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md10 col-sm-10 col-xs-10">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                            Thông tin sách
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                    <?php
                                    $idsp = intval($_GET['idsp']);
                                    $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,theloai.id as cid,phanloai.TenPhanLoai,phanloai.id as athrid,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai where sanpham.id=:idsp";
                                    $query = $dbh->prepare($sql);
                                    $query->bindParam(':idsp', $idsp, PDO::PARAM_STR);
                                    $query->execute();
                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                    $cnt = 1;
                                    if ($query->rowCount() > 0) {
                                        foreach ($results as $result) {               ?>

                                            <div class="col-md-6">  
                                                <div class="form-group">
                                                    <label>Hình ảnh sản phẩm</label>
                                                    <img src="../admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="100">
                                                    <a href="suaanhsach.php?idsach=<?php echo htmlentities($result->idsp); ?>">Thay đổi hình ảnh sản phẩm</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tên sản phẩm<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="tensp" value="<?php echo htmlentities($result->TenSP); ?>" required />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label> Loại<span style="color:red;">*</span></label>
                                                    <select class="form-control" name="theloai" required="required">
                                                        <option value="<?php echo htmlentities($result->cid); ?>"> <?php echo htmlentities($catname = $result->TenTheLoai); ?></option>
                                                        <?php
                                                        $TrangThai = 1;
                                                        $sql1 = "SELECT * from  theloai where TrangThai=:TrangThai";
                                                        $query1 = $dbh->prepare($sql1);
                                                        $query1->bindParam(':TrangThai', $TrangThai, PDO::PARAM_STR);
                                                        $query1->execute();
                                                        $resultss = $query1->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query1->rowCount() > 0) {
                                                            foreach ($resultss as $row) {
                                                                if ($catname == $row->TenTheLoai) {
                                                                    continue;
                                                                } else {
                                                        ?>
                                                                    <option value="<?php echo htmlentities($row->id); ?>"><?php echo htmlentities($row->TenTheLoai); ?></option>
                                                        <?php }
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Tác giả<span style="color:red;">*</span></label>
                                                    <select class="form-control" name="phanloai" required="required">
                                                        <option value="<?php echo htmlentities($result->athrid); ?>"> <?php echo htmlentities($athrname = $result->TenPhanLoai); ?></option>
                                                        <?php

                                                        $sql2 = "SELECT * from  phanloai";
                                                        $query2 = $dbh->prepare($sql2);
                                                        $query2->execute();
                                                        $result2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query2->rowCount() > 0) {
                                                            foreach ($result2 as $ret) {
                                                                if ($athrname == $ret->TenPhanLoai) {
                                                                    continue;
                                                                } else {

                                                        ?>
                                                                    <option value="<?php echo htmlentities($ret->id); ?>"><?php echo htmlentities($ret->TenPhanLoai); ?></option>
                                                        <?php }
                                                            }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mã sách<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="isbn" value="<?php echo htmlentities($result->MaSP); ?>" readonly />
                                                    <p class="help-block"> Mã số sản phẩm là duy nhất</p>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Gia in USD<span style="color:red;">*</span></label>
                                                    <input class="form-control" type="text" name="Gia" value="<?php echo htmlentities($result->GiaSP); ?>" required="required" />
                                                </div>
                                            </div>
                                    <?php }
                                    } ?><div class="col-md-12">
                                        <button type="submit" name="update" class="btn btn-info">Cập nhật</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </body>
        <script src="jquery-1.10.2.js"></script>
        <script src="bootstrap.js"></script>                               
    </html>
<?php } ?>