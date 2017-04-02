<?php
    include_once "connect.php";
    $iduser = $_SESSION['userinfo']['userID'];
    $sql = "select * from giohang where userID = $iduser ";
    $query = mysqli_query($connect, $sql);
    $result = mysqli_fetch_assoc($query);

?>