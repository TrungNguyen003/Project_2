<?php
  $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai";
  $query = $dbh->prepare($sql);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
?>