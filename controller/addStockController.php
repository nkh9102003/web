<?php
    include_once "../config/dbconnect.php";
    $pid = $_POST['pid'];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $result = $conn->query("SELECT IdKhoHang FROM KhoHang WHERE IdSP=$pid AND `Size`='$size'");
    if($result->num_rows>0){
        $ware = $result->fetch_row();
        $wid = $ware[0];
        $conn->query("UPDATE KhoHang SET TruLuong=(TruLuong+$quantity) WHERE IdKhoHang=$wid");
    }else{
        $conn->query("INSERT INTO KhoHang (IdSP, `Size`, Gia, TruLuong ) VALUES ('$pid', '$size', '$price', '$quantity')");
    }
    $conn->query("UPDATE KhoHang AS tb1, SanPham AS tb2 SET tb1.Gia='$price', tb2.Gia='$price' WHERE tb1.IdSP='$pid' AND tb2.IdSP='$pid'");
