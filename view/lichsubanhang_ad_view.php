<?php
session_start();
error_reporting(0);
include('../publish/ketnoi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link href="../admin/assets/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link rel="stylesheet" href="../assets/css/tdh.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



    </head>

    <body>
        <?php include('../admin/includes/header.php'); ?>

        <!--  -->
        <main class="main-container">
            <div class="container" ng-app="myBag" ng-controller="bagController" ng-init="fetchPro(); fetchCart();">
                <br />
                <h3 align="center">Lịch sử bán hàng</h3>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <form class="" action="" method="post">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>#</th>

                                                <th>Tên sản phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                                <th>Tổng cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include_once("../model/lichsubanhang_list.php");
                                            $cnt = 1;
                                            if ($query->rowCount() > 0) {
                                                foreach ($results as $result) {
                                            ?>
                                                    <tr class="odd gradeX">
                                                        <td><?php echo htmlentities($cnt); ?></td>

                                                        <td><?php echo htmlentities($result->TenSP); ?></td>
                                                        <td><?php echo htmlentities($result->SoLuong); ?></td>
                                                        <td><?php echo htmlentities($result->Gia) ?></td>
                                                        <td><?php echo htmlentities($result->thanhtien) ?></td>
                                                <?php $cnt = $cnt + 1;
                                                }
                                            } ?>

                                        </tbody>
                                    </table>
                        </form>
                    </div>
                </div>

            </div>
        </main>
        </div>
    </body>
    <script src="../admin/assets/js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>

    </html>
<?php } ?>