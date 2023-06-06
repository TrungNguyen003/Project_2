<?php 
 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $trangthai = 1;
    $sql = "update nguoidung set trangthai=:trangthai  WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':trangthai', $trangthai, PDO::PARAM_STR);
    $query->execute();
    header('location:../view/quanlykhachhang_ad_view.php');
  }
?>