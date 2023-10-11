<?php
    $con=mysqli_connect('localhost','root','','tourmanager')
    or die('Lỗi kết nối');
    $sql="SELECT * FROM history_tours  Where history_code";
    $data=mysqli_query($con,$sql);

  require('./fpdf/fpdf.php');
  $pdf = new FPDF();
  $pdf->AddPage();
  $pdf->SetFont('Arial','B',16);
  
  $pdf->Output();


  $pdf->Write(10,'Đơn hàng của bạn gồm có:');
	$pdf->Ln(10);

	$width_cell=array(5,7,80,20,10,40,20,20);

	$pdf->Cell($width_cell[0],10,'history_code',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên',1,0,'C',true);
    $pdf->Cell($width_cell[3],10,'Số Điện Thoại',1,0,'C',true);
	$pdf->Cell($width_cell[4],10,'Mã tour',1,0,'C',true); 
	$pdf->Cell($width_cell[5],10,'Thời gian đặt ',1,1,'C',true);
	$pdf->Cell($width_cell[6],10,'Mã giảm giá',1,1,'C',true); 
    $pdf->Cell($width_cell[7],10,'Giá',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0; 
	while($row = mysqli_fetch_array($query_lietke_dh)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['history_code'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['id'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['name'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,($row['phone']),1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,($row['tour_code']),1,0,'C',$fill);
    $pdf->Cell($width_cell[6],10,$row['time_booking'],1,1,'C',$fill);
    $pdf->Cell($width_cell[7],10,$row['voucher_code'],1,1,'C',$fill);
    $pdf->Cell($width_cell[8],10,$row['price'],1,1,'C',$fill);
    
	$fill = !$fill;

	}
	$pdf->Write(10,'Cảm ơn bạn đã đặt hàng tại website của chúng tôi.');
	$pdf->Ln(10);

?>
