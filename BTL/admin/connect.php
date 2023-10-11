<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    $conn=mysqli_connect('localhost','root','','tourmanager');
    mysqli_set_charset($conn,'utf8');
?>