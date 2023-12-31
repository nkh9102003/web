<?php
    session_start();
    include_once "../config/dbconnect.php";
    if(isset($_POST['updateUser'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $contact_num = $_POST['contact_num'];
        $address = $_POST['address'];

        $stmt = $conn->stmt_init();
        $sql = "UPDATE NguoiDung SET TenTK=?, Email=?, SDT=?, DiaChi=? WHERE IdNguoiDung='".$_SESSION['user_id']."'";
        if(!$stmt->prepare($sql)){
            header("Location:../index.php?error=sqlErr");
            exit();
        }
        $stmt->bind_param("ssss", $username, $email, $contact_num, $address);
        $update = $stmt->execute();
        $error = $stmt->error;
        if(!$update){
            header("Location:../index.php?update=fail&error=".$error);
            exit();
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['contact_num'] = $contact_num;
            $_SESSION['address'] = $address;

            header("Location:../index.php?update=success");
            exit();
        }
    }