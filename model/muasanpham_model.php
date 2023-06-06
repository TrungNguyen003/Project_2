<?php
    if (isset($_POST['issue'])) {
        $sid = $_SESSION['id'];
        $quantity = $_POST['quantity'];
        $anhsp = $_SESSION['anhsp'];
        $idsp = intval($_GET['idsp']);
        $gia = $_SESSION['gia'];
        $trangthaii = 0;
        $sql = "INSERT INTO  duyetdon(idnguoidung,idSP,HinhSP,soluong,Gia,trangthai) VALUES(:sid,:idsp,:anhsp,:quantity,:gia,:trangthaii);";
        $query = $dbh->prepare($sql);
        $query->bindParam(':sid', $sid, PDO::PARAM_STR);
        $query->bindParam(':anhsp', $anhsp, PDO::PARAM_STR);
        $query->bindParam(':idsp', $idsp, PDO::PARAM_STR);
        $query->bindParam(':gia', $gia, PDO::PARAM_STR);
        $query->bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $query->bindParam(':trangthaii', $trangthaii, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

}
?>
