<?php
      if (isset($_POST["print"]) && isset($_POST["orderId"])) {
        foreach ($_POST["orderId"] as $printId) {
            $sql = "UPDATE chitietsanphamdaban set RetrunTrangThai=1  where id =:printId;";
            $query = $dbh->prepare($sql);
            $query->bindParam(':printId', $printId, PDO::PARAM_STR);
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