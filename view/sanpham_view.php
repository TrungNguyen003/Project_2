
<section>
      <div class="content-wrapper">
        <div class="container">
          <div class="row pad-botm">
            <div class="col-md-12">
              <h2 class="header-line">SẢN PHẨM NỔI BẬT</h2>
              <div class="linee">
      </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- Advanced Tables -->
      
                <div class="panel-body">
                <?php 
                  $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP,sanpham.DuocPhatHanh from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai WHERE sanpham.Noibat=1";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                      <div class="col-md-3" style="float:left; height:350px;">
                        <figure class="snip1205">
                          <a href="view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>"><img src="admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="250" height="250"></a><br>
                          <a class="mua" href="view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>">Mua</a>
                          <br /><b><?php echo htmlentities($result->TenSP); ?></b><br />
                          <?php echo htmlentities($result->TenTheLoai); ?><br />
                          <?php echo htmlentities($result->GiaSP); ?><sup>đ</sup><br />
                        </figure>
                      </div>
                  <?php $cnt = $cnt + 1;
                    }
                  } ?>

                </div>
                <div class="view-more">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
     <!--  -->
     <section>
      <div class="content-wrapper">
        <div class="container">
          <div class="row pad-botm">
            <div class="col-md-12">
              <h2 class="header-line">THÚ CƯNG</h>
              <div class="linee">
      </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel-body">
                <?php 
                  $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP,sanpham.DuocPhatHanh from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai WHERE theloai.TenTheLoai ='Thú cưng'";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) {               ?>
                       <div class="col-md-3" style="float:left; height:350px;">
                        <figure class="snip1205">
                          <a href="view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>"><img src="admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="250" height="280"></a><br>
                          <a class="mua" href="view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>">Mua</a>
                          <br /><b><?php echo htmlentities($result->TenSP); ?></b><br />
                          <?php echo htmlentities($result->TenTheLoai); ?><br />
                          <?php echo htmlentities($result->GiaSP); ?><sup>đ</sup><br />
                        </figure>
                      </div>
                  <?php $cnt = $cnt + 1;
                    }
                  } ?>

                </div>
                <div class="view-more">
                  <button class="button-view"><a href="view/thucung_view.php">Xem Thêm</a></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--  -->
    <section>
      <div class="content-wrapper">
        <div class="container">
          <div class="row pad-botm">
            <div class="col-md-12">
              <h2 class="header-line">THỨC ĂN</h2>
              <div class="linee">
      </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- Advanced Tables -->

                  <div class="panel-body">
                    <?php 
                    $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP,sanpham.DuocPhatHanh from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai WHERE sanpham.Noibat=2 ";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                      foreach ($results as $result) {               ?>
                         <div class="col-md-3" style="float:left; height:350px;">
                          <figure class="snip1205">
                            <a href="view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>"><img src="admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="250" height="250"></a><br>
                            <a class="mua" href="view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>">Mua</a>
                            <br /><b><?php echo htmlentities($result->TenSP); ?></b><br />
                            <?php echo htmlentities($result->TenTheLoai); ?><br />
                            <?php echo htmlentities($result->GiaSP); ?><sup>đ</sup><br />
                          </figure>
                        </div>
                    <?php $cnt = $cnt + 1;
                      }
                    } ?>

                  </div>
                  <div class="view-more">
                    <button class="button-view"><a href="view/thucan_view.php">Xem Thêm</a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="content-wrapper">
        <div class="container">
          <div class="row pad-botm">
            <div class="col-md-12">
              <h2 class="header-line">ÁO QUẦN THÚ CƯNG</h2>
              <div class="linee">
      </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <!-- Advanced Tables -->
      
                <div class="panel-body">
                <?php 
                  $sql = "SELECT sanpham.TenSP,theloai.TenTheLoai,phanloai.TenPhanLoai,sanpham.MaSP,sanpham.GiaSP,sanpham.id as idsp,sanpham.HinhSP,sanpham.DuocPhatHanh from  sanpham join theloai on theloai.id=sanpham.CatId join phanloai on phanloai.id=sanpham.IDPhanLoai WHERE sanpham.Noibat=4";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $results = $query->fetchAll(PDO::FETCH_OBJ);
                  $cnt = 1;
                  if ($query->rowCount() > 0) {
                    foreach ($results as $result) { ?>
                      <div class="col-md-3" style="float:left; height:350px;">
                        <figure class="snip1205">
                          <a href="view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>"><img src="admin/img/<?php echo htmlentities($result->HinhSP); ?>" width="250" height="250"></a><br>
                          <a class="mua" href="view/trangchitiet_view.php?idsp=<?php echo htmlentities($result->idsp); ?>">Mua</a>
                          <br /><b><?php echo htmlentities($result->TenSP); ?></b><br />
                          <?php echo htmlentities($result->TenTheLoai); ?><br />
                          <?php echo htmlentities($result->GiaSP); ?><sup>đ</sup><br />
                        </figure>
                      </div>
                  <?php $cnt = $cnt + 1;
                    }
                  } ?>

                </div>
                <div class="view-more">
                <button class="button-view"><a href="view/quanao_view.php">Xem Thêm</a></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>