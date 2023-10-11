<?php
include './admin/connect.php';
if (!$_SESSION['login']) {
    header("Location: Login.php");
    exit();
}

$tourCode = $_GET['tourCode'];
$sql = "SELECT * FROM tours WHERE tour_code = '$tourCode'";
$data = mysqli_query($conn, $sql);
$dt_data = mysqli_fetch_array($data);
if ($dt_data !== null) {
    $tourImage = $dt_data['tour_image'];
    $tourName = $dt_data['tour_name'];
    $departTime = $dt_data['depart_time'];
    $timeTour = $dt_data['time_tour'];
    $departLocation = $dt_data['depart_location'];
    $oldPrice = $dt_data['old_price'];
}

$sql1 = "SELECT * FROM detail_tours WHERE tour_code = '$tourCode'";
$data1 = mysqli_query($conn, $sql1);
$dt_data1 = mysqli_fetch_array($data1);

if ($dt_data1 !== null) {
    $scheduleTour = $dt_data1['schedule_tour'];
    $comboTour = $dt_data1['combo_tour'];
    $mapTour = $dt_data1['map_tour'];
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết tour <?php echo $tourCode ?></title>
    <link rel="stylesheet" href="./asset/css/detail_Style.css">
    <style>
        
    </style>
</head>

<body>
    <?php include_once './header.php' ?>

    <u class="line"></u>
    <div class="container">
        <div class="title">
            <h3>Chi tiết tour du lịch</h3>
        </div>
        <div class="tour-content">
            <div class="tour-child1">
                <h4><?php echo $tourName ?></h4>
                <h5 style="color: #2AD455;">Địa điểm khởi hành : <i><?php echo $departLocation ?></i></h5>
                <h5>Thời gian chuyến đi : <?php echo $timeTour ?></h5>
            </div>
            <div class="tour-child2">
                <h6 style="color: #2AD455;">Ngày khởi hành : <?php echo $departTime = date("d/m/Y") ?></h6>
                <h5>Giá : <?php echo $oldPrice ?> VNĐ</h5>
            </div>
        </div>
        <div class="tour-content1">
            <div class="image">
                <img class="img" src="./btlweb/tour/uploads/<?php echo $tourImage ?>" alt="">
            </div>
            <div class="schedule">
                <h5 class="schedule-title"><b>-- Lịch trình chuyến đi --</b></h5>
                <p class="schedule-text">
                    <?php
                    $formattedSchedule = str_replace("\n", "<br>", $scheduleTour);
                    $indentedSchedule = str_replace("\r", "&nbsp;&nbsp;", $formattedSchedule);
                    echo $indentedSchedule;
                    ?>
                </p>
            </div>
        </div>
        <div class="tour-content2">
            <div class="map">
                <h6 class="map-title">Địa chỉ địa điểm</h6>
                <iframe src="<?php echo $mapTour ?>"></iframe>
            </div>
            <div class="combo">
                <h5 class="combo-title"><b>-- Combo tour --</b></h5>
                 <p class="combo-text">
                    <?php
                    $formattedCombo = str_replace("\n", "<br>", $comboTour);
                    $indentedCombo = str_replace("\r", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $formattedCombo);
                    echo $indentedCombo;
                    ?>
                </p>
            </div>
        </div>


    </div>




    <?php include './footer.php' ?>

</body>

</html>