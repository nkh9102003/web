<?php
    session_start();
    include_once "../config/dbconnect.php";
    echo $pid = $_POST['pid'];
    echo $review = $_POST['review'];
    $stmt = $conn->stmt_init();
    $stmt->prepare("INSERT INTO DanhGia (IdNguoiDung, IdSP, DanhGia) VALUES (?,?,?)");
    $stmt->bind_param("sss", $_SESSION['user_id'], $pid, $review);
    $stmt->execute();
