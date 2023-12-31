<?php
    session_start();
?>

<div class="container rounded bg-white flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img src="./assets/images/man-user.svg" class="rounded-circle mt-5" width="150px">
                <span class="font-weight-bold"><?=$_SESSION['username']?></span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="font-weight-bold">Thông tin tài khoản</h4>
                </div>
                <form action="./controller/updateUserController.php" method="POST">
                    <label for="username" class="my-2" >Tên tài khoản: </label><input type="text" class="form-control" name="username" id="username" value="<?=$_SESSION['username']?>">
                    <label for="email" class="my-2">Email: </label><input type="email" class="form-control" name="email" id="email" value="<?=$_SESSION['email']?>">
                    <label for="contact_num" class="my-2">Số điện thoại: </label><input type="number" class="form-control" name="contact_num" id="contact_num" value="<?=$_SESSION['contact_num']?>">
                    <label for="address" class="my-2">Địa chỉ</label><input type="text" class="form-control" name="address" id="address" value="<?=$_SESSION['address']?>">
                    <div class="row">
                        <div><button class="mt-5 btn btn-primary" name="updateUser">Cập nhật</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
