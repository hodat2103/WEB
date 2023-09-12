<?php
    include"./admin/connect.php";
    if(!$_SESSION['login']){
        header("Location: Login.php");
    }
    if($_SESSION['login'] && $_SESSION['login'] != 'admin'){
        header("Location: Page.php");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Đây là trang admin!!!


    
</body>
</html>