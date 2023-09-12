<?php
include 'admin/connect.php';
if (isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    $sql = "SELECT * FROM user WHERE email = '$email'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($query);
    $checkEmail = mysqli_num_rows($query);
    if ($email == "") {
        echo '<span style="color: red; margin-left: 30%;">Vui lòng điền email !</span>';
    } elseif ($password == "") {
        echo '<span style="color: red; margin-left: 30%;">Vui lòng điền mật khẩu !</span>';
    } else {
        if ($checkEmail == 1) {
            // chuyển đổi mật khẩu đã mã hóa
            //echo $data['password'];
            if (strlen($data['password']) == 8) {
                $checkPass = $data['password'];
            } else {
                $checkPass = password_verify($password, $data['password']);
            }
            if ($checkPass) {
                // lưu vào session
                $_SESSION['login'] = $data['role'];
                header("Location: Manager.php");
            } else {
                echo '<span style="color: red; margin-left: 40%;">Sai mật khẩu !</span>';
            }
        } else {
            echo '<span style="color: red; margin-left: 30%;">Email không tồn tại !</span>';
        }
    }
}
