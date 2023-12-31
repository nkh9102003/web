<?php
    include "../config/dbconnect.php";
    $wid = $_POST['id'];
    $conn->query("DELETE tb2.*, tb3.* FROM KhoHang AS tb1 LEFT JOIN GioHang AS tb2 ON tb1.IdKhoHang=tb2.IdKhoHang LEFT JOIN ChiTietDH AS tb3 ON tb1.IdKhoHang=tb3.IdKhoHang WHERE tb1.IdKhoHang=$wid");
    $conn->query("DELETE FROM KhoHang WHERE IdKhoHang=$wid");
    echo $conn->error;