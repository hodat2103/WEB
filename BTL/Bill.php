<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/bookingStyle.css">
    <link rel="stylesheet" href="./asset/css/homeStyle.css">
    
</head>

<body>
        <?php include_once './header.php' ?>

        
    
    <div class="content">
        <div class="container">
            <div class="wrapper">
                <div class="arrow-steps clearfix" style="text-decoration: none;">
                    <div class="step" ><a href="./Booking_Tour.php"><span> Đặt tour</span></a> </div>
                    <div class="step"> <a href="./Payment.php"><span>Thanh Toán</span> </a></div>
                    <div class="step  current"> <a href="./Bill.php"><span>Hóa đơn</span></a> </div>
                </div>
                
            </div>
        </div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="function.js"></script>
        <form action="" method="post">
            <table style="text-align: center; width: 100%; float: left;box-shadow: inset 0 0 10px #0080D5;">
                <tr cosplan="2" style="text-align: center;">
                    <h1 style="text-align: center;">HÓA ĐƠN</h1>
                </tr>
                <tr>
                    <td class="col1"><label for="">Họ tên: </label></td>
                    <td class="col2"><input type="text" class="form-control" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Tuổi: </label></td>
                    <td class="col2"><input type="text" class="form-control" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">SĐT: </label></td>
                    <td class="col2"><input type="text" class="form-control" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Email: </label></td>
                    <td class="col2"><input type="text" class="form-control" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Số người lớn: </label></td>
                    <td class="col2"><input type="text" class="form-control" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Số trẻ em: </label></td>
                    <td class="col2"><input type="text" class="form-control" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Ngày đi: </label></td>
                    <td class="col2"><input type="date" class="form-control" style="width: 80%;"></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Mã giảm giá: </label></td>
                    <td class="col2"><select class="form-select" aria-label="Default select example" style="width: 80%;">
                            <option selected><b>Chọn mã giảm giá</b></option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="col1"><label for="">Thanh toán: </label></td>
                    <td class="col2"><select class="form-select" aria-label="Default select example" style="width: 80%;">
                            <option selected><b>Chọn hình thức thanh toán</b></option>
                            <option value="1">Thanh toán bằng thẻ</option>
                            <option value="2">Thanh toán VNPAY</option>
                            <option value="3">Thanh toán qua MoMo</option>
                        </select></td>
                </tr>
                <tr>
                    <td class="col1"></td>
                    <td class="col2">
                        <input class="btn btn-primary" style="text-align: center;" type="submit" name="btnDatTour" value="Đặt tour">
                    </td>
                </tr>
            </table>
        </form>

    </div>
    <?php include_once './footer.php' ?>


    
</body>

</html>