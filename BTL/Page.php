<?php
include "./admin/connect.php";

if (!$_SESSION['login']) {
    header("Location: Login.php");
    exit();
}

$email = '';

if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
} else {
$email = $_GET['email'];

    $sql_name = "SELECT name FROM account WHERE email = '$email'";
    $query_name = mysqli_query($conn, $sql_name);
    $dt_name = mysqli_fetch_assoc($query_name);
    if ($dt_name !== null) {

        $name = $dt_name['name'];
        $_SESSION['name'] = $name; // Lưu giá trị $name vào session
    } else {
        echo 'lỗi';
    }
}

// lấy data tour
$sql = 'SELECT * FROM tours';
$data = mysqli_query($conn, $sql);
$_SESSION['email'] = $email; 


//
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website đặt tour du lịch VietTravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/homeStyle.css">
    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>

.content_item1{
    margin-top: 100px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    
}
.card{
    margin: 20px;
    height: 550px;
    flex-basis: calc(33.33% - 130px);
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
                <a href="./Voucher_Page.php" class="nav_link" title="Khuyến mãi">KHUYẾN MÃI</a>
            </li>
            <!-- <li class="nav_item">
                <a href="#" class="nav_link" title="Liên hệ">LIÊN HỆ</a>
            </li> -->

        </ul>
        <div class="username" style="z-index: 100;">
            <label for="">Xin chào: <?php echo $name ?></label>
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

    </div>
    <div class="banner">

        <div class="slider">
            <div class="image-slider">
                <img id="img" onclick="changeImage()" src="./asset/image/banner.jpg" alt="">
                <script>
                    var index = 1;

                    function changeImage() {
                        var imgs = ["./asset/image/banner.jpg",
                            "./asset/image/banner1.jpg",
                            "./asset/image/banner2.jpg",
                            "./asset/image/banner3.jpg",
                            "./asset/image/banner4.jpg"
                        ];
                        document.getElementById('img').src = imgs[index];
                        index++;
                        if (index == 4) {
                            index = 0;
                        }
                    }
                    setInterval(changeImage, 2000);
                </script>
            </div>

        </div>

        <div class="option" style="background-color: rgb(58, 163, 250);">
            <div class="suboption">
                <form action="http://localhost/BTL/Find_Tour.php">
                    <ul class="suboption-child">
                        <div class="option-item">

                            <li class="option-item-child">
                                <label for="">Điểm đi</label>
                                <input class="form-control" type="text" name="txtDiemDi">
                            </li>

                        </div>
                        <div class="option-item">

                            <li class="option-item-child">
                                <label for="">Điểm đến</label>
                                <input class="form-control" type="text" name="txtDiemDen">
                            </li>

                        </div>
                        <div class="option-item">

                            <li class="option-item-child">
                                <label for="">Ngày đi</label>
                                <input class="form-control" type="date" name="txtNgayDi">
                            </li>

                        </div>
                        <div class="option-item">
                            <a href="">
                                <li class="option-item-child">
                                    <input id="btnfind" class="btn btn-primary" type="submit" name="btnFind" value="Tìm">
                                </li>
                            </a>
                        </div>

                    </ul>
                </form>
            </div>
        </div>
    </div>
    <!-- đặt tour clicl -->

    <div class="content_item">
        <div class="content-title1">
            <h2>Tour nổi bật nhất</h2>
        </div>
        <div class="content_item1">
            
            <?php
            if (isset($data) && $data != null) {
                $count = 0;
                while ($row = mysqli_fetch_array($data)) {
                    if ($count == 6) {
                        break;
                    }
                    
                    
            ?>
                    <div class="card" style="width: 18rem;">
                        <img style="width: 100%; height: 40%;" src="./btlweb/tour/uploads/<?php echo $row['tour_image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['tour_name'] ?></h5>
                            <b>Thời gian: </b><b class="time"><?php echo $row['time_tour'] ?></b><br>
                            <b>Khởi hành: </b><b class="depart"><?php echo $row['depart_location'] ?> | <?php echo $row['depart_time'] ?></b>
                            <div class="rollNo-tour">
                                <span><b>Mã tour: </b>
                                    <p class="rollNo"><?php echo $row['tour_code'] ?></p>
                                </span>
                            </div>

                            <h6 class="price">Giá: <?php echo $row['old_price'] ?> VNĐ/người lớn</h4>
                            <h6 class="price" style="font-size: 14px;">Giá: <?php echo $row['old_price']*0.5 ?> VNĐ/trẻ em(dưới 15 tuổi)</h4>

                                <a href="http://localhost/BTL/Booking_Tour.php" class="btn btn-primary booking-tour-btn" data-tour-name="<?php echo $row['tour_name'] ?>" data-tour-code="<?php echo $row['tour_code'] ?>" data-tour-time="<?php echo $row['time_tour'] ?>" data-depart-time="<?php echo $row['depart_time'] ?>" data-tour-price="<?php echo $row['old_price'] ?>">Đặt tour</a>
                                <a style="margin: 20px 0px 0px 20px;float: right; color:#FF2A2A; font-weight: 600; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; "
                                 href="http://localhost/BTL/Detail_Tour.php" class="detail-tour-btn" data-tour-code="<?php echo $row['tour_code'] ?>">Xem chi tiết</a>
                                <script>
                                    var detailTourButtons = document.getElementsByClassName('detail-tour-btn');
                                    var bookingTourButtons = document.getElementsByClassName('booking-tour-btn');

                                    for (var i = 0; i < detailTourButtons.length; i++) {
                                        detailTourButtons[i].addEventListener('click', function(event) {
                                            event.preventDefault();

                                            var tourCode = this.getAttribute('data-tour-code');

                                           
                                                    window.location.href = this.href + '?tourCode=' + encodeURIComponent(tourCode);
                                                    
                                                }
                                            );
                                        }

                                    for (var i = 0; i < bookingTourButtons.length; i++) {
                                        bookingTourButtons[i].addEventListener('click', function(event) {
                                            event.preventDefault();

                                            var tourName = this.getAttribute('data-tour-name');
                                            var tourCode = this.getAttribute('data-tour-code');
                                            var timeTour = this.getAttribute('data-tour-time');
                                            var departTime = this.getAttribute('data-depart-time');
                                            var tourPrice = this.getAttribute('data-tour-price');
                                            
                                            Swal.fire({
                                                title: 'Thông báo',
                                                text: 'Bạn có muốn đặt tour ' + tourName + ' không?',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonText: 'OK',
                                                cancelButtonText: 'Hủy Bỏ'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = this.href + '?tourName=' + encodeURIComponent(tourName) + '&tourCode=' + encodeURIComponent(tourCode) + '&timeTour=' + encodeURIComponent(timeTour) + '&departTime=' + encodeURIComponent(departTime) + '&tourPrice=' + encodeURIComponent(tourPrice);
                                                    
                                                    
                                                }
                                            });
                                        });
                                    }
                                </script>

                        </div>

                    </div>

            <?php

                    $count++;
                                
                }
            }
            ?>
        </div>
        
        </div>
        <div class="btnViewMore">
            <button class="btn btn-danger" onclick="findTour()">>> Xem Thêm</button>
            <script>
                function findTour() {
                    window.location.href = "http://localhost/BTL/Find_Tour.php";
                }
            </script>
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
                    <h5 class="card-title">Tour Phú Quốc - Vinpearland - Cần Thơ</h5>
                    <b>Thời gian: </b><b class="time">4 ngày - 3 đêm</b><br>
                    <b>Khởi hành: </b><b class="depart">TP Hồ Chí Minh</b>
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
        <div class="content_item1">
            <div class="card mb-3" style="max-width: 540px; height: 300px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="./asset/image/booking_icon.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Đặt tour</h5>
                            <p class="card-text">Đơn giản - Nhanh chóng - Tiện lợi</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;height: 300px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="./asset/image/service_icon.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Sản phẩm & dịch vụ</h5>
                            <p class="card-text">Ứng dụng công nghệ mới nhất</p>
                            <p class="card-text">Dễ dàng, nhanh chóng</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3" style="max-width: 540px;height: 300px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="./asset/image/pay_icon.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Giá thành & thanh toán</h5>
                            <p class="card-text">Mức giá ổn định</p>
                            <p class="card-text">Đơn giản chỉ với 3 bước</p>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="footer">
            <div class="subfooter">
                <div class="contact">
                    <div class="title-contact">
                        <h5>Liên hệ</h5>
                    </div>
                    <div class="location">
                        <p>Đ/c: Số 54, Triều Khúc, Thanh Xuân, Hà Nội</p>
                        <p>Email: travelviet@email.com</p>
                    </div>
                    <div class="contact-social">
                        <a href=""><img class="icon-social" src="./asset/image/facebook_icon.png" alt=""></a>
                        <a href=""><img class="icon-social" src="./asset/image/instagram_icon.png" alt=""></a>
                        <a href=""><img class="icon-social" src="./asset/image/twiter_icon.png" alt=""> </a>
                    </div>
                </div>
                <div class="qr-check">
                    <div class="title-qr">
                        <h6>Đặt tour dễ dàng hơn <br> qua ứng dụng TravelViet</h6>
                    </div>
                    <div class="content-qr">
                        <div class="img-qr">
                            <img src="./asset/image/maqr.png" alt="">
                        </div>
                        <div class="dow">
                            <div class="btn-appstore">
                                <button class="btn btn-dark" style="width: 150px;height: 50px; font-size: 14px;"><img style="margin-left: -20px;" class="appstore-icon" src="./asset/image/appstore_icon.png" alt=""><b style="padding-bottom: 10px; margin-left: 20px;line-height: 0.5;color: white;">Tải về trên <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AppStore</b></button>
                            </div>
                            <div class="btn-googleplay">
                                <button class="btn btn-dark" style="width: 150px;height: 50px;margin-top: 10px; font-size: 14px;"><img style="margin-left: -20px;" class="googleplay-icon" src="./asset/image/googleplay_icon.png" alt=""><b style="padding-bottom: 10px; margin-left: 20px;line-height: 0.5;color: white;">Tải về trên <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GooglePlay</b></button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="help-phone">
                    <div class="title-help">
                        <h5>Bạn cần trợ giúp?</h5>
                        <h5 style="text-align: center;">Hãy liên hệ</h5>
                    </div>
                    <div class="btnphone">
                        <button id="phone" class="btn btn-danger"><img class="phone-icon" src="./asset/image/phone_icon.png" alt=""> 0334 204369</button>
                        <script>
                            document.getElementById('phone').addEventListener('click', function(event) {
                                event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

                                Swal.fire({
                                    title: 'Thông báo',
                                    text: 'Bạn có muốn gọi đến SĐT 0334204369 không?',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Có',
                                    cancelButtonText: 'Hủy Bỏ'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '';
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>


</body>

</html>