<?php
    $sid = $_SESSION['id'];
    $sql = "SELECT nguoidung.TenDayDu,nguoidung.diachi,sanpham.TenSP,duyetdon.HinhSP,duyetdon.SoLuong,duyetdon.Gia*duyetdon.SoLuong AS thanhtien,
    sanpham.MaSP,duyetdon.NgayDat,duyetdon.trangthai,duyetdon.id as id 
    from  duyetdon join nguoidung on nguoidung.IDNguoiDung=duyetdon.idnguoidung join sanpham on sanpham.id=duyetdon.idSP WHERE nguoidung.IDNguoiDung=:sid and duyetdon.trangthai=3";
    $query = $dbh->prepare($sql);
    $query->bindParam(':sid', $sid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
?>