<?php
// Kết nối với cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourmanager";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Truy vấn dữ liệu khách hàng
    $stmt = $conn->prepare("SELECT age, COUNT(*) as count FROM customers GROUP BY age");
    $stmt->execute();
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Biểu đồ thống kê khách hàng</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style type="text/css">
        .bieu_do{
            width: 1000px;
            height: 600px;
            background-color: antiquewhite;
            padding: 20px;
            text-align: center;
            margin-left: 250px;
            margin-top: 80px;
        }
        .scrollable-container {
    height: 5000px;
    overflow: auto;
        }
        .h1_css{
            margin-top: 100px;
            margin-left: 345PX;
        }
    </style>
</head>
<body >

<?php
        include_once 'C:\xampp\htdocs\BTL\btlweb\nav.php';
    ?>
    

<?php
include_once './promotioncss.php';
?>

    

    
    <div class="slideshow">
    <?php
    // Mảng chứa đường dẫn các hình ảnh
    $images = array("https://imagescdn.pystravel.vn/uploads/posts/avatar/1583393539.jpg", "https://media.vietravel.com/images/Content/KVHE2023_1336-891px.jpg", "https://pvhttnt.vn/wp-content/uploads/2022/11/xuyen-viet-960x640-1.jpg");

    // Lặp qua mảng và hiển thị các hình ảnh
    foreach ($images as $image) {
        echo '<img src="' . $image . '">';
    }
    ?>
    <script>
    var images = document.querySelectorAll('.slideshow img');
    var currentImageIndex = 0;
    var interval = setInterval(changeImage, 3000);

    function changeImage() {
        // Ẩn hình ảnh hiện tại
        images[currentImageIndex].classList.remove('active');

        // Tăng chỉ số hình ảnh
        currentImageIndex++;

        // Kiểm tra nếu đã hiển thị tất cả hình ảnh, trở lại hình ảnh đầu tiên
        if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        }

        // Hiển thị hình ảnh mới
        images[currentImageIndex].classList.add('active');
    }
    </script>
    </div>





<div>
    <h1 class="h1_css">
        THỐNG KÊ KHÁCH HÀNG THEO ĐỘ TUỔI
    </h1>
</div>



    


<div class="bieu_do">




    <canvas id="myChart"></canvas>
    <script>
        // Dữ liệu khách hàng từ PHP
        var customers = <?php echo json_encode($customers); ?>;

        // Chuyển đổi dữ liệu thành định dạng Chart.js
        var chartData = {
            labels: customers.map(function(customer) {
                return customer.age;
            }),
            datasets: [{
                label: 'Số lượng khách hàng',
                data: customers.map(function(customer) {
                    return customer.count;
                }),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Tạo biểu đồ
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
</div>

<?php
    include_once './footer.php';
    ?>
</body>
</html>