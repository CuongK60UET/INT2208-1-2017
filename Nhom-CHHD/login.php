<?php
if(isset($_POST['login'])){
    include "connect.php";
    $user = $_POST['username1'];
    $pass = $_POST['password1'];
    // Khi đã có thông tin của user đẩy lên
    // hỏi mysql xem có user tương ứng không
    $query = "SELECT * FROM user  WHERE username = '$user' and  password = '$pass'";
    $cursor = mysqli_query($connect,$query);
        if(mysqli_num_rows($cursor)>0){
            $object = mysqli_fetch_assoc($cursor);
            $error = "";
            // neu co user trong database
//                echo 'Login access';
            //set 1 session cho server rang user nay da dang nhap
            $id = $object['userID'];
            $sql = "select masp, userID, soluong, TenQuanao, Gia, color, sizes, chuthich, image from giohang a, quanao b WHERE a.userID = $id and a.masp = b.MaQuanAo ";
            $result = mysqli_query($connect, $sql);

            if(mysqli_num_rows($result)>0){
                $giohang = array();
                while ($row = mysqli_fetch_assoc($result)){
                    $giohang[] = $row;
                }
            }
            $_SESSION['userinfo'] = $object;
            $_SESSION['giohang'] = $giohang;
            header("location: /Cart.php");
        }else{
            // neu khong co
            // thong bao lai cho user la ko co tai khoan hop le
            $error = "Wrong username or password, please try again;";
        }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href=" ../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_index1.css">
    <link rel="stylesheet" href="../css/login.css">
    <script type="text/javascript" src="../Jquery/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

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
                        <li role="presentation" class="active"><a href="index.php">Trang chủ</a></li>
                        <li role="presentation"><a href="createaccount.php">Đăng kí tài khoản</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="main">
        <div class="container">
            <div class="form-container" >
                <form action="" method="post">
                    <div>
                        <div id="form-title">Đăng nhập</div>
                        <div>
                            <label>Username:</label>
                            <input type="text" name="username1" size="25" class="form-control" placeholder="username" value=""/><br />
                        </div>
                        <div>
                            <label>Password:</label>
                            <input type="password" name="password1" size="25" class="form-control" placeholder="password" value=""/> <br />
                        </div>
                        <div class="checkbox"><input type="checkbox"> Ghi nhớ đăng nhập</div>
                        <div >
                            <div class="login">
                                <input type="submit" name="login" value="Login" />
                            </div>
                        </div>
                        <?php
                        echo "<i>{$error}</i><br>
                                <a href='#'> Forgot your password ???</a><br>
                                <a href='createaccount.php'> Create new account</a>";
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="footer"> <h1>Footer</h1> </div>
</body>
</html>

