<?php
    session_start();
    // xóa tất cả các biến
    session_unset();
    // hủy session
    session_destroy();
    header("Location: Login.php")

?>