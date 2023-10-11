<?php
    //Tạo kết nối đến DB
    $con = mysqli_connect('localhost','root','','tourmanager')
    or die('Lỗi kết nối');
    //Tạo và thực hiện chèn dữ liệu
    $mv =$_GET['voucherCode'];
    $sqltk = "SELECT * FROM voucher WHERE voucher_code like '%$mv%'";
    $data = mysqli_query($con,$sqltk);

    if(isset($_POST ['btnLuu'])){
        $mv = $_POST['voucherCode'];
        $mtv = $_POST['voucherDescription'];
        $tgv = $_POST['voucheValue'];
        $hav=basename($_FILES["Hinhanh"]["name"]) ;
    
          //Upload ảnh
          $target_dir="picture/";
          $target_file = $target_dir . $hav;
          move_uploaded_file($_FILES["Hinhanh"]["tmp_name"], $target_file);
        
        $sql = "UPDATE voucher SET voucher_description ='$mtv', voucher_value ='$tgv', voucher_image='$hav' WHERE voucher_code='$mv'" ;
        $kq=mysqli_query($con,$sql);
        if($kq)
            echo "<script>alert('Sửa thành công')</script>";
        else
            echo "<script>alert('Sửa thất bại')</script>";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="./global.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://xuanthulab.net/tao-cac-nut-bam-nhom-nut-bam-button-trong-boostrap.html#">
</head>

<body style="background-color:lightgrey;" >
    
      

   <?php
    include_once './header.php';
    ?>

<?php
include_once './promotioncss.php';
?>

    

    
    <div class="slideshow">
    <?php
    // Mảng chứa đường dẫn các hình ảnh
    $images = array("https://imagescdn.pystravel.vn/uploads/posts/avatar/1583393539.jpg", "https://media.vietravel.com/images/Content/KVHE2023_1336-891px.jpg", "https://pvhttnt.vn/wp-content/uploads/2022/11/xuyen-viet-960x640-1.jpg");

    // Lặp qua mảng và hiển thị các hình ảnh
    foreach ($images as $image) {
        echo '<img src="' . $image . '">';
    }
    ?>
    <script>
    var images = document.querySelectorAll('.slideshow img');
    var currentImageIndex = 0;
    var interval = setInterval(changeImage, 3000);

    function changeImage() {
        // Ẩn hình ảnh hiện tại
        images[currentImageIndex].classList.remove('active');

        // Tăng chỉ số hình ảnh
        currentImageIndex++;

        // Kiểm tra nếu đã hiển thị tất cả hình ảnh, trở lại hình ảnh đầu tiên
        if (currentImageIndex >= images.length) {
            currentImageIndex = 0;
        }

        // Hiển thị hình ảnh mới
        images[currentImageIndex].classList.add('active');
    }
    </script>
    </div>
    <!-- ------------------------------------------------------------------------- -->
    
    <form acction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <div class="rectangle-parent">
      <div class="group-child">
        <h1>Thêm voucher mới</h1>
        <div class="group-text">
            <div>
            <h2>Mã voucher</h2>
            <input type="text" name="voucherCode">
            </div>
            <div>
            <h2>Mô tả voucher</h2>
            <input type="text" name="voucherDescription">
            </div>
            <div>
            <h2>Trị giá voucher</h2>
            <input type="text" name="voucherValue">
            </div>
            <div>
            <h2>Thêm ảnh</h2>
            <input type="file"  name="voucherImage" VALUES="Chọn ảnh">
            </div>
        </div >
        <button class="btn btn-info btn-sm" name="btnLuu">Sửa</button>
        <a href="promotion.php">Trở về</a>
        <script>
function goBack() {
  window.location.href = '<?php echo $destinationUrl; ?>';
}
</script>
        </div>
      </div>
    </div>
</form>
   
   


    <?php
    include_once './footer.php';
    ?>

</div>
</body>
</html>