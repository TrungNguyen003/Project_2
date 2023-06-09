<?php
 if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql = "delete from duyetdon WHERE id=:id;
    update duyetdon set trangthai=0 where id=:id;
    update sanpham set DuocPhatHanh=0 where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['delmsg'] = "Đã xóa danh mục thành công ";
    header('location:../view/choxacnhan_view.php');
}

if (isset($_GET['return'])) {
    $id = $_GET['return'];
    $trangthai = 1;
    $sql = "update duyetdon set trangthai=:trangthai where id=:id";
    $query = $dbh->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->bindParam(':trangthai', $trangthai, PDO::PARAM_STR);
    $query->execute();
    $_SESSION['msg'] = "Đã gửi yêu cầu đặt hàng.";
    header('location:giohang.php');
}
?>