<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="./asset/css/loginStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
    input:focus{
    background-color: aqua;
}
    </style>
</head>


<body>
    <div>
        <div class="background">
            <h1>Welcome VietTravel</h1>
            <img class="img_back" src="./asset/image/backLogin.jpg" alt="">
        </div>
        <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="card bg-white" id="card-back">
                            <div class="card-body p-5" id="card-body">
                                <form class="mb-3 mt-md-4" action="" method="post" role="form">
                                    <h2 class="fw-bold mb-2 text-uppercase " id="fw-bold">Đăng Nhập</h2>
                                    <p class=" mb-5">Vui lòng nhập tên đăng nhập và mật khẩu !</p>

                                    <?php require'./Login_logic.php'?>


                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Tên đăng nhập</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label ">Mật khẩu</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="*******">
                                    </div>
                                    <p class="small"><a class="text-primary" href="./Forgot_Pass.php">Quên mật khẩu?</a></p>
                                    <div class="d-grid">
                                        <input class="btn btn-outline-dark" name="btnLogin" type="submit" value="Đăng Nhập" />

                                    </div>
                                </form>
                                <div>
                                    <p class="mb-0  text-center">Bạn chưa có tài khoản? <a href="http://localhost/BTL/Register.php" class="text-primary fw-bold">Đăng ký</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>