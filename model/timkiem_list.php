<?php
 if (isset($_POST['btn'])) {
    $noidung = $_POST['noidung'];                   
    $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP,sanpham.DuocPhatHanh from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai WHERE sanpham.TenSP = '$noidung'";           
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    
}
?>


