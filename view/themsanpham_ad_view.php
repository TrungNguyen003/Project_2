<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    include('../controller/add_ad_sanpham.php');       
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <link href="../admin/assets/css/bootstrap.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/css/tdh.css">
        <title>Document</title>
        <script type="text/javascript">
            function checkmasp() {
                $("#loaderIcon").show();
                jQuery.ajax({
                    url: "../controller/checkmasp.php",
                    data: 'masp=' + $("#masp").val(),
                    type: "POST",
                    success: function(data) {
                        $("#masp").html(data);
                        $("#loaderIcon").hide();
                    },
                    error: function() {}
                });
            }
        </script>
    </head>

    <body>
    <?php include('../admin/includes/header.php'); ?>

        <!-- End Sidebar -->

        <!-- Main -->
        <main class="main-container">
            <div class="content-wrapper">
                <div class="container">
                    <div class="row pad-botm">
                        <div class="col-md-12">
                            <h4 class="header-line">Thêm sản phẩm</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    Thông tin sản phẩm
                                </div>
                                <div class="panel-body">
                                    <form role="form" method="post" enctype="multipart/form-data">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên Sản phẩm<span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" name="tensp" autocomplete="off" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Loại<span style="color:red;">*</span></label>
                                                <select class="form-control" name="loaisp" required="required">
                                                    <option value=""> Chọn danh mục</option>
                                                    <?php
                                                    $TrangThai = 1;
                                                    $sql = "SELECT * from theloai where TrangThai=:TrangThai";
                                                    $query = $dbh->prepare($sql);
                                                    $query->bindParam(':TrangThai', $TrangThai, PDO::PARAM_STR);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {               ?>
                                                            <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->TenTheLoai); ?></option>
                                                            <?php $_SESSION['theloai'] = $result->TenTheLoai ?>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> Phân loại<span style="color:red;">*</span></label>
                                                <select class="form-control" name="phanloai" required="required">
                                                    <option value=""> Chọn phân loại</option>
                                                    <?php

                                                    $sql = "SELECT * from  phanloai ";
                                                    $query = $dbh->prepare($sql);
                                                    $query->execute();
                                                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                    $cnt = 1;
                                                    if ($query->rowCount() > 0) {
                                                        foreach ($results as $result) {               ?>
                                                            <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->TenPhanLoai); ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mô tả<span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" name="mota" autocomplete="off" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mã sách<span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" name="masp" id="masp" required="required" autocomplete="off" onBlur="checkmasp()" />
                                                <p class="help-block">Mã sản phẩm phải là duy nhất</p>
                                                <span id="masp" style="font-size:12px;"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Giá<span style="color:red;">*</span></label>
                                                <input class="form-control" type="text" name="gia" autocomplete="off" required="required" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>cuốn sách hình ảnh<span style="color:red;">*</span></label>
                                                <input class="form-control" type="file" name="cuonsachanh" autocomplete="off" required="required" />
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button type="submit" name="add" id="add" class="btn btn-info">Thêm </button>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script src="../admin/assets/js/jquery-1.10.2.js"></script>
    <script src="../admin/assets/js/scripts.js"></script>

    <script src="../admin/assets/js/bootstrap.js"></script>

    </html>
<?php } ?>