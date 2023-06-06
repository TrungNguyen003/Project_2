<?php
     $idad = $_SESSION['idad'];
     $sql = "SELECT admin.TenDayDu,sanpham.TenSP,chitietsanphamdaban.SoLuong,chitietsanphamdaban.Gia,chitietsanphamdaban.Gia*chitietsanphamdaban.SoLuong AS thanhtien,
     sanpham.MaSP,chitietsanphamdaban.id as id 
     from  chitietsanphamdaban join admin on admin.IDNguoiDung=chitietsanphamdaban.idnguoidung join sanpham on sanpham.id=chitietsanphamdaban.IdSP WHERE chitietsanphamdaban.RetrunTrangThai=1";
     $query = $dbh->prepare($sql);
     $query->execute();
     $results = $query->fetchAll(PDO::FETCH_OBJ);
?>