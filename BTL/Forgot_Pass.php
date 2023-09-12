<?php
$loi = "";

if (isset($_POST['btnSend'])) {
    $email = $_POST['email'];

    $conn = new PDO("mysql:host=localhost;dbname=tourmanager;charset=utf8", "root", "");

    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql); // tạo prepare statement
    $stmt->execute([$email]);
    $count = $stmt->rowCount();
    if ($count == 0) {
        $loi = "Email bạn nhập chưa được đăng ký !";
    } else {
        $newPass = substr(password_hash(rand(0, 999999),PASSWORD_DEFAULT),0,8);
        $sql = "UPDATE user SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql); // tạo prepare statement
        $stmt->execute([$newPass, $email]);
        //echo 'Đã cập nhật';
        sendNewPass($email,$newPass);
    }
}
?>
<?php
global $confirm ;
$confirm = "";


function sendNewPass($email,$newPass)
{
    require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require 'PHPMailer-master/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'travelviet20232023@gmail.com'; // SMTP username
        $mail->Password = 'nkkixwtohpbganbv';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('travelviet20232023@gmail.com', 'VietTravel');
        $mail->addAddress($email);
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư gửi mật khẩu mới';
        $noidungthu = "<p>Đây là mật khẩu mới của bạn, được gửi từ website VietTravel</p>
            Mật khẩu mới của bạn là : {$newPass}
        ";
        $mail->Body = $noidungthu;
        $mail->smtpConnect(array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        
        $mail->send();
        $confirm = 'Đã gửi mail xong';
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;  
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quên Mật Khẩu</title>
    <link rel="stylesheet" href="./asset/css/loginStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
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
                                    <h2 class="fw-bold mb-2 text-uppercase " id="fw-bold">Quên mật khẩu</h2>
                                    <br>
                                    <p class=" mb-5">Vui lòng nhập email của bạn !</p>
                                    <div class="mb-3">
                                        <label for="email" class="form-label ">Email</label>
                                        <input value="<?php if (isset($email) == true) echo $email ?>" type="email" class="form-control" id="email" name="email" placeholder="email">
                                    </div>
                                    <br>
                                    <input style="margin-left: 35%;width: 30%;" class="btn btn-outline-dark" name="btnSend" type="submit" value="Gửi đi" />
                                    <br><br>
                                    <?php if ($confirm != "") { ?>
                                        <div class="alert alert-sucess"><?php echo $confirm ?></div>
                                    <?php } ?>
                                    <?php if ($loi != "") { ?>
                                        <div class="alert alert-danger"><?php echo $loi ?></div>
                                    <?php } ?>
                                    <p class=" mb-5">Hãy kiểm tra email của bạn để lấy mật khẩu !</p>
                                    <p class="small"><a style="margin-left: 40%; font-size: 17px;" class="text-primary" href="./Login.php">Đăng Nhập</a></p>

                            </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

</body>

</html>