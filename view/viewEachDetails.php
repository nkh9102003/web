<?php
    session_start();
    include_once "../config/dbconnect.php";
    $id = $_POST['id'];
    $result = mysqli_query($conn, "SELECT * FROM SanPham WHERE IdSP='".$id."'");
    $product = mysqli_fetch_assoc($result);

?>

<div class="container py-5">
    <h3 class="pl-2">Chi tiết sản phẩm</h3>
    <div class="row img-zoom-container">
        <div class="col pr-5">
            <div class="card">
                <img src="./uploads/<?=$product['AnhSP']?>" class="img card-img-top" id="myimage" style="object-fit:cover;" ></img>
            </div>
        </div>
        <div class="col">
            <h4><?=$product['TenSP']?></h4>
            <p><?=$product['MoTa']?></p>
            <div class="currency">đ. <?= $product['Gia']?></div>
            <p class="card-text">
                <form>
                    <div class="form-group">
                        <label for="size<?=$product['IdSP']?>">Size: </label>
                        <select id="size<?=$product['IdSP']?>" onchange="checkStock(<?=$product['IdSP']?>)">
                            <option disabled selected value="empty">Chọn size</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM KhoHang WHERE IdSP='".$id."'");
                            while($size=mysqli_fetch_assoc($result)){
                                echo "<option value='".$size['IdKhoHang'].".'>".$size['Size']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <p id="stock<?=$product['IdSP']?>" style="min-height:30px;"></p>
                    <input type="hidden" name="id" value="<?=$id?>">
                    <?php
                        if(isset($_SESSION['user_id'])){
                            ?>
                            <button id="addToCart<?=$product['IdSP']?>" type="button" onclick="validateForm(<?=$product['IdSP']?>)" class="btn btn-success mt-1" name="addToCart" style="height:40px;">Thêm vào giỏ hàng</button>
                            <?php
                        }else{
                            ?>
                            <button type="button" class="btn btn-success mt-1" style="height:40px" data-toggle="modal" data-target="#loginModal" >Thêm vào giỏ hàng</button>
                            <?php
                        }
                    ?>
                </form>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col py-5">
            <h5 style="color:#584e46">Viết đánh giá về sản phẩm</h5>
            <form>
                <textarea id="review" rows="4" class="form-control" required></textarea>
                <button class="btn btn-primary mt-3" type="button" onclick="<?=isset($_SESSION['user_id']) ? "sendReview('".$id."')" : 'alert(\'Đăng nhập để gửi đánh giá\')' ?>">Gửi</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="container my-4">
            <h5 class="mx-3">Đánh giá của khách hàng</h5>
            <div>
                <div class="customer-review w-100">
                <?php
                    $query = $conn->query("SELECT * FROM DanhGia WHERE IdSP='".$product['IdSP']."' AND IdNguoiDung='".$_SESSION['user_id']."'");
                    while($review = $query->fetch_assoc()){
                    ?>
                        <div class="card">
                            <h6 class="mb-1">
                                <?php
                                    $query2 = $conn->query("SELECT TenTK FROM NguoiDung WHERE IdNguoiDung='".$review['IdNguoiDung']."'");
                                    $username = $query2->fetch_row();
                                    echo $username[0];
                                ?>
                            </h6>
                            <span class="date text-muted float-right"><?=$review['NgayDanhGia']?></span>
                            <div class="mt-3">
                                <p><?=$review['DanhGia']?></p>
                            </div>
                            <p class="text-right text-danger" onclick="deleteReview('<?=$review['IdDanhGia']?>','<?=$id?>')">Xoá</p>
                        </div>
                    <?php
                    }    

                    $query = $conn->query("SELECT * FROM DanhGia WHERE IdSP='".$product['IdSP']."' AND IdNguoiDung!='".$_SESSION['user_id']."'");
                    while($review = $query->fetch_assoc()){
                    ?>
                        <div class="card">
                            <h6 class="mb-1">
                                <?php
                                    $query2 = $conn->query("SELECT TenTK FROM NguoiDung WHERE IdNguoiDung='".$review['IdNguoiDung']."'");
                                    $username = $query2->fetch_row();
                                    echo $username[0];
                                ?>
                            </h6>
                            <span class="date text-muted float-right"><?=$review['NgayDanhGia']?></span>
                            <div class="mt-3">
                                <p><?=$review['DanhGia']?></p>
                            </div>
                        </div>
                    <?php
                    }    
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   
    
    
</script>