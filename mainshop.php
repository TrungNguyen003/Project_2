<?php
session_start();
error_reporting(0);
include('includes/ketnoi.php');
if (strlen($_SESSION['login']) == 0) {
  header('location:index.php');
} else { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="style.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <?php include('includes/header.php'); ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row pad-botm">
                <div class="col-md-12">
                    <h4 class="header-line">BẢNG ĐIỀU KHIỂN NGƯỜI DÙNG</h4>
                </div>
            </div>
            <div class="row">
                <a href="lietkesach.php">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                            <i class="fa fa-book fa-5x"></i>
                            <?php
                            $sql = "SELECT id from sach ";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $listdbooks = $query->rowCount();
                            ?>
                            <h3><?php echo htmlentities($listdbooks); ?></h3>Thư Viện Sách
                        </div>
                    </div>
                </a>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="alert alert-warning back-widget-set text-center">
                        <i class="fa-sharp fa-solid fa-arrows-rotate fa-5x"></i>
                        <?php
                        $rsts = 0;
                        $sid = $_SESSION['id'];
                        $sql2 = "SELECT id from chitietsachdaphathanh where IDNguoiDung=:sid and (RetrunTrangThai=:rsts || RetrunTrangThai is null || RetrunTrangThai='')";
                        $query2 = $dbh->prepare($sql2);
                        $query2->bindParam(':sid', $sid, PDO::PARAM_STR);
                        $query2->bindParam(':rsts', $rsts, PDO::PARAM_STR);
                        $query2->execute();
                        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                        $returnedbooks = $query2->rowCount();
                        ?>
                        <h3><?php echo htmlentities($returnedbooks); ?></h3>Sách Chưa Trả
                    </div>
                </div>
                <a href="sachdamuon.php">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="alert alert-danger back-widget-set text-center">
                        <i class="fa-solid fa-exclamation fa-5x"></i>
                        <?php
                                $rsts = 0;
                                $sid = $_SESSION['id'];
                                $sql3 = "SELECT id from duyetmuonsach where idnguoidung=:sid and (trangthaimuon=:rsts || trangthaimuon is null || trangthaimuon='')";
                                $query3 = $dbh->prepare($sql3);
                                $query3->bindParam(':sid', $sid, PDO::PARAM_STR);
                                $query3->bindParam(':rsts', $rsts, PDO::PARAM_STR);
                                $query3->execute();
                                $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                $trangthai = $query3->rowCount();
                                ?>
                                <h3><?php echo htmlentities($trangthai); ?> </h3>
                                Sách online chưa trả/ Đang yêu cầu mượn
                    </div>
                </div>
                </a>
                <a href="sachdaphathanh.php">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="alert alert-success back-widget-set text-center">
                        <i class="fa-solid fa-book-open-reader fa-5x"></i>
                            <h3>&nbsp;</h3>Sách đang được mượn
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
    <script src="jquery-1.10.2.js"></script>
    <script src="bootstrap.js"></script>
</body>
</html>
<?php } ?>