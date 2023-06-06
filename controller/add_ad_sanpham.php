<?php
if (isset($_POST['add'])) {
    $tensp = $_POST['tensp'];
    $loaisach = $_POST['loaisp'];
    $phanloai = $_POST['phanloai'];
    $masp = $_POST['masp'];
    $gia = $_POST['gia'];
    $mota = $_POST['mota'];
    $theloai = $_SESSION['theloai'];
    $imgsach = $_FILES["cuonsachanh"]["name"];
    $soluong = 1;
    $extension = substr($imgsach, strlen($imgsach) - 4, strlen($imgsach));
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    $tenanhsach = md5($imgsach . time()) . $extension;
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Định dạng không hợp lệ. Chỉ cho phép định dạng jpg / jpeg/ png /gif');</script>";
    } else {
        move_uploaded_file($_FILES["cuonsachanh"]["tmp_name"], "../admin/img/" . $tenanhsach);
        $sql = "INSERT INTO  sanpham(TenSP,CatId,IDphanloai,masp,GiaSP,HinhSP,Mota,theloai,soluong) VALUES(:tensp,:loaisach,:phanloai,:masp,:gia,:tenanhsach,:mota,:theloai,:soluong)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':tensp', $tensp, PDO::PARAM_STR);
        $query->bindParam(':loaisach', $loaisach, PDO::PARAM_STR);
        $query->bindParam(':phanloai', $phanloai, PDO::PARAM_STR);
        $query->bindParam(':masp', $masp, PDO::PARAM_STR);
        $query->bindParam(':gia', $gia, PDO::PARAM_STR);
        $query->bindParam(':tenanhsach', $tenanhsach, PDO::PARAM_STR);
        $query->bindParam(':mota', $mota, PDO::PARAM_STR);
        $query->bindParam(':theloai', $theloai, PDO::PARAM_STR);
        $query->bindParam(':soluong', $soluong, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            echo "<script>alert('Thêm sách thành công');</script>";
            echo "<script>window.location.href='../view/quanlyhanghoa_ad_view.php'</script>";
        } else {
            echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
            echo "<script>window.location.href='quanlyhanghoa.php'</script>";
        }
    }
}
?>