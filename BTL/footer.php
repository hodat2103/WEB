<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website đặt tour du lịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .footer {
            margin-top: 100px;
            background-color: #0080D5;
            width: 100%;
            height: 275px;
        }

        .col-md-4 {
            width: 70px;
            height: 70px;
            margin: 20px;
        }

        .subfooter {
            display: flex;
            padding: 30px;
        }

        .contact {
            color: white;
        }

        .contact h5 {
            font-weight: bold;
            margin-bottom: 30px;
        }

        .contact-social {
            margin-top: 30px;
        }

        .icon-social {
            width: 35px;
            height: 35px;
        }

        .content-qr {
            display: flex;
        }

        .qr-check {
            margin-left: 170px;
        }

        .qr-check h6 {
            color: white;
            margin-bottom: 15px;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        .dow {

            margin-left: 15px;
            margin-top: 30px;
        }

        .img-qr img {
            width: 150px;
            height: 150px;
        }

        .appstore-icon {
            width: 30px;
            height: 30px;
        }

        .googleplay-icon {
            width: 30px;
            height: 30px;
        }

        .help-phone {
            margin-left: 200px;
        }

        .help-phone h5 {
            font-weight: bold;
            color: white;
        }

        .btnphone {
            margin-top: 20px;
        }
    </style>
</head>

<body>

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
              document.getElementById('phone').addEventListener('click', function (event) {
                event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ <a>

                Swal.fire({
                  title: 'Thông báo',
                  text: 'Bạn có muốn gọi đến SĐT 0334204369 này không?',
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