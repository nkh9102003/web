<div class="container">
    <h2>Đánh giá sản phẩm</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Sản phẩm</th>
                <th>Người dùng</th>
                <th>Đánh giá</th>
                <th>Ngày đánh giá</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            include_once "../config/dbconnect.php";
            $result = $conn->query("SELECT * FROM DanhGia JOIN SanPham ON DanhGia.IdSP=SanPham.IdSP JOIN NguoiDung ON DanhGia.IdNguoiDung=NguoiDung.IdNguoiDung");
            $count=1;
            while($row = $result->fetch_assoc()){
        ?>
                <tr>
                    <td><?=$count?></td>
                    <td><img src="./uploads/<?=$row['AnhSP']?>" width="100px" height="80px"></td>
                    <td><?=$row['TenSP']?></td>
                    <td><?=$row['TenTK']?></td>
                    <td><?=$row['DanhGia']?></td>
                    <td><?=$row['NgayDanhGia']?></td>
                    <td><button class="btn btn-danger" onclick="deleteReview('<?=$row['IdDanhGia']?>')">Xoá</button></td>
                </tr>
        <?php
            $count++;
            }
        ?>
        </tbody>
    </table>
</div>