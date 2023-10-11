<?php

$con=mysqli_connect('localhost','root','','tourmanager')
or die('Lỗi kết nối');
$sql="SELECT * FROM voucher";
$data=mysqli_query($con,$sql);
// mysqli_close($con);
    
//Cử lý tìm kiếm dữ liệu


    //Tạo kết nối đến DB
   
 
    //Tạo và thực hiện chèn dl vào bảng loaisach
    $mv='';$mtv='';$tgv='';$hav='';
    if(isset($_POST['btnLuu'])){
        $mv=$_POST['voucherCode'];
        $mtv=$_POST['voucherDescription'];
        $tgv=$_POST['voucherValue'];
        $hav=basename($_FILES["voucherImage"]["name"]) ;
    
          //Upload ảnh
          $target_dir="picture/";       
          $target_file = $target_dir . $hav;
          move_uploaded_file($_FILES["voucherImage"]["tmp_name"], $target_file);

        //Kiểm tra dl rỗng
        if($mv==''){
            // echo "<script>alert('Phải nhập mã voucher')</script>";
            
        }
        // kiểm tra trùng khóa chính
        $sql1="SELECT * FROM voucher WHERE voucher_code='$mv'";
        $dt=mysqli_query($con,$sql1);
        if(mysqli_num_rows($dt)<=0){
            $sql="INSERT INTO voucher VALUES('$mv','$hav','$mtv','$tgv')";
            $kq=mysqli_query($con,$sql);
            if($kq){
                echo "<script>alert('Thêm mới thành công!')</script>";
                header("Refresh:0");
            }
              
            else
            echo "<script>alert('Thêm mới thất bại!')</script>";
        }
        else
            echo "<script>alert('Mã loại sách đã tồn tại!')</script>";


        
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
        include_once 'C:\xampp\htdocs\BTL\btlweb\nav.php';
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
        <button class="btn btn-info btn-sm" name="btnLuu">Thêm</button>
        </div>
      </div>
    </div>
</form>
   
    <div class="containerr-content">
        <h1>Danh sách voucher</h1>
        <?php
                if(isset($data)&&$data!=null){
                    $i=0;
                    while($row=mysqli_fetch_array($data)){
                        ?>
                        <div class="coupon">
        <div class="anhdong"><img src="./picture/<?php echo $row['voucher_image'] ?>" alt=""></div>
            <div class= "noidung">
                <p style="color:brown"><?php echo $row['voucher_description'] ?></p>
                <p><?php echo $row['voucher_code'] ?></p>
                <p><?php echo $row['voucher_value'] ?></p>
            </div>

        </div>
        <div style="margin-left: 500px; margin-top:-50px;" >
        <a href="./promotion_Edit.php?voucherCode=<?php echo $row['voucher_code']?>">Sửa</a>&nbsp;&nbsp;&nbsp;
        <a href="./promotion_Delete.php?voucherCode=<?php echo $row['voucher_code']?>">Xóa</a>&nbsp;&nbsp;
        </div>
                        <?php
                    }
                }
                ?>
      

    </div>
    <!--                                          -->
    
    <div class="tour-sale">
            <h1>Tour sale</h1>
            <div>

            </div>

        
    </div>


    <?php
    include_once './footer.php';
    ?>

</div>
</body>
</html>