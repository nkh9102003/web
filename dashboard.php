<?php
    session_start();
    include_once "./config/dbconnect.php";
    include_once "./assets/php/functions.php";

    if(!isset($_SESSION['user_id'])||$_SESSION['isAdmin']==0){
        header("Location: ./login.php?error=noadmin");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/all.css">
    <script src="./assets/js/ajaxWork.js"></script>
    <script src="./assets/js/script.js"></script>

    <style>
        #main-content{
            margin-left: 100px;
        }
        .card{
            background-color: #99C93F;
        }
        .chartBox{
            width: 100%;
        }
    </style>
</head>
<body>
    <?php
        include "./sidebar.php"
    ?>
    <div class="not showNot">
        <span class="fas"></span>
        <span class="msg"></span>
        <span class="close-not">
            <span class="fas fa-times"></span>
        </span>
    </div>
    <div id="main-content" class="container allContent-section">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <img src="./assets/images/customers.jpg" width="50px" height="50px">
                    <h4 class="text-white">Lượng khách hàng</h4>
                    <h5 class="text-white">
                    <?php
                        $result=$conn->query("SELECT * FROM NguoiDung WHERE QuyenQuanTri=0");
                        echo $result->num_rows;
                    ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img src="./assets/images/orders.png" width="50px" height="50px">
                    <h4 class="text-white">Lượng đơn hàng</h4>
                    <h5 class="text-white">
                    <?php
                        $result=$conn->query("SELECT * FROM DonHang");
                        echo $result->num_rows;
                    ?>
                    </h5>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <img src="./assets/images/product.png" width="50px" height="50px">
                    <h4 class="text-white">Lượng sản phẩm</h4>
                    <h5 class="text-white">
                    <?php
                        $result=$conn->query("SELECT * FROM SanPham");
                        echo $result->num_rows;
                    ?>
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                $yearRevenue = array();
                $yearLabel = array();
                $monthRevenue = array();
                $monthLabel = array();
                $weekRevenue = array();
                $weekLabel = array();

                $toDay = date("d");
                $curMonth = date("m");
                $curYear = date("Y");

                for ($i=11; $i >= 0; $i--) { 
                    $month = ($curMonth-$i) <= 0 ? $curMonth-$i+12 : $curMonth-$i;
                    $year = $curYear - (($curMonth-$i) <= 0 ? 1: 0 );
                    array_push($yearLabel, $month."/".$year);
                    array_push($yearRevenue, calculateMonthProfit($month, $year));
                }

                $nODCurMonth = cal_days_in_month(CAL_GREGORIAN, $curMonth, $curYear);
                for ($i=1; $i <= $nODCurMonth; $i++){
                    array_push($monthLabel, $i."/".$curMonth);
                    array_push($monthRevenue, calculateDayProfit($i, $curMonth, $curYear));
                }

                $preMonth = ($curMonth-1) <= 0 ? 12 : $curMonth-1;
                $nODPreMonth = cal_days_in_month(CAL_GREGORIAN, $preMonth, $curYear);
                for ($i=6; $i>=0; $i--){
                    $day = ($toDay-$i) <= 0 ? $nODPreMonth-($toDay-$i) : $toDay-$i;
                    $month = ($toDay-$i) <= 0 ? $preMonth : $curMonth;
                    $year = (($toDay-$i) <= 0 && ($curMonth-1) <= 0) ? $curYear-1 : $curYear;
                    array_push($weekLabel, $day."/".$month."/".$year);
                    array_push($weekRevenue, calculateDayProfit($day, $month, $year));
                }


                $yearRevenueJson =  json_encode($yearRevenue);
                $yearLabelJson =  json_encode($yearLabel);
                $monthRevenueJson =  json_encode($monthRevenue);
                $monthLabelJson =  json_encode($monthLabel);
                $weekRevenueJson =  json_encode($weekRevenue);
                $weekLabelJson =  json_encode($weekLabel);

            ?>
            <div>
                <label for="">Thống kê doanh thu: </label>
                <select class="select-box" id="chart-time">
                    <option value="year">12 tháng gần đây</option>
                    <option value="month">tháng này</option>
                    <option value="week">7 ngày gần đây</option>
                </select>
            </div>
            <div class="chartBox">
                <canvas id="myChart"></canvas>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>

                //Setup
                const data = {
                    labels: <?= $yearLabelJson?>,
                    datasets: [{
                        label: 'Doanh thu',
                        data: <?= $yearRevenueJson?>,
                        
                    }]
                };
                //Config
                const config = {
                    type: 'line',
                    data: data,
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: "Thống kê doanh thu",
                                font:{
                                    size: 25
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    offset: true
                                }

                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    offset: true
                                }
                            }
                        }
                    }
                }
                //Render
                const myChart = new Chart(document.getElementById('myChart'), config);
                
            </script>


        </div>
    </div>

    <?php
        if(isset($_GET["error"])){
            switch($_GET["error"]){
                case "invalidMail":
                    echo "<script>showCustomers()</script>";
                    echo "<script>showNot('failed', 'Email không hợp lệ')</script>";
                    break;
                case "invalidUn":
                    echo "<script>showCustomers()</script>";
                    echo "<script>showNot('failed', 'Tên tài khoản không hợp lệ')</script>";
                    break;
                case "incorrectRepwd":
                    echo "<script>showCustomers()</script>";
                    echo "<script>showNot('failed', 'Mật khẩu nhập lại không khớp')</script>";
                    break;
                case "sqlErr":
                    echo "<script>showCustomers()</script>";
                    echo "<script>showNot('failed', 'Lỗi kết nối')</script>";
                    break;
                case "unExist":
                    echo "<script>showCustomers()</script>";
                    echo "<script>showNot('failed', 'Tên tài khoản đã tồn tại')</script>";
                    break;
                case "emExist":
                    echo "<script>showCustomers()</script>";
                    echo "<script>showNot('failed', 'Email đã được sử dụng')</script>";
                    break;
                case "addProduct":
                    echo "<script>showProduct()</script>";
                    echo "<script>showNot('failed', 'Thêm sản phẩm thất bại')</script>";
                    break;
                case "updateProduct":
                    echo "<script>showProduct()</script>";
                    echo "<script>showNot('failed', 'Cập nhật sản phẩm thất bại')</script>";
                    break;
                case "size":
                    echo "<script>showProduct()</script>";
                    echo "<script>showNot('failed', 'Ảnh sản phẩm có kích thước quá lớn (>50mb)')</script>";
                    break;
                case "ext":
                    echo "<script>showProduct()</script>";
                    echo "<script>showNot('failed', 'Định dạng ảnh không xác định')</script>";
                    break;
                case "img";
                    echo "<script>showProduct()</script>";
                    echo "<script>showNot('failed', 'Không thể tải ảnh')</script>";
                    break;
            }
        }
        if(isset($_GET["action"])){
            switch($_GET["action"]){
                case "addUser":
                    echo "<script>showCustomers()</script>";
                    echo "<script>showNot('succeeded','Thêm tài khoản thành công!')</script>";
                    break;
                case "addProduct":
                    echo "<script>showProducts()</script>";
                    echo "<script>showNot('succeeded','Thêm sản phẩm thành công!')</script>";
                    break;
                case "updateProduct":
                    echo "<script>showProducts()</script>";
                    echo "<script>showNot('succeeded','Cập nhật sản phẩm thành công!')</script>";
                    break;
            }
        }
    ?>
    


    
    <script>
        document.querySelector('.close-not').addEventListener('click', hideNot);

        document.getElementById('chart-time').addEventListener('change', function() {
            const selectedTime = this.value;
            chartDataset = myChart.data.datasets[0];
            if (selectedTime === "year"){
                chartDataset.data = <?= $yearRevenueJson?>;
                myChart.data.labels = <?= $yearLabelJson?>;
                myChart.config.type = "line";
                chartDataset.borderWidth = undefined;
                chartDataset.borderColor = undefined;
                chartDataset.hoverBorderWidth = undefined;
                chartDataset.borderColor = undefined;

            }else if (selectedTime === "month"){

                chartDataset.data = <?= $monthRevenueJson?>;
                myChart.data.labels = <?= $monthLabelJson?>;
                myChart.config.type = "bar";
                chartDataset.borderWidth = 1;
                chartDataset.borderColor = '#777';
                chartDataset.hoverBorderWidth = 2;
                chartDataset.borderColor = '#000';
            }else if (selectedTime === "week"){
                chartDataset.data = <?= $weekRevenueJson?>;
                myChart.data.labels = <?= $weekLabelJson?>;
                myChart.config.type = "bar"
                chartDataset.borderWidth = 1;
                chartDataset.borderColor = '#777';
                chartDataset.hoverBorderWidth = 3;
                chartDataset.borderColor = '#000';
                document.getElementById('myChart').style.width = '1000px';
            }
            myChart.update();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    
</body>
</html>