<?php
    $mv=$_GET['voucherCode'];
    $con=mysqli_connect('localhost','root','','tourmanager')
or die('Lỗi kết nối');
//Tạo và xóa:
    $sql="DELETE FROM voucher WHERE voucher_code='$mv'";
    $kq=mysqli_query($con,$sql);
    if($kq){
        echo"<script>alert('Xóa thành công')</script>";
        header("location: promotion.php");
    }else{echo"<script>alert('Xóa không công')</script>";}
    
    exit;

?>