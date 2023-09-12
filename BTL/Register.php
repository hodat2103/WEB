<?php

include 'admin/connect.php';
$faliedEmail = "";
$error = [];
if (isset($_POST['first_name'])) {

    $name = $_POST['first_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conf_password = $_POST['confirm_password'];


    $sql1 = "SELECT * FROM user WHERE email = '$email'";
    $query1 = mysqli_query($conn, $sql1);
    $data = mysqli_fetch_assoc($query1);
    if (empty($name)) {
        $error['name'] = 'Bạn chưa nhập họ tên !';
    }
    if (empty($email)) {
        $error['email'] = 'Bạn chưa nhập email !';
    }
    if (empty($password)) {
        $error['password'] = 'Bạn chưa nhập mật khẩu !';
    }
    if ($password != $conf_password) {
        $error['confirm_password'] = 'Mật khẩu nhập lại không đúng !';
    }
    if (empty($error)) {
        $checkEmail = $data['email'];

        if($email != $checkEmail){
            //mã hóa mật khẩu
            $pass = substr(password_hash($password, PASSWORD_DEFAULT), 0, 10);
            //var_dump($pass);
            // die();

            $sql = "INSERT INTO user(name,email,password) VALUES('$name','$email','$pass')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                header('Location: Login.php');
            }
        }else{
            $faliedEmail = "Email đã bị trùng !";
        }
        
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./asset/css/registerStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>

<body>
    <section class="login-block">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form class="md-float-material form-material" action="" method="POST">
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="text-center heading">Đăng Ký Tài Khoản</h3>

                                    </div>
                                    <?php if ($faliedEmail != "") { ?>
                                        <div class="alert alert-danger"><?php echo $faliedEmail ?></div>
                                    <?php } ?>
                                </div>
                                <div class="form-group form-primary">

                                    <input type="text" class="form-control" name="first_name" value="" placeholder="Họ tên" id="first_name">
                                    <div class="has-error">
                                        <span><?php echo (isset($error['name'])) ? $error['name'] : '' ?></span>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="text" class="form-control" name="email" value="" placeholder="Tên đăng nhập" id="email">
                                    <div class="has-error">
                                        <span><?php echo (isset($error['email'])) ? $error['email'] : '' ?></span>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu" value="" id="password">
                                    <div class="has-error">
                                        <span><?php echo (isset($error['password'])) ? $error['password'] : '' ?></span>
                                    </div>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Xác nhận mật khẩu" value="" id="password_confirm">
                                    <div class="has-error">
                                        <span><?php echo (isset($error['confirm_password'])) ? $error['confirm_password'] : '' ?></span>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">

                                        <input type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" id="btnRegister" name="btnRegister" value="Đăng ký">
                                    </div>
                                </div>

                                <div class="or-container">
                                    <div class="line-separator"></div>
                                    <div class="or-label">hoặc</div>
                                    <div class="line-separator"></div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" href="#" style="font-size: 17px;"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Đăng ký với Google</a>

                                    </div>
                                </div>
                                <br>

                                <p class="text-inversetext-center">Bạn đã có tài khoản? <a id="login_herf" href="http://localhost/BTL/Login.php" data-abc="true">Đăng nhập</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>