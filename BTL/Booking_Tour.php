<?php
include_once './Booking_Logic.php';


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website đặt tour du lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/bookingStyle.css">
    <style>
        .nav {
            background-color: #0080D5;
            width: 100%;
            height: 4px;
            margin-top: -20px;

        }
    </style>
</head>

<body>
    <?php include_once './header.php' ?>
    <u class="nav">

    </u>
    <div class="content">
        <div class="container">
            <div class="wrapper">
                <div class="arrow-steps clearfix" style="text-decoration: none;">
                    <div class="step current"><a href="./Booking_Tour.php"><span> Đặt tour</span></a> </div>
                    <div class="step"> <a href="./Payment.php"><span>Thanh Toán</span> </a></div>
                    <div class="step"> <a href="./Bill.php"><span>Hóa đơn</span></a> </div>
                </div>

            </div>
        </div>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <form action="Payment.php" method="post">

            <table class="table table-success table-striped" style="border-radius: 15px; text-align: center; width: 100%; float: left;box-shadow: inset 0 0 10px #0080D5;">
                <tr cosplan="2" style="text-align: center;">
                    <h1 style="text-align: center;">ĐẶT TOUR</h1>
                </tr>
                <tr cosplan="2" style="text-align: center;">
                    <h5 style="text-align: left;"><b style="color: #0080D5;">Tên tour: <?php echo $tourName ?></b> </h5>
                    <h6 style="text-align: left;"><b>Mã tour:</b> <?php echo $tourCode ?></h6>
                    <h6 style="text-align: left;"><b>Thời gian:</b> <?php echo $timeTour ?></h6>
                    <h6 style="text-align: left; color:#FF002A"><b>Giá tour:</b> <?php echo $tourPrice ?>đ</h6>

                </tr>


                <tr>
                    <td class="col1"><label for="">Họ tên: </label></td>
                    <td class="col2"><input type="text" class="form-control" name="name" value="<?php echo $_SESSION['name'] ?>" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Tuổi: </label></td>
                    <td class="col2"><input type="text" class="form-control" name="age" value="<?php echo $_SESSION['age'] ?>" style="width: 80%;"></td>
                </tr>

                <tr>
                    <td class="col1"><label for="">Email: </label></td>
                    <td class="col2"><input type="text" class="form-control" name="email1" value="<?php echo $_SESSION['email1'] ?>" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">SĐT: </label></td>
                    <td class="col2"><input type="text" class="form-control" name="phoneNumber" value="<?php echo $_SESSION['phoneNumber'] ?>" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Số người lớn: </label></td>
                    <td class="col2"><input type="text" id="soNguoiLon" class="form-control" name="nguoiLon" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Số trẻ em(dưới 15 tuổi): </label></td>
                    <td class="col2"><input type="text" id="soTreEm" class="form-control" name="treEm" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Ngày đi: </label></td>
                    <td class="col2"><input type="date" class="form-control" name="ngayDi" style="width: 80%;" value="<?php echo $departTime ?>" readonly></td>
                </tr>
                <tr>
                    <td class="col1">Chọn thêm dịch vụ:</td>
                    <td class="col2">
                        <div class="form-select" style="width: 97%;">
                            <?php foreach ($services as $service) : ?>
                                <input id="dichVu" name="dichVu" type="checkbox" data-price="<?php echo $service['service_price'] ?>"><?php echo $service['service_name']; ?> <br><br>
                            <?php endforeach; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Mã giảm giá: </label></td>
                    <td class="col2">
                        <select name="maGiamGia" id="maGiamGia" class="form-select" aria-label="Default select example" style="width: 80%;">
                            <option value="">Chọn mã giảm giá</option>
                            <?php foreach ($vouchers as $voucher) : ?>
                                <option value="<?php echo $voucher['voucher_code']; ?>"> <?php echo $voucher['voucher_code']; ?> (giảm <?php echo $voucher['voucher_value']; ?>%)</option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Tổng tiền: </label></td>
                    <td class="col2">
                        <p id="tongTienLable" style="color: #FF002A;font-weight: bold;"><?php echo $tourPrice ?> VNĐ</p>
                    </td>
                </tr>


                <script>
                    var soNguoiLonInput = document.getElementById('soNguoiLon');
                    var soTreEmInput = document.getElementById('soTreEm');
                    var maGiamGiaInput = document.getElementById('maGiamGia');
                    var tongTienLabel = document.getElementById('tongTienLable');
                    var vouchers = <?php echo json_encode($vouchers); ?>;
                    var checkboxes = document.querySelectorAll('input[name="dichVu"]');

                    soNguoiLonInput.addEventListener('input', calculateResult);
                    soTreEmInput.addEventListener('input', calculateResult);
                    maGiamGiaInput.addEventListener('change', calculateResult);
                    checkboxes.forEach(function(checkbox) {
                        checkbox.addEventListener("change", calculateResult);
                    });

                    function calculateResult() {
                        var soNguoiLon = parseFloat(soNguoiLonInput.value) || 0;
                        var soTreEm = parseFloat(soTreEmInput.value) || 0;
                        var sum = parseFloat(<?php echo $tourPrice ?>) * soNguoiLon + parseFloat(<?php echo $tourPrice ?>) * soTreEm * 0.5;

                        checkboxes.forEach(function(checkbox) {
                            if (checkbox.checked) {
                                var servicePrice = parseFloat(checkbox.getAttribute("data-price"));
                                sum += servicePrice;
                            }
                        });

                        var maGiamGia = maGiamGiaInput.value;
                        var selectedVoucher = vouchers.find(function(voucher) {
                            return voucher.voucher_code === maGiamGia;
                        });

                        if (selectedVoucher) {
                            var valueVoucher = selectedVoucher.voucher_value;
                            sum -= sum * (valueVoucher / 100);
                        }
                        tongTienLabel.textContent = formatCurrency(sum) + ' VNĐ';
                    }

                    function formatCurrency(amount) {
                        return amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
                    }
                </script>

                <tr>
                    <td class="col1"></td>
                    <td class="col2" action="" method="post">
                        <input class="btn btn-primary" style="text-align: center;" type="submit" name="btnDatTour" value="Đặt tour">
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <?php include_once './footer.php' ?>



</body>

</html>