<?php 
 if (isset($_POST["order"]) && isset($_POST["orderId"])) {
    foreach ($_POST["orderId"] as $orderId) {
        $idad = $_SESSION['idad'];     
        $gia = $_SESSION['gia'];
        $quantity = $_POST['quantity'];
        $sql = "INSERT INTO  chitietsanphamdaban(IDNguoiDung,idSP,Gia,SoLuong) VALUES(:idad,:orderId,:gia,:quantity);";
        $query = $dbh->prepare($sql);
        $query->bindParam(':orderId', $orderId, PDO::PARAM_STR);
        $query->bindParam(':idad', $idad, PDO::PARAM_STR);
        $query->bindParam(':gia', $gia, PDO::PARAM_STR);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<script>window.location.href='../view/themdonhang_ad_view.php'</script>";
        } else {
            echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
            echo "<script>window.location.href='../view/themdonhang_ad_view.php'</script>";
        }
    }
}
?>