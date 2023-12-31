<?php
    include_once "../../config/dbconnect.php";
    function calculateMonthProfit($month, $year){
        global $conn;
        $result = $conn->query("SELECT * FROM DonHang Join ChiTietDH ON DonHang.IdDonHang=ChiTietDH.IdDonHang WHERE MONTH(NgayDat)=$month AND YEAR(NgayDat)=$year AND TrangThaiTT=1");
        $profit = 0;
        while($row=$result->fetch_assoc()){
            $profit+= $row['Gia']*$row['SoLuong'];
        }
        return $profit;
    }
    function calculateDayProfit($day, $month, $year){
        global $conn;
        $result = $conn->query("SELECT * FROM DonHang Join ChiTietDH ON DonHang.IdDonHang=ChiTietDH.IdDonHang WHERE DAY(NgayDat)=$day AND MONTH(NgayDat)=$month AND YEAR(NgayDat)=$year AND TrangThaiTT=1");
        $profit = 0;
        while($row=$result->fetch_assoc()){
            $profit+= $row['Gia']*$row['SoLuong'];
        }
        return $profit;
    }

