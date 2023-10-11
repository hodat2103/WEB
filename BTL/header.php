<?php
    include "./admin/connect.php";
    
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website đặt tour du lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/homeStyle.css">
   
</head>

<body>
    <div class="navbar">
        <div class="logo-home">
            <img class="logo" onclick="refreshPage()" src="./asset/image/homePage.png" alt="Logo">
            <script>
                function refreshPage() {
                    window.location.href = "http://localhost/BTL/Page.php";
                }
            </script>
        </div>
        <ul class="subnavbar">
            <li class="nav_item">
                <div class="nav_div">
                    <a href="#" class="nav_link" title="Giới thiệu">GIỚI THIỆU</a>
                </div>
            </li>
            <li class="nav_item">
                <a href="#" class="nav_link" title="Du lịch">DU LỊCH</a>
                <div class="nav_child">
                    <div class="nav_child-item">
                        <h4>TOUR MIỀN BẮC</h4>
                        <ul type="none" class="nav_child-list">
                            <li><a href="">Hà Nội</a></li>
                            <li><a href="">Hạ Long</a></li>
                            <li><a href="">Hải Phòng</a></li>
                            <li><a href="">Hà Giang</a></li>
                            <li><a href="">Lào Cai</a></li>
                        </ul>
                    </div>
                    <div class="nav_child-item">
                        <h4>TOUR MIỀN TRUNG</h4>
                        <ul type="none" class="nav_child-list">
                            <li><a href="">Nghệ An</a></li>
                            <li><a href="">Quảng Bình</a></li>
                            <li><a href="">Huế</a></li>
                            <li><a href="">Đà Nẵng</a></li>
                            <li><a href="">Nha Trang</a></li>
                        </ul>
                    </div>
                    <div class="nav_child-item">
                        <h4>TOUR MIỀN NAM</h4>
                        <ul type="none" class="nav_child-list">
                            <li><a href="">Tp.Hồ Chí Minh</a></li>
                            <li><a href="">Cần Thơ</a></li>
                            <li><a href="">Vũng Tàu</a></li>
                            <li><a href="">Phú Quốc</a></li>
                            <li><a href=""></a></li>
                        </ul>
                    </div>

                </div>
            </li>
            <!-- <li class="nav_item">
                <a href="#" class="nav_link" title="Vận chuyển">VẬN CHUYỂN</a>
                <div class="nav_child1">
                    <div class="nav_child-item1">
                        <ul type="none" class="nav_child-list1">
                            <li><a href="">Thuê xe</a></li>
                            <li><a href="">Vé máy bay</a></li>
                        </ul>
                    </div>
                </div>
            </li> -->
            <!-- <li class="nav_item">
                <a href="#" class="nav_link" title="Khách sạn">KHÁCH SẠN</a>
            </li> -->
            <li class="nav_item">
                <a href="#" class="nav_link" title="Tin tức">TIN TỨC</a>
            </li>
            <li class="nav_item">
                <a href="#" class="nav_link" title="Khuyến mãi">KHUYẾN MÃI</a>
            </li>
            <!-- <li class="nav_item">
                <a href="#" class="nav_link" title="Liên hệ">LIÊN HỆ</a>
            </li> -->

        </ul>
        <div class="username" style="z-index: 100;">
            <label for="">Travel Viet xin chào</label>
        </div>

        <div class="nav_item1">

            <a href=""><img class="nav_link" id="logo-profile" src="./asset//image/profile.png" alt=""></a>


            <div class="nav_child1">
                <div class="nav_child-item1">
                    <ul type="none" class="nav_child-list1">
                        <li><a href="">Nạp tiền</a></li>
                        <li><a href="" style="margin-left: -60px; margin-top: 20px;">Lịch sử đặt tour</a></li>
                        <li><a href="">Thay đổi thông tin cá nhân</a></li>
                        <li><a href="./Logout.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="btnSign-InUp">



        </div>


</body>

</html>