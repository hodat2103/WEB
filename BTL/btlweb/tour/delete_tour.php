<?php 
$tc=$_GET['tour_code'];
// ket noi db
$con=mysqli_connect('localhost','root','','tourmanager')
or die('Lỗi kết nối');
//Tạo và thực hiện xóa
$sql="DELETE FROM tours WHERE tour_code='$tc'";
$kq = mysqli_query($con, $sql);
if($kq) {
    echo "<script>alert('Xóa thành công!')</script>";}
 else {
    echo "<script>alert('Lỗi xóa!')</script>";}
    echo "<script>window.location.href = 'listtour.php';</script>";
 ?>

