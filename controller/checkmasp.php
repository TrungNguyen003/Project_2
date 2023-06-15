<?php 
include('../publish/ketnoi.php');
//code check email
if(!empty($_POST["masp"])) {
$masp=$_POST["masp"];
$sql ="SELECT id FROM sanpham WHERE MaSP=:masp";
$query= $dbh -> prepare($sql);
$query-> bindParam(':masp', $masp, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
 
if($query -> rowCount() > 0){
echo "<span style='color:red'> Mã này đã tồn tại với một sản phẩm khác. .</span>"; 
echo "<script>$('#add').prop('disabled',true);</script>";
} else { echo "<script>$('#add').prop('disabled',false);</script>";}
}