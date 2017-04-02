<?php
    include "connect.php";
    $sql = "select username from user";
    $query = mysqli_query($connect, $sql);
    $hoten = $_POST['hoten'];
    $dateofbirth = $_POST['dateofbirth'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    if(isset($_POST['submit'])){
            while($result = mysqli_fetch_assoc($query)) {
                if ($result['username'] == $username) {
                    echo "<script type='text/javascript'>";
                    echo "alert('Username nay da ton tai !!')";
                    echo "</script>";
                } else {
                        $sql1 = "INSERT INTO user ( username, password, sodienthoai, DiaChi, HovaTen, ngaysinh, gioitinh) 
                                            VALUES ( '{$username}', '{$password}', '{$phone}' , '{$address}','{$hoten}', '{$dateofbirth}', 'nam')";
                        mysqli_query($connect, $sql1);
                        echo "<script type='text/javascript'>";
                        echo "alert('Dang ki thanh cong!!')";
                        echo "</script>";
                }
            }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create Account</title>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style_index1.css">
        <link rel="stylesheet" href="../css/login.css">
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
                    <div class="col-md-9">
                        <ul class="nav nav-pills">
                            <li role="presentation" class="active"><a href="/login.php">Đăng nhập</a></li>
<!--                            <li role="presentation"><a href="#">Đăng kí tài khoản</a></li>-->
                            <li role="presentation"><a href="index.php">Trang chủ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="main">
            <div class="container">
                <div class="form-container">
                    <div id="form-title">
                        Thông tin cá nhân
                    </div>
                    <form action="" method="post" class="form">
                        <table>
                            <tr>
                                <td><label>Họ và Tên: </label></td>
                                <td><input name="hoten" type="text" class="form-control" placeholder=" Họ và Tên"></td>
                            </tr>
                            <tr>
                                <td><label>Ngay sinh: </label></td>
                                <td ><input type="text" name="dateofbirth" class="form-control" placeholder=" yyyy-mm-dd"></td>
                            </tr>
                            <tr>
                                <td><label>Dia chi: </label></td>
                                <td><input type="text" name="address" class="form-control" placeholder="Địa chỉ hiện tại"></td>
                            </tr>
                            <tr>
                                <td><label>Số điện thoại </label></td>
                                <td> <input type="text" name="phone" class="form-control" placeholder="Số điện thoại"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Giới tính</label>
                                </td>
                                <td>
                                    <input type="checkbox"> Nam
                                    <input type="checkbox"> Nữ
                                    <input type="checkbox"> Giới tính khác
                                </td>
                            </tr>
                            <tr>
                                <td><label>Tên đăng nhập: </label></td>
                                <td><input type="text" name="username" value=" " class="form-control" placeholder=" Tên đăng nhập "></td>
                            </tr>
                            <tr>
                                <td><label>Mật khẩu: </label></td>
                                <td><input type="password" name="password" value="" class="form-control" placeholder="Mật khẩu"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit" value="Xác nhận tạo tài khoản"></td>
                            </tr>

                        </table>
                    </form>
                </div>

            </div>
        </div>
    </body>
</html>