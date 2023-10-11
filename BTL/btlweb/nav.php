<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý website</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        .navbar {
            background-color: #008489;
            padding: 20px;
            display: flex;
            height: 100px;
        }


        .logo {
            cursor: pointer;
        }

        .subnavbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .nav_item {
            margin-right: 10px;
        }

        .nav_link {
            color: #000;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
        }

        .nav_link:hover {
            background-color: #555;
            color: #fff;
        }
        .logo-home img{
            margin-bottom: -50px;
            width: 100px;
            height: 100px;
        }
        .logo{
            margin-bottom: 50px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="logo-home">
            <img class="logo" onclick="refreshPage()" src="btlweb/logo-removebg-preview.png" alt="logo">
            <script>
                function refreshPage() {
                    window.location.href = "";
                }
            </script>
        </div>
        
        <ul class="subnavbar">
            <li class="nav_item">
                <a href="http://localhost/BTL/listtour.php" class="nav_link" title="Quản lý tour">QUẢN LÝ TOUR</a>
            </li>
            <li class="nav_item">
                <a href="http://localhost/BTL/btlweb/revenue_statistics/revenue.php" class="nav_link" title="Doanh thu">DOANH THU</a>
            </li>
            <li class="nav_item">
                <a href="http://localhost/BTL/Vocher/promotion.php" class="nav_link" title="Khách hàng">KHUYẾN MÃI</a>
            </li>
            <li class="nav_item">
                <a href="http://localhost/BTL/Vocher/Thongke2.php" class="nav_link" title="Hoá đơn">THỐNG KÊ</a>
            </li>
            <li class="nav_item">
                <a href="http://localhost/BTL/Login.php" class="nav_link" title="Hoá đơn">ĐĂNG XUẤT</a>
            </li>
        </ul>
    </div>
</body>

</html>