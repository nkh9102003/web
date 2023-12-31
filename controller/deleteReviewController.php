<?php
    include_once "../config/dbconnect.php";
    $rid = $_POST['id'];
    $conn->query("DELETE FROM DanhGia WHERE IdDanhGia=$rid");