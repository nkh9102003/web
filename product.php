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
        .carousel-control-prev-icon, .carousel-control-next-icon {

            outline: black;
            background-color: rgba(0, 0, 0, 0.3);
            background-size: 100%, 100%;
            border-radius: 50%;
            border: 2px solid grey;
        }
        .dropdown{
            position: relative
        }
        .dropdown-content{
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            padding: 10px;

        }
        .dropdown-content button{
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content button:hover {
            background-color: #ddd;
        }
        .dropdown:hover .dropdown-content{
            display: block;
        }
        .product-card{
            min-height: 450px;
        }
    </style>
</head>
<body>
    <?php
        include_once "./header.php";
        include_once "./config/dbconnect.php";

        $selectProduct = "SELECT * FROM SanPham";
        $selectedProduct = mysqli_query($conn, $selectProduct);
    ?>

    <div id="main-content" class="allContent-section container">
        <div id="demo" class="carousel slide mb-4" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                    $count = 0;
                    while($row = mysqli_fetch_array($selectedProduct)){
                        if($count == 0){
                            ?>
                            <div class="carousel-item active">
                            <?php
                        }else{
                            ?>
                            <div class="carousel-item">
                            <?php
                        }
                            ?>
                                <div class="row text-center py-5 pl-5">
                                    <div class="col pl-5">
                                        <img src="./uploads/<?= $row['AnhSP']?>" style="" height="300px">
                                    </div>
                                    <div class="col mr-4">
                                        <div class="text-left mr-5">
                                            <h2><?=$row['TenSP']?></h2>
                                            <h4>đ. <?=$row['Gia']?></h4>
                                            <button class="btn btn-primary mt-3" style="height:40px;" onclick="showEachProduct('<?=$row['IdSP']?>')"> Xem chi tiết</button>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <?php
                        $count++;
                    }
                ?>
            </div>
            <a href="#demo" class="carousel-control-prev" data-slide="prev" role="button">
                <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                <span class="sr-only">Previous</span>
            </a>
            <a href="#demo" class="carousel-control-next" data-slide="next" role="button">
                <span class="carousel-control-next-icon" aria-hidden="true" ></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container-fluid px5" >
            <div class="searchBar mx-5">
                <div class="dropdown d-inline-block" style="margin-right:66%">
                    <i class="fa fa-bars" aria-hidden="true"></i> Thương hiệu
                    <div class="dropdown-content" style="min-width:300px">
                        <button type="submit" class="btn mt-1 mx-1" onclick="brandSearch(0)">Tất cả</button>
                        <?php
                            $selectBrand = "SELECT * FROM ThuongHieu";
                            $selectedBrand = mysqli_query($conn, $selectBrand);
                            while($row = mysqli_fetch_array($selectedBrand)){
                                ?>
                                <button type="submit" class="btn mt-1 mx-1" onclick="brandSearch(<?=$row['IdThuongHieu']?>)"><?=$row['ThuongHieu']?></button>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <form class="form-inline d-inline-block my-2 my-lg-0">
                    <input type="text" class="form-control mr-sm-2" id="search_data" placeholder="Tìm kiếm" aria-label="Tìm kiếm">
                    <i class="fa-solid fa-magnifying-glass" id="searchBtn" aria-hidden="true" style="margin-left:-40px;cursor:pointer;" onclick="nameSearch()"></i>
                </form>
            </div>
            
            <div class="row px-5 py-4 productList">
                <?php
                $selectedProduct = mysqli_query($conn, $selectProduct);
                    while($row = mysqli_fetch_array($selectedProduct)){
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
                                    <h5 class="card-title" title="<?=$row['TenSP']?>" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; "><?=$row['TenSP']?></h5>
                                    <p style="color: green">đ. <?=$row['Gia']?></p>
                                    <p class="card-text">
                                        <form id="addToCartForm<?=$row['IdSP']?>" method="post">
                                            <div class="form-group">
                                                <label for="size<?=$row['IdSP']?>">Size</label>
                                                <select id="size<?=$row['IdSP']?>" name="size" onchange="checkStock(<?=$row['IdSP']?>)">
                                                    <option disabled selected value="empty">Chọn size</option>
                                                    <?php
                                                        $result = mysqli_query($conn, "SELECT * FROM KhoHang WHERE IdSP='".$row['IdSP']."'");
                                                        while($sizeRow=mysqli_fetch_assoc($result)){
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
                                                    <button id="addToCartBtn<?=$row['IdSP']?>" type="button" onclick="validateForm(<?=$row['IdSP']?>)" class="btn btn-success" name="addToCart">Thêm vào giỏ hàng</button>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <button id="addToCartBtn<?=$row['IdSP']?>" type="button" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Thêm vào giỏ hàng</button>
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
                ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Đăng nhập</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="form-signin" action="./controller/loginValidateController.php" method="post">
                        <span id="reauth-email" class="reauth-email"></span>
                        <input type="text" name="usernameEmail" class="form-control" placeholder="Tên đăng nhập /Email" required autofocus>
                        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login-submit">Đăng nhập</button>
                    </form>
                    <p>Không có tài khoản? <a href="./register.php">Đăng ký</a></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Đóng</button>                    
                </div>
            </div>
        </div>
    </div>
    <?php
        include_once "./footer.php";
    ?>

    <script>
        function validateForm(id){
            var size = document.getElementById('size'+id).value;
            if(size === "empty"){
                showNot("warning", "Vui lòng chọn size!");
            }else{
                addToCart(id);
            }
            
        }
        document.addEventListener("DOMContentLoaded",function(){
            var input = document.getElementById("search_data");
            input.addEventListener("keypress", function(event){
                if(event.key === "Enter"){
                    event.preventDefault();
                    document.getElementById("searchBtn").click();
                }
            });
        });
        

    </script>

    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    
</body>
</html>