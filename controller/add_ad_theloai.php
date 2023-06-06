<?php
 if (isset($_POST['create'])) {
    $loaisach = $_POST['loaisach'];
    $TrangThai = $_POST['TrangThai'];
    $sql = "INSERT INTO  theloai(TenTheLoai,TrangThai) VALUES(:loaisach,:TrangThai)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':loaisach', $loaisach, PDO::PARAM_STR);
    $query->bindParam(':TrangThai', $TrangThai, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
      $_SESSION['msg'] = "Thương hiệu được niêm yết thành công";
      header('location:../view/themtheloai_ad_view.php');
    } else {
      $_SESSION['error'] = "Đã xảy ra sự cố. Vui lòng thử lại";
      header('location:../view/themtheloai_ad_view.php');
    }
  }
?>