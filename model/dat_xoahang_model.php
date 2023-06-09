<?php
    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        $sql = "delete from duyetdon WHERE id=:id;
        update sanpham set DuocPhatHanh=0 where id=:id";
        $query = $dbh->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $_SESSION['delmsg'] = "Đã xóa danh mục thành công ";
        header('location:../view/giohang_view.php');
    }
    if (isset($_POST["order"]) && isset($_POST["orderId"])) {
        foreach ($_POST["orderId"] as $orderId) {
            $sql = "UPDATE duyetdon set trangthai=1 WHERE id = $orderId";
            $query = $dbh->prepare($sql);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
                echo "<script>window.location.href='../view/giohang_view.php'</script>";
            } else {
                echo "<script>alert('Đã gửi yêu cầu đặt hàng');</script>";
                echo "<script>window.location.href='../view/choxacnhan_view.php'</script>";
            }
        }
    }

    if (isset($_POST["delete"]) && isset($_POST["orderId"])) {
        foreach ($_POST["orderId"] as $orderId) {
            $sql = "delete from duyetdon WHERE id = $orderId;
            update sanpham set DuocPhatHanh=0 where id= $orderId";
            $query = $dbh->prepare($sql);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if ($lastInsertId) {
                echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
                echo "<script>window.location.href='../view/giohang_view.php'</script>";
            } else {
                echo "<script>alert('Xóa thành công');</script>";
                echo "<script>window.location.href='../view/giohang_view.php'</script>";
            }
        }
    }
?>