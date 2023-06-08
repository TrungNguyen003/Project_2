<?php
session_start();
session_destroy(); // lệnh hủy tất cả các biến session
header("location:index.php"); 
?>