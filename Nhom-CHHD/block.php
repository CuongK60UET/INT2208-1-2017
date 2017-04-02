<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mua bán quần áo đẹp</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_index1.css">
    <script type="text/javascript" src="../Jquery/jquery-3.1.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
include_once "/connect.php";
$sql = "SELECT MaLoai,TenLoaisp FROM loai_sanpham";
$query = mysqli_query($connect, $sql);
$id = $_GET['id'];
?>
<div id="header">
    <div class="container ">
        <div class="row">
            <div class=" col-md-3 logo">
                <a href="index.php"><img src="../image/logo.png" height="80" title="Quanaonam.com Web bán quần áo đẹp và rẻ hàng đầu Việt Nam"></a>
            </div>
            <div class="col-md-9">
                <ul class="nav nav-pills">
                    <?php
                    if(isset($_SESSION['userinfo'])){
                        $object = $_SESSION['userinfo'];
                        echo '<li role="presentation" class="active"><a href="logout.php">Đăng xuất</a></li>';
                        echo '<li role="presentation"><a href="Cart.php">Đi tới giỏ hàng</a></li>';
                    }
                    else{
                        echo '<li role="presentation" class="active"><a href="/login.php">Đăng nhập</a></li>';
                    }

                    ?>
                    <li role="presentation"><a href="createaccount.php">Đăng kí tài khoản</a></li>
                    <li role="presentation"><a href="index.php">Trang chủ</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>
<div id="main">
    <div class="container main_content">
        <div class="row">
            <div class="col-md-3 left_main">
                <h5><b>Danh mục sản phẩm</b></h5>
                <ul class="ds_sanpham">
                    <?php
                    if (mysqli_num_rows($query)>0){
                        while($row = mysqli_fetch_assoc($query)){
                            echo "<a href='/block.php?id={$row['MaLoai']}'><li>{$row['TenLoaisp']}</li></a>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-7 sp_noibat">
                <h5 class="spnoibat"><b>Các sản phẩm thuộc danh mục <?php
                $sql1 = "SELECT * FROM loai_sanpham WHERE MaLoai = $id";
                $query1 = mysqli_query($connect, $sql1);
                $text = mysqli_fetch_assoc($query1);
                echo "{$text['TenLoaisp']}</b></h5>";
                ?>
                <ul class="main_sanpham">
                    <?php
                    $sql2 = "SELECT a.MaQuanAo, a.chuthich, a.color, a.Gia, a.image, a.sizes, a.TenQuanao, b.MaLoai, b.MaQuanAo 
                              FROM quanao a, list_show b WHERE (a.MaQuanAo = b.MaQuanAo) && (b.MaLoai = $id)";
                    $query2 = mysqli_query($connect, $sql2);
                    if(mysqli_num_rows($query2)>0) {
                        while(($row = mysqli_fetch_assoc($query2))) {
                            ?>
                            <li id='sanpham' class='row'>
                                <div class='col-sm-5'>
                                    <img src="../<?php echo $row['image'] ?>" width='200px'>
                                </div>
                                <div class='col-sm-7 text_info'>
                                    <a href='#'><b>Tên sản phẩm: <?php echo $row['TenQuanao'] ?></b></a>
                                    <p><b>Giá: <?php echo $row['Gia'] ?></b></p>
                                    <p><b>Màu sắc:</b> <?php echo $row['color'] ?></p>
                                    <p><b>Size: </b> <?php echo $row['sizes'] ?></p>
                                    <p><b>Chú thích: </b><br><?php echo $row['chuthich'] ?></p>
                                    <b>Số lượng: </b>
                                    <input type = "number" id = "soluong"  style="width: 50px" value="1">Chiếc <br>
                                    <div class='button' >
                                        <button class='btn addcart <?php echo $row['MaQuanAo'] ?>' type='button' data_sp="<?php echo $row['MaQuanAo'] ?>" data_tensp ="<?php echo $row['TenQuanao'] ?>" data_giasp="<?php echo $row['Gia'] ?>"
                                                data_colorsp="<?php echo $row['color'] ?>" data_sizesp="<?php echo $row['sizes'] ?>" data_notesp="<?php echo $row['chuthich'] ?>" name ="add" data_anhsp="<?php echo $row['image'] ?>">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="footer">

</div>
<script>
    $(document).ready(function () {
        $('.addcart').click(function() {
            $(this).text("Bạn đã mua sản phẩm này");
            var id = $(this).attr('data_sp');
            var ten = $(this).attr('data_tensp');
            var gia = $(this).attr('data_giasp');
            var color = $(this).attr('data_colorsp');
            var size = $(this).attr('data_sizesp');
            var chuthich = $(this).attr('data_notesp');
            var image = $(this).attr('data_anhsp');
            var soluong =$(this).closest(".text_info").find("#soluong").val();
            $.post("themvaogiohang.php", {ma: id, soluong: soluong, ten: ten, gia: gia, color: color, size: size, chuthich: chuthich, image: image}, function () {
            });
        });
    })
</script>
</body>
</html>