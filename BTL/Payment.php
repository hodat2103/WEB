<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./asset/css/homeStyle.css">
    <style>
        .content h1 {
            color: #FF2A2A;
            font-weight: 500;
        }

        .content {margin-top: 10px;
            margin-left: 20%;
            width: 50%;
        }

        table {
            margin-top: 30px;
        }

        .col1 {

            width: 30%;
            text-align: left;
            height: 25px;
            padding: 20px 20px;
        }

        .col2 {
            width: 50%;
            text-align: left;
            height: 25px;
            padding: 5px;
        }

        .clearfix:after {
            clear: both;
            content: "";
            display: flex;
            height: 0;
        }

        .container {
            font-family: 'Lato', sans-serif;
            width: 100vh;
            margin: 0 ;
        }

        .wrapper {
            display: table-cell;
            height: 100px;
            vertical-align: middle;
        }

        .nav {
            margin-top: 30px;
        }
        .prev{
            text-decoration: none;
        }
        .pull-right {
            text-decoration: none;
            margin-left: 70%;
            float: right;
        }
        
        a,
        a:active {
            color: #212121;
            text-decoration: none;
        }

        a:hover {
            color: #999;
        }

        .arrow-steps .step {
            font-size: 14px;
            text-align: center;
            color: #666;
            cursor: default;
            margin: 0 3px;
            padding: 10px 10px 10px 30px;
            min-width: 180px;
            float: left;
            position: relative;
            background-color: #b4e7ff;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition: background-color 0.2s ease;
        }

        .arrow-steps .step:after,
        .arrow-steps .step:before {
            content: " ";
            position: absolute;
            top: 0;
            right: -17px;
            width: 0;
            height: 0;
            border-top: 19px solid transparent;
            border-bottom: 17px solid transparent;
            border-left: 17px solid #b4e7ff;
            z-index: 2;
            transition: border-color 0.2s ease;
        }

        .arrow-steps .step:before {
            right: auto;
            left: 0;
            border-left: 17px solid #fff;
            z-index: 0;
        }

        .arrow-steps .step:first-child:before {
            border: none;
        }

        .arrow-steps .step:first-child {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .arrow-steps .step span {
            position: relative;
        }

        .arrow-steps .step span:before {
            opacity: 0;
            content: "✔";
            position: absolute;
            top: -2px;
            left: -20px;
            color: #06ac77;
        }

        .arrow-steps .step.done span:before {
            opacity: 1;
            -webkit-transition: opacity 0.3s ease 0.5s;
            -moz-transition: opacity 0.3s ease 0.5s;
            -ms-transition: opacity 0.3s ease 0.5s;
            transition: opacity 0.3s ease 0.5s;
        }

        .arrow-steps .step.current {
            color: #fff;
            background-color: #ff5050;
        }

        .arrow-steps .step.current:after {
            border-left: 17px solid #ff5050;
        }

        @media (max-width: 765px) {
            .arrow-steps .step {
                min-width: 35px;
            }
        }
    </style>
</head>

<body>

    <?php include_once './header.php' ?>
    <div class="content">
        <div class="container">
            <div class="wrapper">
                <div class="arrow-steps clearfix" style="text-decoration: none;">
                    <div class="step current" ><a href="./Booking_Tour.php"><span> Đặt tour</span></a> </div>
                    <div class="step"> <a href="./Payment.php"><span>Thanh Toán</span> </a></div>
                    <div class="step"> <a href=""><span>Hóa đơn</span></a> </div>
                </div>
                <div class="nav clearfix">
                    <a href="#" class="prev"> << Quay lại</a>
                    <a href="#" class="next pull-right"> Tiếp >> </a>
                </div>
            </div>
        </div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="function.js"></script>
        <form action="" method="post">
            <table style="text-align: center; width: 100%; float: left;box-shadow: inset 0 0 10px #0080D5;">
                <tr cosplan="2" style="text-align: center;">
                    <h1 style="text-align: center;">ĐẶT TOUR</h1>
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


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="function.js"></script>
    <script>
        jQuery( document ).ready(function() {
		
		var back =jQuery(".prev");
		var	next = jQuery(".next");
		var	steps = jQuery(".step");
		
		next.bind("click", function() { 
			jQuery.each( steps, function( i ) {
				if (!jQuery(steps[i]).hasClass('current') && !jQuery(steps[i]).hasClass('done')) {
					jQuery(steps[i]).addClass('current');
					jQuery(steps[i - 1]).removeClass('current').addClass('done');
					return false;
				}
			})		
		});
		back.bind("click", function() { 
			jQuery.each( steps, function( i ) {
				if (jQuery(steps[i]).hasClass('done') && jQuery(steps[i + 1]).hasClass('current')) {
					jQuery(steps[i + 1]).removeClass('current');
					jQuery(steps[i]).removeClass('done').addClass('current');
					return false;
				}
			})		
		});
 
	})
    </script>
</body>

</html>