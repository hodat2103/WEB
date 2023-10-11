<?php
    include './admin/connect.php';
    if (!$_SESSION['login']) {
        header("Location: Login.php");
        exit();
    }
    
    $tourName = $_GET['tourName'];
    $tourCode = $_GET['tourCode'];
    $timeTour = $_GET['timeTour'];
    $departTime = $_GET['departTime'];
    $tourPrice = $_GET['tourPrice'];
  

    $query = "SELECT voucher_code, voucher_value FROM voucher";
    $result = mysqli_query($conn, $query);
    $vouchers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $query1 = "SELECT service_code,service_name, service_price FROM service";
    $result1 = mysqli_query($conn, $query1);
    $services = mysqli_fetch_all($result1, MYSQLI_ASSOC);


    $email = $_SESSION['email'] ;
    $sql = "SELECT name, age, email, phone FROM  customers WHERE email = '$email'";
    $query_customer = mysqli_query($conn, $sql);  
    $dt_cus=mysqli_fetch_assoc($query_customer);
    if($dt_cus !== null){
        $name = $dt_cus['name'];
        $email1 = $dt_cus['email'];
        $age = $dt_cus['age'];
        $phone = $dt_cus['phone'];

        $_SESSION['name'] = $name;
        $_SESSION['email1'] = $email1;
        $_SESSION['age'] = $age;
        $_SESSION['phoneNumber'] = $phone;

    }
    
?>