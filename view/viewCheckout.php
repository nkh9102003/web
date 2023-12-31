<div class="container py-4">
    <div class="row">
        <div class="col-md-7">
            <?php
                session_start();
                include_once "../config/dbconnect.php";
                $uid = $_SESSION['user_id'];
                $result = $conn->query("SELECT * FROM GioHang JOIN KhoHang ON GioHang.IdKhoHang=KhoHang.IdKhoHang JOIN SanPham ON KhoHang.IdSP=SanPham.IdSP WHERE IdNguoiDung=$uid");
                $total = 0;
                $count = 1;
                ?>
                <h2>Xác nhận đơn hàng</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">STT</th>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Size</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=$result->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?=$count?></td>
                                    <td><img width="150px" height="100px" src="./uploads/<?=$row['AnhSP']?>"></td>
                                    <td><?=$row['TenSP']?></td>
                                    <td><?=$row['Size']?></td>
                                    <td><?=$row['SoLuong']?></td>
                                    <td><?=$row['Gia']?></td>
                                </tr>
                                <?php
                                $count++;
                                $total+=($row['Gia']*$row['SoLuong']);
                            }
                        ?>
                    </tbody>
                </table>
                <?php
            ?>
        </div>
        <div class="col-md-5">
            <div class="card-account card-container py-5">
                <form action="./controller/confirmOrderController.php" method="POST" class="form-signin">
                    <div class="form-group">
                        <input type="text" name="fullName" class="form-control" placeholder="Họ và tên" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="contact" class="form-control" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">Tổng tiền: <?=$total?> đ</div>
                    <div class="form-gr">
                        <label>Chọn phương thức thanh toán</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" name="payMethod" value="Tiền mặt" required> Trả tiền mặt <br>
                        <input type="radio" name="payMethod" value="Thẻ tín dụng" required> Thẻ tín dụng <br>
                    </div>
                    <button class="btn btn-primary" stlye="height:40px" name="orderConfirm">Xác nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>