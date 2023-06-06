<?php
 $sql = "SELECT nguoidung.TenDayDu,sanpham.TenSP,sanpham.MaSP,duyetdon.NgayDat,duyetdon.trangthai,duyetdon.id as id from  duyetdon join nguoidung on nguoidung.IDNguoiDung=duyetdon.idnguoidung join sanpham on sanpham.id=duyetdon.idSP order by duyetdon.id desc";
 $query = $dbh->prepare($sql);
 $query->execute();
 $results = $query->fetchAll(PDO::FETCH_OBJ);
?>