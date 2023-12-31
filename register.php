<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/all.css">
    <script src="./assets/js/script.js"></script>

    <style>
        body {
            background-image: url('assets/images/gym-composition-with-sport-elements_23-2147915636.jpeg');
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .card-account {
            border-radius: 5px;
            background-color: antiquewhite;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 10px);
        }
    </style>
</head>

<body>
    <?php
        include "./header.php";
    ?>
    <div class="container-fluid px-0 allContent-section">
        <div class="card-account card-container text-center">
            <h3>Đăng ký tài khoản</h3>
            <hr>
            <img src="./assets/images/man-user.svg" class="profile-img-card" id="profile-img">
            <p class="profile-name-card" id="profile-name"></p>
            <form action="./controller/registerValidateController.php" class="form-signin" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="username" class="form-control" placeholder="Tên tài khoản" required>
                <input type="email" name="email" class="form-control" placeholder="Địa chỉ email" required>
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                <input type="password" name="confirm_password" class="form-control" placeholder="Xác nhận mật khẩu" required>
                <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required>
                <input type="number" name="contact" class="form-control" placeholder="SĐT" required>
                <br>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="signup-submit">Đăng ký</button>
            </form>
            <p>Đã có tài khoản? <a href="./login.php">Đăng nhập</a></p>
        </div>
    </div>
    <?php
        include "./footer.php";
    ?>
    <?php
        if(isset($_GET["error"])){
            switch($_GET["error"]){
                case "invalidMail":
                    echo "<script>showNot('failed', 'Email không hợp lệ')</script>";
                    break;
                case "invalidUn":
                    echo "<script>showNot('failed', 'Tên tài khoản không hợp lệ')</script>";
                    break;
                case "incorrectRepwd":
                    echo "<script>showNot('failed', 'Mật khẩu nhập lại không khớp')</script>";
                    break;
                case "sqlErr":
                    echo "<script>showNot('failed', 'Lỗi kết nối')</script>";
                    break;
                case "unExist":
                    echo "<script>showNot('failed', 'Tên tài khoản đã tồn tại')</script>";
                    break;
                case "emExist":
                    echo "<script>showNot('failed', 'Email đã được sử dụng')</script>";
                    break;
            }
        }
    ?>


    <script src="./assets//js/ajaxWork.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
</body>

</html>