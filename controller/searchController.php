
    <?php
        session_start();
        include_once "../config/dbconnect.php";

        if(isset($_POST['searchData'])){
            $searchData = $_POST['searchData'];
            $result = $conn->query("SELECT * FROM SanPham WHERE TenSP LIKE '%$searchData%'");
        }elseif(isset($_POST['id'])){
            $bid = $_POST['id'];
            if($bid=='0'){
                $result = $conn->query("SELECT * FROM SanPham");
            }else{
                $result = $conn->query("SELECT * FROM SanPham WHERE IdThuongHieu='$bid'");
            }
        }
        
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                ?>
                <div class="col-sm-4">
                    <div class="card product-card">
                        <div class="box">
                            <img src="./uploads/<?=$row['AnhSP']?>" class="image">
                            <div class="middle">
                                <div class="text" onclick="showEachProduct('<?=$row['IdSP']?>')">Xem chi tiết</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title" title="<?=$row['TenSP']?>" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?=$row['TenSP']?></h5>
                            <p style="color: green">đ. <?=$row['Gia']?></p>
                            <p class="card-text">
                                <form method="POST" id="addToCartForm">
                                    <div class="form-group">
                                        <label for="size<?=$row['IdSP']?>">Size:</label>
                                        <select id="size<?=$row['IdSP']?>" name="size" onchange="checkStock(<?=$row['IdSP']?>)">
                                            <option value="empty" disabled selected>Chọn size</option>
                                        <?php
                                            $result1 = $conn->query("SELECT * FROM KhoHang WHERE IdSP='".$row['IdSP']."'") ;
                                            while($sizeRow=$result1->fetch_assoc()){
                                                echo "<option value='".$sizeRow['IdKhoHang']."'>".$sizeRow['Size']."</option>";
                                            }   
                                        ?>
                                        </select>
                                        <p id="stock<?=$row['IdSP']?>" style="min-height:30px;"></p>
                                        <input type="hidden" name="pid" value="<?=$row['IdSP']?>">
                                    </div>
                                    <?php
                                        if(isset($_SESSION['user_id'])){
                                            ?>
                                            <button id="addToCart<?=$row['IdSP']?>" type="button" onclick="validateForm(<?=$row['IdSP']?>)" class="btn btn-success" name="addToCart">Thêm vào giỏ hàng</button>
                                            <?php
                                        }else{
                                            ?>
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Thêm vào giỏ hàng</button>
                                            <?php
                                        }
                                    ?>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }else{
            ?>
            <div class="px-3">Không tìm thấy sản phẩm</div>
            <?php
        }
    ?>