<?php
if (isset($_POST['update'])) {
    $tensp = $_POST['tensp'];
    $theloai = $_POST['theloai'];
    $phanloai = $_POST['phanloai'];
    $isbn = $_POST['isbn'];
    $Gia = $_POST['Gia'];
    $idsp = intval($_GET['idsp']);
    $sql = "update sanpham set TenSP=:tensp,CatId=:theloai,IDphanloai=:phanloai,GiaSP=:Gia where id=:idsp";
    $query = $dbh->prepare($sql);
    $query->bindParam(':tensp', $tensp, PDO::PARAM_STR);
    $query->bindParam(':theloai', $theloai, PDO::PARAM_STR);
    $query->bindParam(':phanloai', $phanloai, PDO::PARAM_STR);
    $query->bindParam(':Gia', $Gia, PDO::PARAM_STR);
    $query->bindParam(':idsp', $idsp, PDO::PARAM_STR);
    $query->execute();
    echo "<script>alert('Đã cập nhật thông tin sách thành công');</script>";
    echo "<script>window.location.href='../view/quanlyhanghoa_ad_view.php'</script>";
}
?>