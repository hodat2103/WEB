<?php

$tc = '';
$ti = '';
$tn = '';
$dt = '';
$tt = '';
$dl = '';
$op = '';
$np = '';

if (isset($_POST['sbm'])) {
    $tc = $_POST['tour_code'];
    $ti = $_FILES['tour_image']['name'];
    $tn = $_POST['tour_name'];
    $dt = $_POST['depart_time'];
    $tt = $_POST['time_tour'];
    $dl = $_POST['depart_location'];
    $op = $_POST['old_price'];
        if ($op == '') {
            $op = null;
        }
    $np = $_POST['new_price'];

   // Kiểm tra dl rỗng
    if ($tc == '') {
    echo "<script>alert('Phải nhập mã tour!')</script>";
    } else {
    // Thư mục lưu trữ tệp ảnh đã tải lên
    $target_dir = "uploads/";
    // Đường dẫn và tên tệp ảnh
    $target_file = $target_dir . basename($_FILES["tour_image"]["name"]);
    // Đường dẫn tạm thời của tệp ảnh
    $tmp_file = $_FILES["tour_image"]["tmp_name"];

    // Di chuyển tệp ảnh vào thư mục lưu trữ
    if (move_uploaded_file($tmp_file, $target_file)) {
        // Kiểm tra trùng khóa chính
        $sql1 = "SELECT * FROM tours WHERE tour_code = '$tc'";
        $result = mysqli_query($con, $sql1);

        // Sử dụng mysqli_num_rows để kiểm tra số dòng trong kết quả
        if (mysqli_num_rows($result) <= 0) {
            $sql = "INSERT INTO tours VALUES ('$tc', '$ti', '$tn', '$dt', '$tt', '$dl', '$op', '$np')";
            $kq = mysqli_query($con, $sql);

            if ($kq) {
                echo "<script>alert('Thêm mới thành công!')</script>";
            } else {
                echo "<script>alert('Thêm mới thất bại!')</script>";
            }
        } else {
            echo "<script>alert('Mã tour đã tồn tại!')</script>";
        }
    } else {
        echo "<script>alert('Đã xảy ra lỗi khi tải lên tệp ảnh!')</script>";
    }
}
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Thêm mới tour</title>
</head>

<body>
<?php
        include_once 'C:\xampp\htdocs\BTL\btlweb\nav.php';
    ?>
    <?php 
        include_once 'C:\xampp\htdocs\BTL\btlweb\tour\style_tour.php'
    ?>   
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Thêm mới tour du lịch</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Mã tour</label>
                        <input type="text" name="tour_code" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Minh hoạ</label>
                        <input type="file" name="tour_image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tour</label>
                        <input type="text" name="tour_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">TG_Khởi hành</label>
                        <input type="date" name="depart_time" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Khoảng thời gian</label>
                        <input type="text" name="time_tour" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">ĐĐ_Khởi hành</label>
                        <input type="text" name="depart_location" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Giá cũ</label>
                        <input type="number" name="old_price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Giá ưu đãi</label>
                        <input type="number" name="new_price" class="form-control" required>
                    </div>
                    <button name="sbm" class="btn btn-success" type="submit">Thêm mới</button>
                    <a href = "http://localhost/BTL/listtour.php">Danh sách tour</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>