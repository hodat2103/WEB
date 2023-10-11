<?php 
 require 'vendor/autoload.php'; // Include autoloader from Composer
 use PhpOffice\PhpSpreadsheet\IOFactory;
 use PhpOffice\PhpSpreadsheet\Spreadsheet;
 use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
   // bước 1: tạo kết nối Db
   $con=mysqli_connect('localhost','root','','tourmanager')
   or die('Lỗi kết nối');
   //bước 2: taọ và hiển thị truy vấn
   $sql= "SELECT * FROM history_tours";
   $data= mysqli_query($con,$sql);
   //bước 4 : đóng kết nối
    //mysqli_close($con);

    if(isset($_POST['btnXuatExcel'])){
        //code xuất excel
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0);
        $sheet=$spreadsheet->getActiveSheet()->setTitle('revenue');
        $rowCount=1; 
        //Tạo tiêu đề cho cột trong excel
        $sheet->setCellValue('A'.$rowCount,'Mã lịch sử');
        $sheet->setCellValue('B'.$rowCount,'Id');
        $sheet->setCellValue('C'.$rowCount,'Tên khách hàng');
        $sheet->setCellValue('D'.$rowCount,'SĐT');
        $sheet->setCellValue('E'.$rowCount,'Mã tour');
        $sheet->setCellValue('F'.$rowCount,'Thời gian đặt tour');
        $sheet->setCellValue('G'.$rowCount,'Mã giảm giá');
        $sheet->setCellValue('H'.$rowCount,'Giá');
        //định dạng cột tiêu đề --> dữ liệu vượt quá kích cỡ ô thì cho lớn ô ra
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        //gán màu nền
        $sheet->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
        //căn giữa ô tiêu đề
        $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
        $hc=$_POST['txthistory_code'];
        $ph=$_POST['txtphone'];
        $tc=$_POST['txttour_code'];
        $tb=$_POST['txttime_booking'];
        $pr=$_POST['txtprice'];
        $sqltk = "SELECT * FROM history_tours WHERE history_code LIKE '%$hc%' AND phone LIKE '%$ph%' AND tour_code LIKE '%$tc%' AND time_booking LIKE '%$tb%' AND price LIKE '%$pr%'"; // xuất theo điều kiện còn xuất all thì bỏ sau Where đi
        $data = mysqli_query($con,$sqltk);
       // duyệt từng dòng
        while($row=mysqli_fetch_array($data)){
            $rowCount++; // tăng biến đếm. in dữ liệu từ dòng thứ 2
            $sheet->setCellValue('A'.$rowCount,$row['history_code']);
            $sheet->setCellValue('B'.$rowCount,$row['id']);
            $sheet->setCellValue('C'.$rowCount,$row['name']);
            $sheet->setCellValue('D'.$rowCount,$row['phone']);
            $sheet->setCellValue('E'.$rowCount,$row['tour_code']);
            $sheet->setCellValue('F'.$rowCount,$row['time_booking']);
            $sheet->setCellValue('G'.$rowCount,$row['voucher_code']);
            $sheet->setCellValue('H'.$rowCount,$row['price']);
        }
        //Kẻ bảng 
        $styleAray=array(
            'borders'=>array(
                'allborders'=>array(
                    'style'=>\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                )
            )
        );
        
        $sheet->getStyle('A1:'.'H'.($rowCount))->applyFromArray($styleAray);
        // kết thúc kẻ bảng
        //bắt đầu đặt tên file
        $writer = new Xlsx($spreadsheet);
        $filename = time() . ".xlsx";
        $writer->save($filename);
        header("Location: " . $filename);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="D:\Css\bootrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title> - Bảng thống kê doanh thu - </title>
   
</head>
<body>
<?php
        include_once 'C:\xampp\htdocs\BTL\btlweb\nav.php';
    ?>
    <?php 
        include_once 'C:\xampp\htdocs\BTL\btlweb\tour\style_tour.php'
    ?>

    <?php
        include_once'./style_revenue.php';
    ?>

    <h2> - Bảng thống kê doanh thu - </h2>
    <form method="post">
        <table border="1" cellspacing="0">
            <tr style="background: #33cccc">
                 <th>STT</th>
                 <th>Mã lịch sử</th>
                 <th>Id</th>
                 <th>Tên khách hàng</th>
                 <th>SĐT</th>
                 <th>Mã tour</th>
                 <th>Thời gian đặt tour</th>
                 <th>Mã giảm giá</th>
                 <th>Giá</th>
            </tr>
            <?php 
              //Bước 3: xử lí kết quả truy vấn : Hiển thị lên bảng
              if(isset($data) && $data){
                $i=0;
                while($row = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $row['history_code'] ?> </td>
                    <td><?php echo $row['id'] ?> </td>
                    <td><?php echo $row['name'] ?> </td>
                    <td><?php echo $row['phone'] ?> </td>
                    <td><?php echo $row['tour_code'] ?> </td>
                    <td><?php echo $row['time_booking'] ?> </td>
                    <td><?php echo $row['voucher_code'] ?> </td>
                    <td><?php echo $row['price'] ?> </td>
                </tr>
               <?php }
              }
            ?>
        </table>

        <input class="btn btn-primary" type="submit" name="btnXuatExcel" value="Xuất Excel">      
        	
    </form>
    
</body>
</html>

