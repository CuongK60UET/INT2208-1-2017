<?php
    include_once "connect.php";
    $object = $_SESSION['userinfo'];
    $giohang = $_SESSION['giohang'];
    $id = $object['userID'];
    $sql = "select * FROM quanao";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
//    $sql1 = "select * from giohang WHERE userID = $id";
//    $result1 = mysqli_query($connect, $sql1);
//    if(!mysqli_num_rows($result1)){
//        while ($row1 = mysqli_fetch_assoc($result1)){
//            if($row1[''])
//            $giohang[] = [''];
//        }
//
//    }


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_index1.css">
    <script type="text/javascript" src="../Jquery/jquery-3.1.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div id="header">
    <div class="container ">
        <div class="row">
            <div class=" col-md-3 logo">
                <a href="index.php"><img src="../image/logo.png" height="80" title="Quanaonam.com Web bán quần áo đẹp và rẻ hàng đầu Việt Nam"></a>
            </div>
            <div class="col-md-9" >
                <ul class="nav nav-pills " >
                    <li role="presentation" class="active login"><a href="logout.php" >Đăng xuất</a></li>
                    <li role="presentation"><a href="createaccount.php">Đăng kí tài khoản</a></li>
                    <li role="presentation"><a href="index.php">Trang chủ</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="main">
    <div class="container" style="width: 700px">
        <h5>Các sản phẩm có trong giỏ hàng </h5>
        <ul class="ds_sanpham">
            <?php
                if(count($giohang)>0){
                    foreach ($giohang as $gh) {
                        ?>
                        <li id='sanpham' class='row'>
                            <div class='col-sm-5'>
                                <img src='../<?php echo $gh['image'] ?>' width='200px'>
                            </div>
                            <div class='col-sm-7 text_info'>
                                <a href='#'><b>Tên sản phẩm: <?php echo $gh['TenQuanao'] ?></b></a>
                                <p><b>Giá: <?php echo $gh['Gia'] ?></b></p>
                                <p><b>Màu sắc:</b> <?php echo $gh['color'] ?></p>
                                <p><b>Size: </b> <?php echo $gh['sizes'] ?></p>
                                <p><b>Chú thích: </b><br><?php echo $gh['chuthich'] ?></p>
                                <p><b>Số lượng: </b><?php echo $gh['soluong'] ?> Chiếc</p>
                                <div class='button'>
                                    <button class="btn del-cart <?php echo $gh['MaQuanAo']?>" data_sp="<?php echo $gh['masp'] ?>">
                                    Huỷ mua sản phẩm này
                                    </button>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                }else{
                    echo "<h5>Giỏ hàng của bạn hiện tại trống</h5>";
                }
            ?>
        </ul>
    </div>
</div>
<div id="footer">

</div>
<script>
    $(document).ready(function () {
        $(".del-cart").click(function () {
            $(this).text("Đã huỷ ");
            var id = $(this).attr('data_sp');
//            alert(id);
            $.post("huy-sanpham.php", {masp: id}, function () {
            });
        });
    })
</script>
</body>
</html>