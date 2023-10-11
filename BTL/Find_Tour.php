<?php
include './admin/connect.php';

$sql = 'SELECT * FROM tours';
$data = mysqli_query($conn, $sql);


$dl = '';
$tn = '';
$dt = '';
$op = 100;
if (isset($_POST['btnTimKiem']) && isset($_POST['btnTimKiem'])) {
    function find($input, $k) {
        $input = strtolower($input); // Chuyển đổi chuỗi thành chữ thường
        $convert = str_split($input); // Chuyển đổi chuỗi thành một mảng các ký tự
        $convertCount = array_count_values($convert); // Đếm số lần xuất hiện của mỗi ký tự
    
        $arr = [];
        foreach ($convertCount as $character => $count) {
            if (ctype_alpha($character) && $count == 1) { // Kiểm tra nếu ký tự là chữ cái và xuất hiện duy nhất
                $arr[] = $character;
            }
        }
    
        if (count($arr) >= $k) { // Kiểm tra nếu có đủ số ký tự khác nhau
            return array_slice($arr, 0, $k); // Trả về ký tự đầu tiên k
        } else {
            return null; 
        }
    }
    
    
    $dl = $_POST['txtDiemDi']; 
    $tn = $_POST['txtDiemDen'];
    $dt = $_POST['txtNgayDi']; 
    $op = $_POST['priceDisplay']; 
    $k = 2; 
    
    $sql = "SELECT * FROM tours WHERE 1=1";
    
    if (!empty($dl)) {
        $sql .= " AND depart_location LIKE '%$dl%'";
    }
    
    if (!empty($tn)) {
        $sql .= " AND tour_name LIKE '%$tn%'";
    }
    
    if (!empty($dt)) {
        $sql .= " AND depart_time LIKE '%$dt%'";
    }
    
    if (!empty($op)) {
        $sql .= " AND old_price <= $op";
    }
    
    $arr = find($sql, $k);
    
    
    $data = mysqli_query($conn, $sql);
}?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm Tour</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/homeStyle.css">
    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .content_item1 {
            margin-top: 100px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;

        }

        .card {
            margin: 20px;
            height: 550px;
            flex-basis: calc(33.33% - 130px);
        }

        .nav {
            background-color: #0080D5;
            width: 100%;
            height: 5px;

        }

        .table-warning,
        .col1 {
            padding-bottom: 20px;
        }
        .table-warning input:focus{
    background-color: #06ac77;
}
    </style>
</head>

<body>
    <?php include_once './header.php' ?>
    <div class="nav">

    </div>
    <form action="" method="post">
        <table class="table table-success table-striped" style="margin-left: 35%;width: 500px;">
            <tr>
                <td colspan=2 style="text-align: center; margin: 50px 0px 20px 0px;">
                    <h2 style="font-weight: bold; color:#FFAA00; padding: 20px 0px 20px 0px; font-family: 'Courier New', Courier, monospace;font-weight: bold;">TÌM KIẾM TOUR DU LỊCH<h2>
                </td>
            </tr>
            <tr>
                <td class="table-primary">Điểm khởi hành</td>
                <td class="table-warning">
                    <input class="form-contrtol" type="text" name="txtDiemDi">
                </td>
            </tr>
            <tr>
                <td class="table-primary">Điểm đến</td>
                <td class="table-warning">
                    <input  class="form-contrtol" type="text" name="txtDiemDen">
                </td>
            </tr>
            <tr>
                <td class="table-primary">Ngày đi</td>
                <td class="table-warning">
                    <input class="form-contrtol" type="date" name="txtNgayDi">
                </td>
                </td>
            </tr>
            <tr>
                <td class="table-primary">
                    Giá tiền:
                </td>
                <td class="table-warning">
                    <input class="form-contrtol" type="text" name="priceDisplay" id="priceDisplay" readonly>
                </td>

                </td>

            </tr>
            <tr>
                <td></td>
                <td><input class="" type="range" name="price" min="1000000" max="15000000" step="100000" id="priceRange">
            </tr>
            <tr>
                <td class="col1"></td>
                <td class="col2">
                    <input style="margin-top: 20px;" class="btn btn-success" type="submit" name="btnTimKiem" value="Tìm Kiếm">
                </td>
            </tr>
            <script>
                const priceRange = document.getElementById('priceRange');
                const priceDisplay = document.getElementById('priceDisplay');

                priceRange.addEventListener('input', function() {
                    priceDisplay.value = formatDecimal(priceRange.value);
                });

                function formatDecimal(value) {
                    const formattedValue = parseFloat(value).toFixed(2);
                    return formattedValue;
                }
            </script>
        </table>



        <div class="content_item">
            <div class="content-title1">
                <h2 style="font-family: 'Courier New', Courier, monospace;">Thông tin Tour du lịch</h2>
            </div>
            <div class="content_item1">

                <?php
                if (isset($data) && $data != null) {
                    while ($row = mysqli_fetch_array($data)) {


                ?>
                        <div class="card" style="width: 18rem;">
                            <img style="width: 100%; height: 200px;" src="./btlweb/tour/uploads/<?php echo $row['tour_image'] ?>" class="card-img-top" alt="...">
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
                                    <h6 class="price" style="font-size: 14px;">Giá: <?php echo $row['old_price'] * 0.5 ?> VNĐ/trẻ em(15 tuổi trở xuống)</h4>

                                        <a href="http://localhost/BTL/Booking_Tour.php" class="btn btn-primary booking-tour-btn" data-tour-name="<?php echo $row['tour_name'] ?>" data-tour-code="<?php echo $row['tour_code'] ?>" data-tour-time="<?php echo $row['time_tour'] ?>" data-depart-time="<?php echo $row['depart_time'] ?>" data-tour-price="<?php echo $row['old_price'] ?>">Đặt tour</a>

                                        <script>
                                            var bookingTourButtons = document.getElementsByClassName('booking-tour-btn');
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

                    }
                }
                ?>
            </div>

    </form>

    <?php include_once './footer.php' ?>
</body>

</html>