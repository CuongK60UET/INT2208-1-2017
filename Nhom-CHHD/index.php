<?php
include_once "/connect.php";
?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mua bán quần áo đẹp</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_index1.css">
    <link rel="stylesheet" href="../css/slide.css">
    <script type="text/javascript" src="../Jquery/jquery-3.1.1.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.addcart').text("Thêm vào giỏ hàng ");
        })
    </script>
</head>
<body>
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
                    ?>
                            <li role="presentation" class="user">
                                <div id="user">
                                    <img src="../image/contacts_icon21.png" width="22" >
                                    <p><?php echo $object['HovaTen'];?></p>
                                    <div >
                                        <ul>
<!--                                            <li>-->
<!--                                                <a href="#">Thông tin người dùng</a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="logout.php">Đăng xuất</a>-->
<!--                                            </li>-->
                                        </ul>
                                    </div>

                                </div>
                            </li>
                    <?php
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
            <div class="col-md-3 ">
                <div class="left_main">
                    <h5><b>Danh mục sản phẩm</b></h5>
                    <ul class="ds_sanpham">
                        <?php
                        $sql = "SELECT MaLoai,TenLoaisp FROM loai_sanpham";
                        $query = mysqli_query($connect, $sql);
                        if (mysqli_num_rows($query)>0){
                            while($row = mysqli_fetch_assoc($query)){
                                echo "<a href='/block.php?id={$row['MaLoai']}'><li>{$row['TenLoaisp']}</li></a>";
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="slide">
                    <div class="img-slide">
                        <span id="next"><a><img src="../image/next.png" width="30" height="30"></a></span>
                        <span id="prev"><a><img src="../image/prev.png" width="30" height="30"></a></span>
                        <ul class="icon_bot">
                            <li><a><img class="img_icon_bot active_icon" src="../image/img_bot.png" width="11" height="11" stt = "0"></a></li>
                            <li><a><img class="img_icon_bot" src="../image/img_bot.png" width="11" height="11" stt = "1"></a></li>
                            <li><a><img class="img_icon_bot" src="../image/img_bot.png" width="11" height="11" stt = "2"></a></li>
                            <li><a><img class="img_icon_bot" src="../image/img_bot.png" width="11" height="11" stt = "3"></a></li>
                            <li><a><img class="img_icon_bot" src="../image/img_bot.png" width="11" height="11" stt = "4"></a></li>
                        </ul>
                        <img class="img" src="../image/1.jpg" stt="0">
                        <img class="img" src="../image/2.jpg" stt="1" style="display: none">
                        <img class="img" src="../image/3.jpg" stt="2" style="display: none">
                        <img class="img" src="../image/4.jpg" stt="3" style="display: none">
                        <img class="img" src="../image/5.jpg" stt="4" style="display: none">
                    </div>

                </div>
            </div>

            <div class="col-md-7 sp_noibat">
                <h5 class="spnoibat"><b>Các sản phẩm nổi bật trong ngày</b></h5>
                <ul class="main_sanpham">
                     <?php
                         $sql1 = "SELECT * FROM quanao";
                         $query1 = mysqli_query($connect, $sql1);
                          if(mysqli_num_rows($query1)>0) {
                              $a = 1;
                              while(($row = mysqli_fetch_assoc($query1)) && $a < 4 ) {
                                  if (in_array($row['MaQuanAo'], $_SESSION['giohang']) == false){
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
                                      $a = $a+1;
                                  }
                              }
                          }
                      ?>
                </ul>
            </div>
            <div class="col-md-2 chuthich"></div>
        </div>
    </div>
</div>
<div id="footer">
    <h1>Footer</h1>
</div>
<script>
    $(document).ready(function () {
        var stt, a, stt1;
//        var endImg = $(".img:last").attr();
//        var firstImg = $(".img:first").attr();
        firstImg = $(".img:first").attr("stt");
        lastImg = $(".img:last").attr("stt");
        $(".img").each(function () {
            if($(this).is(":visible")){
                stt = $(this).attr("stt");
            }
        })
        $(".img_icon_bot").click(function () {
            $(".img").hide();
            $(".img").eq($(this).attr("stt")).show(2);
            stt = $(this).attr("stt");
        })
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
        $("#next").click(function () {
            a = ++stt;
            if(a>lastImg){
                a = firstImg;
                stt = firstImg;
            }
            $(".img").hide();
            $(".img").eq(a).show(2);
            $(".img_icon_bot").eq(a-1).removeClass("active_icon");
            $(".img_icon_bot").eq(a).addClass("active_icon");
        })
        $("#prev").click(function () {
            a = --stt;
            if(a<firstImg){
                a = firstImg;
                stt = firstImg;
            }
            $(".img").hide();
            $(".img").eq(a).show(2);
            $(".img_icon_bot").eq(a+1).removeClass("active_icon");
            $(".img_icon_bot").eq(a).addClass("active_icon");
        })
        setInterval(function () {
            $("#next").click();
        }, 3000);
    })
</script>
</body>
</html>