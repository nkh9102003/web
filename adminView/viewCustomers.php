<div>
    <h2>Quản lý khách hàng</h2>
    <button class="btn btn-success" data-toggle="modal" data-target="#addUserModal">Thêm tài khoản</button>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên tài khoản</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            include_once "../config/dbconnect.php";
            $result = $conn->query("SELECT * FROM NguoiDung WHERE QuyenQuanTri=0");
            $count=1;
            while($user=$result->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$count?></td>
                    <td><?=$user['TenTK']?></td>
                    <td><?=$user['Email']?></td>
                    <td><?=$user['SDT']?></td>
                    <td><?=$user['DiaChi']?></td>
                    <td><button class="btn btn-danger" onclick="deleteUser(<?=$user['IdNguoiDung']?>)">Xoá</button></td>
                </tr>
                <?php
                $count++;
            }
        ?>
        </tbody>
    </table>
    <div id="addUserModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Thêm tài khoản</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="./controller/addUserController.php" method="POST" class="form-signin" id="ajaxForm">
                        <input class="form-control" name="username" type="text" placeholder="Tên tài khoản..." required>
                        <input class="form-control" name="email" type="email" placeholder="Email..." required>
                        <input class="form-control" name="password" type="password" placeholder="Mật khẩu..." required>
                        <input class="form-control" name="confirm_password" type="password" placeholder="Nhập lại mật khẩu..." required>
                        <input class="form-control" name="address" type="text" placeholder="Địa chỉ..." required>
                        <input class="form-control" name="contact" type="text" placeholder="Số điện thoại..." required>
                        <button class="btn btn-success">Thêm</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
