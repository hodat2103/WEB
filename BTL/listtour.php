<?php 
   include './admin/connect.php';
   if(!$_SESSION['login']){
    header("Location: Login.php");
    exit();
}
if($_SESSION['login'] && $_SESSION['login'] != 'admin'){
    $email = $_SESSION['email'];
    header("Location: Page.php?email=$email");
    exit();
}
   //bước 2: taọ và hiển thị truy vấn
   $sql= "SELECT * FROM tours";
   $data= mysqli_query($conn,$sql);
   //bước 4 : đóng kết nối
    //mysqli_close($con);
   //xử lý tìm kiếm dữ liệu tim kiếm theo kiểu like gần giống
    $tc = '';
    $ti = '';
    $tn = '';
    $dt = '';
    $tt = '';
    $dl = '';
    $op = '';
    $np = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="inc\header.php">
    <link rel="stylesheet" href="D:\Css\bootrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Danh sách tour</title>

</head>
<body>
    <?php
        include_once 'C:\xampp\htdocs\BTL\btlweb\nav.php';
    ?>
    <?php 
        include_once 'C:\xampp\htdocs\BTL\btlweb\tour\style_tour.php'
    ?>
            <h2> - Danh sách tour du lịch - </h2>
            <form method="post">
                <table border="1" cellspacing="0">
                    <tr style="background: #33cccc">
                    <th>STT</th>
                    <th>Mã tour</th>
                    <th>Minh hoạ</th>
                    <th>Tour</th>
                    <th>TG_Khởi hành</th>
                    <th>Khoảng thời gian</th>
                    <th>ĐĐ_Khởi hành</th>
                    <th>Giá cũ</th>
                    <th>Giá ưu đãi</th>
                    <th>Chức năng</th>
                    </tr>
                        <?php 
                            //Bước 3: xử lí kết quả truy vấn : Hiển thị lên bảng
                            if(isset($data) && $data){
                                $i=0;
                                while($row = mysqli_fetch_array($data)){
                        ?>
                            <tr>
                                <td><?php echo ++$i ?></td>
                                <td><?php echo $row['tour_code'] ?> </td>
                                <td>
                                    <?php if (isset($row['tour_image'])) : ?>
                                        <img src="./btlweb/tour/uploads/<?php echo $row['tour_image']; ?>" alt="Minh hoạ" class="img-fluid">
                                    <?php else: ?>
                                        <img src="./uploads/" alt="Minh hoạ" class="img-fluid">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo $row['tour_name'] ?> </td>
                                <td><?php echo $row['depart_time'] ?> </td>
                                <td><?php echo $row['time_tour'] ?> </td>
                                <td><?php echo $row['depart_location'] ?> </td>
                                <td><?php echo $row['old_price'];if ($op === '') {$op = 'null';}?> </td>
                                <td><?php echo $row['new_price'] ?> </td>
                                <td>
                                    <a href="edit_tour.php?tour_code=<?= $row['tour_code'] ?>">Sửa</a>
                                    <a onclick="return confirm('Bạn có muốn xoá không?')" href="delete_tour.php?tour_code=<?=$row['tour_code']?>">Xoá</a>
                                </td>
                            </tr>
                        <?php }
                        }
                        ?>
                </table>
                <a class="btn btn-primary" href="http://localhost/BTL/btlweb/tour/add_tour.php">Thêm mới</a>
            </form>
</body>
</html>
