<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website đặt tour du lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/homeStyle.css">
    <style>



    </style>
</head>

<body>
    <div class="navbar">
        <img class="logo" onclick="refreshPage()" src="./asset/image/homePage.png" alt="Logo">
        <script>
            function refreshPage() {
                window.location.href = "http://localhost/BTL/Home_Page.php";
            }
        </script>
        <ul class="subnavbar">
            <li class="nav_item">
                <a href="#" class="nav_link" title="Tin tức">GIỚI THIỆU</a>
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
            <li class="nav_item">
                <a href="#" class="nav_link" title="Vận chuyển">VẬN CHUYỂN</a>
                <div class="nav_child1">
                    <div class="nav_child-item1">
                        <ul type="none" class="nav_child-list1">
                            <li><a href="">Thuê xe</a></li>
                            <li><a href="">Vé máy bay</a></li>
                        </ul>
                    </div>
                </div>
            </li>
            <li class="nav_item">
                <a href="#" class="nav_link" title="Tin tức">KHÁCH SẠN</a>
            </li>
            <li class="nav_item">
                <a href="#" class="nav_link" title="Tin tức">TIN TỨC</a>
            </li>
            <li class="nav_item">
                <a href="#" class="nav_link" title="Khuyến mãi">KHUYẾN MÃI</a>
            </li>
            <li class="nav_item">
                <a href="#" class="nav_link" title="Liên hệ">LIÊN HỆ</a>
            </li>
            <li class="nav_item">
                <button class="btn btn-info " id="btn-info" onclick="redirectLogin()">Đăng nhập</button>
                <script>
                    function redirectLogin() {
                        window.location.href = "http://localhost/BTL/Login.php";
                    }
                </script>
            </li>
            <li class="nav_item">
                <button class="btn btn-success" id="btn-success" onclick="redirectRegister()">Đăng ký</button>
                <script>
                    function redirectRegister() {
                        window.location.href = "http://localhost/BTL/Register.php";
                    }
                </script>
            </li>
        </ul>
        <div class="btnSign-InUp">



        </div>

    </div>
    <div class="banner">
        <img class="img-fluid" src="./asset/image/banner.jpg" alt="">
        <div class="option">
            <div class="suboption">
                <ul class="suboption-child">
                    <div class="option-item">
                        <li class="option-item-child">
                            <img class="option-logo" id="logo-tour" src="./asset/image/tour.png" alt=""><br>
                            <b class="option-title">Tour trọn gói</b>
                        </li>
                    </div>

                    <div class="option-item">
                        <li class="option-item-child">
                            <img class="option-logo" id="logo_search" src="./asset/image/logo_search.png" alt=""><br>
                            <b class="option-title">Tra cứu booking</b>
                        </li>
                    </div>

                </ul>
            </div>
        </div>
    </div>
    <div class="content_item">
        <div class="content-title1">
            <h2>Tour nổi bật nhất</h2>
        </div>
        <div class="content_item1">
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 50%;" src="./asset/image/halong.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Hà Nội - Móng Cái - Hạ Long - Ninh Bình </h5>
                    <b>Thời gian: </b><b class="time">4 ngày - 3 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">Hà Nội</b>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>

                    <h6 class="price">Giá: 10,500,000đ</h4>
                        <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 50%;" src="./asset/image/phongnha.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Động Thiên Đường - Động Phong Nha</h5>
                    <b>Thời gian: </b><b class="time">1 ngày</b><br>
                    <b>Khởi hành: </b><b class="depart">Nghệ An</b>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>

                    <h6 class="price">Giá: 2,050,000đ</h4>
                        <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 50%;" src="./asset/image/thacbandoc.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Thác Bản Giốc - Hồ Ba Bể</h5>
                    <b>Thời gian: </b><b class="time">2 ngày - 1 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">Hà Nội</b>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>
                    <h6 class="price">Giá: 2,990,000đ</h4>
                        <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>

        </div>
        <div class="content_item2">
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 40%;" src="./asset/image/hoian.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Hội An - Ngũ Hành Sơn - Bà Nà Hills</h5>
                    <b>Thời gian: </b><b class="time"> 3 ngày - 2 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">TP Hồ Chí Minh</b>

                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>
                    <h6 class="price">Giá: 4,500,000đ</h4>
                        <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 40%;" src="./asset/image/phuquoc.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Phú Quốc - Vinpearland</h5>
                    <b>Thời gian: </b><b class="time">4 ngày - 3 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">TP Hồ Chí Minh</b>

                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>

                    <h6 class="price">Giá: 6,990,000đ</h4>
                        <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 40%;" src="./asset/image/nhatrang.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Vịnh Nha Trang - Tháp Bà - Vinpearland </h5>
                    <b>Thời gian: </b><b class="time">4 ngày - 3 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">Hà Nội</b>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>

                    <h6 class="price">Giá: 8,650,000đ</h4>
                        <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>

        </div>

        <div class="content-title1">
            <h2>Khuyến mãi đặc biệt</h2>
        </div>
        <div class="content_item2">
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 40%;" src="./asset/image/hoian.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Hội An - Ngũ Hành Sơn - Bà Nà Hills</h5>
                    <b>Thời gian: </b><b class="time"> 3 ngày - 2 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">TP Hồ Chí Minh</b>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>
                    <h6 class="price-old">Giá cũ: 5.000.000đ</h6>

                    <h6 class="price">Giá ưu đãi: 4,500,000đ</h4>
                        <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 40%;" src="./asset/image/phuquoc.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Phú Quốc - Vinpearland</h5>
                    <b>Thời gian: </b><b class="time">4 ngày - 3 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">TP Hồ Chí Minh</b>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>
                    <h6 class="price-old">Giá cũ: 7.500.000đ</h6>

                    <h6 class="price">Giá ưu đãi: 6,990,000đ</h4>
                        <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img style="width: 100%; height: 40%;" src="./asset/image/nhatrang.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Tour Vịnh Nha Trang - Tháp Bà - Vinpearland </h5>
                    <b>Thời gian: </b><b class="time">4 ngày - 3 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">Hà Nội</b>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <div class="rollNo-tour">
                        <span><b>Mã tour: </b>
                            <p class="rollNo">723HGHGDHJSLL</p>
                        </span>
                    </div>
                    <h6 class="price-old">Giá cũ: 9.000.000đ</h6>

                    <h6 class="price">Giá ưu đãi: 8,650,000đ</h6>
                    <a href="#" class="btn btn-primary stretched-link">Đặt tour</a>
                </div>
            </div>

        </div>
        <div class="content-title1  ">
            <h2>Vì sao chọn Travel Việt ?</h2>
        </div>
        <div class="content_item2">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text bel</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">

    </div>



</body>

</html>