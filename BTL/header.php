<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website đặt tour du lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
        }
        
        .navbar {
            background-color: #ffffff;
            margin: auto;   
            width: 100%;
            height: 50px;
            display: flex;
            align-items: center;
            padding: 5px;
            position: fixed;
            justify-content: space-between;
            right: 0;
            left: 0;
            top: 0;
            
        }

        .subnavbar {
            float: left;
        }

        .navbar .logo {
            margin-top: 5px;
            margin-left: 10px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .navbar ul.subnavbar {
            list-style-type: none;
            display: flex;
            margin-right: 0px;
        }


        .nav_link {
            display: inline-block;
            text-decoration: none;
            color: #0080D5;
            padding: 5px;
            font-size: 17px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .nav_link:hover {
            font-weight: 600;
            text-decoration: underline;
            display: block;
            border-radius: 5px;
        }

        .nav_link a::before {
            content: attr(title);
            display: block;
            font-weight: 500;
            height: 0;
            overflow: hidden;
            visibility: hidden;
        }

        .nav_item {
            padding-left: 15px;
            margin: 0;
            /* position: relative; */
        }

        .nav_item a {
            font-size: 10px;
            margin-right: 30px;
        }

        .nav_item:hover .nav_child {
            opacity: 2;
            visibility: visible;
        }

        .nav_child {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: rgb(255, 255, 255);
            display: flex;
            opacity: 0;
            visibility: hidden;
            transition: 0.25s;
            z-index: 999;
        }

        .nav_child-item {
            width: 33.3%;
        }

        .nav_child-item h4 {
            color: white;
            font-size: 15px;
            padding: 15px;
            background-color: #0080D5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .nav_child-list li {
            padding: 10px;
            padding-right: 60px;
            border-top: 1px solid #eee;
        }

        .nav_child-list li a {
            font-size: 14px;
            text-decoration: none;
            color: rgb(7, 89, 167);
        }

        .nav_item1:hover .nav_child1 {
            opacity: 5;
            visibility: visible;
        }

        .nav_child1 {
            box-shadow: inset 0 0 10px #0080D5;
            left: 80%;
            position: absolute;
            top: 100%;
            width: 50%;
            height: 170%;
            background-color: #ffffff;
            display: flex;
            opacity: 0;
            visibility: hidden;
            transition: 0.25s;
        }

        .nav_child-list1 {
            margin-top: 10px;

        }

        .nav_child-list1 li {
            padding: 5px;
        }

        .nav_child-list1 li a {
            float: left;
            font-size: 16px;
            text-decoration: none;
            color: #0080D5;
        }

        a.nav_link {
            margin-top: 5px;
            margin-right: 50px;
            font-size: 15px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }


        #btn-info {
            margin-left: 170px;
            margin-right: 10px;
        }

        #btn-success {
            float: right;
            width: 100px;
        }

        .nav-logo {
            width: 500px;
        }

        #logo-profile {
            padding-bottom: -15px;
            margin-left: 480px;
            float: right;
            width: 40px;
            height: 40px;
            cursor: pointer;
        }
    </style>
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
        <div>
            <div class="nav_item1">

                <a href=""><img class="nav_link" id="logo-profile" src="./asset//image/profile.png" alt=""></a>


                <div class="nav_child1">
                    <div class="nav_child-item1">
                        <ul type="none" class="nav_child-list1">
                            <li><a href="">Thay đổi thông tin cá nhân</a></li>
                            <li><a href="http://localhost/BTL/Login.php">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>


</body>

</html>