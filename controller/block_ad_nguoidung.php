<?php
if (isset($_GET['inid'])) {
    $id = $_GET['inid'];
    $trangthai = 0;
    $sql = "update nguoidung set trangthai=:trangthai  WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':trangthai', $trangthai, PDO::PARAM_STR);
    $query->execute();
    header('location:../view/quanlykhachhang_ad_view.php');
  }
?>