<?php 
 if (isset($_POST["delete"]) && isset($_POST["orderId"])) {
  foreach ($_POST["orderId"] as $orderId) {
      $sql = "delete from chitietsanphamdaban WHERE id = $orderId;";
      $query = $dbh->prepare($sql);
      $query->execute();
      $lastInsertId = $dbh->lastInsertId();
      if ($lastInsertId) {
          echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
          echo "<script>window.location.href='../view/themdonhang_ad_view.php'</script>";
      } else {
          echo "<script>window.location.href='../view/themdonhang_ad_view.php'</script>";
      }
  }
}
?>