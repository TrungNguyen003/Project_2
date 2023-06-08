<?php
include('publish/ketnoi.php');
if (isset($_POST['dangki'])) {
    $dem = ("idnguoidung.txt");
    $truycap = file($dem);
    $truycap[0]++;
    $fp = fopen($dem, "w");
    fputs($fp, "$truycap[0]"); //Ghi dữ liệu vào file
    fclose($fp);
    $IDNguoiDung = $truycap[0];
    $ten = $_POST['ten'];
    $diachi = $_POST['address'];
    $sodienthoai = $_POST['sodienthoai'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $TrangThai = 1;
    $sql = "INSERT INTO  NguoiDung(IDNguoiDung,TenDayDu,SoDienThoai,EmailId,diachi,Password,TrangThai) VALUES(:IDNguoiDung,:ten,:sodienthoai,:email,:diachi,:password,:TrangThai)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':IDNguoiDung', $IDNguoiDung, PDO::PARAM_STR);
    $query->bindParam(':ten', $ten, PDO::PARAM_STR);
    $query->bindParam(':sodienthoai', $sodienthoai, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':diachi', $diachi, PDO::PARAM_STR);
    $query->bindParam(':TrangThai', $TrangThai, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId(); //Trả về ID của hàng hoặc giá trị chuỗi được chèn cuối cùng
    if ($lastInsertId) {
        echo '<script>alert("Đăng ký của bạn thành công và id người dùng của bạn là  "+"' . $IDNguoiDung . '")</script>';
    } else {
        echo "<script>alert('Đã xảy ra sự cố. Vui lòng thử lại');</script>";
    }
}
?>