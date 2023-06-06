<?php
 if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "delete from sanpham  WHERE id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['delmsg'] = "Đã xóa danh mục thành công ";
    header('location:../view/quanlyhanghoa_ad_view.php');
}
?>