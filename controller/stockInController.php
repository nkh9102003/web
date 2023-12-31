<?php
    include_once "../config/dbconnect.php";
    $wid = $_POST['si_ware_id'];
    $pid = $_POST['pid'];
    $quantity = $_POST['siQuantity'];
    $price = $_POST['newPrice'];
    $result = $conn->query("SELECT * FROM KhoHang WHERE IdKhoHang=$wid");
    $ware = $result->fetch_assoc();
    $newQuantity = $ware['TruLuong'] + $quantity;
    $conn->query("UPDATE KhoHang SET TruLuong=$newQuantity WHERE IdKhoHang=$wid");
    $conn->query("UPDATE KhoHang AS tb1, SanPHam AS tb2 SET tb1.Gia=$price, tb2.Gia=$price WHERE tb1.IdSP=$pid AND tb2.IdSP=$pid");