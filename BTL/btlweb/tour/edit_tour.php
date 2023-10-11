<?php
$con = mysqli_connect('localhost', 'root', '', 'tourmanager') 
or die('Lỗi kết nối');

$tc = '';
$ti = '';
$tn = '';
$dt = '';
$tt = '';
$dl = '';
$op = '';
$np = '';

if (isset($_GET['tour_code'])) {
    $tourCode = $_GET['tour_code'];

    // Truy vấn để lấy thông tin cũ của tour
    $sqlSelectTour = "SELECT * FROM tours WHERE tour_code = '$tourCode'";
    $result = mysqli_query($con, $sqlSelectTour);
    
    // Kiểm tra xem có dữ liệu trả về hay không
    if (mysqli_num_rows($result) > 0) {
        $tour = mysqli_fetch_assoc($result);
        $tc = $tour['tour_code'];
        $ti = $tour['tour_image'];
        $tn = $tour['tour_name'];
        $dt = $tour['depart_time'];
        $tt = $tour['time_tour'];
        $dl = $tour['depart_location'];
        $op = $tour['old_price'];
        $np = $tour['new_price'];
    } else {
        echo 'Không tìm thấy tour.';
        exit;
    }
} else {
    echo 'Mã tour không được cung cấp.';
    exit;
}

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
        // Kiểm tra trùng khóa chính
        $sql1 = "SELECT * FROM tour WHERE tour_code = '$tc'";
        $result = mysqli_query($con, $sql1);

        // Sử dụng mysqli_num_rows để kiểm tra số dòng trong kết quả
        if (mysqli_num_rows($result) <= 0 || $tc == $tourCode) {
            
            // Thư mục lưu trữ tệp ảnh đã tải lên
            $target_dir = "uploads/";
            // Đường dẫn và tên tệp ảnh
            $target_file = $target_dir . basename($_FILES["tour_image"]["name"]);
            // Đường dẫn tạm thời của tệp ảnh
            $tmp_file = $_FILES["tour_image"]["tmp_name"];
            
            // Di chuyển tệp ảnh vào thư mục lưu trữ
            if (move_uploaded_file($tmp_file, $target_file)) {
                $sql = "UPDATE tour SET tour_code = '$tc', tour_image = '$ti', tour_name = '$tn', depart_time = '$dt', time_tour = '$tt', depart_location = '$dl', old_price = '$op', new_price = '$np' WHERE tour_code = '$tourCode'";
                $kq = mysqli_query($con, $sql);

                if ($kq) {
                    echo "<script>alert('Cập nhật thành công!')</script>";
                } else {
                    echo "<script>alert('Cập nhật thất bại!')</script>";
                }
            } else {
                echo "<script>alert('Đã xảy ra lỗi khi tải lên tệp ảnh!')</script>";
            }
        } else {
            echo "<script>alert('Mã tour đã tồn tại!')</script>";
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
    <title>Chỉnh sửa tour</title>
</head<body>
<?php
        include_once 'C:\xampp\htdocs\BTL\btlweb\nav.php';
    ?>
    <?php 
        include_once 'C:\xampp\htdocs\BTL\btlweb\tour\style_tour.php'
    ?>
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Chỉnh sửa tour du lịch</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Mã tour</label>
                        <input type="text" name="tour_code" class="form-control" value="<?php echo $tc; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Minh hoạ</label>
                        <input type="file" name="tour_image" class="form-control">
                        <img src="uploads/<?php echo $ti; ?>" alt="Ảnh cũ" width="200">
                    </div>
                    <div class="form-group">
                        <label for="">Tour</label>
                        <input type="text" name="tour_name" class="form-control" value="<?php echo $tn; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">TG_Khởi hành</label>
                        <input type="date" name="depart_time" class="form-control" value="<?php echo $dt; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Khoảng thời gian</label>
                        <input type="text" name="time_tour" class="form-control" value="<?php echo $tt; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">ĐĐ_Khởi hành</label>
                        <input type="text" name="depart_location" class="form-control" value="<?php echo $dl; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giá cũ</label>
                        <input type="number" name="old_price" class="form-control" value="<?php echo $op; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giá ưu đãi</label>
                        <input type="number" name="new_price" class="form-control" value="<?php echo $np; ?>">
                    </div>
                    <button name="sbm" class="btn btn-success" type="submit">Cập nhật</button>
                    <a href="listtour.php">Danh sách tour</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>