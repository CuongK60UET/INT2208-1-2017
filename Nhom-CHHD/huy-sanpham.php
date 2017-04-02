<?php
    include_once "connect.php";
    $object = $_SESSION['userinfo'];
    $id = $_POST['masp'];
    foreach ($_SESSION['giohang'] as $key => $gh){
        if($gh['masp'] == $id){
            unset($_SESSION['giohang'][$key]);
        }
    }
    print_r($_SESSION['giohang']);
?>