<?php
    include_once "connect.php";
    $masp = $_POST['ma'];
    $user = $_SESSION['userinfo'];
    $soluong = $_POST['soluong'];
    $ten_sp = $_POST['ten'];
    $gia_sp = $_POST['gia'];
    $color_sp = $_POST['color'];
    $size_sp = $_POST['size'];
    $note_sp = $_POST['chuthich'];
    $image_sp = $_POST['image'];
    $addsp = array(
        'masp' => $masp,
        'userID' => $user['userID'],
        'soluong' => $soluong,
        'TenQuanao' => $ten_sp,
        'Gia' => $gia_sp,
        'color' =>  $color_sp,
        'sizes' =>  $size_sp,
        'chuthich' =>  $note_sp,
        'image' =>  $image_sp
    );
    $run = 0;
    foreach ($_SESSION['giohang'] as $key => $gh){
        if($masp == $gh['masp']){
            $_SESSION['giohang'][$key]['soluong'] = $gh['soluong'] + $soluong;
            $run++;
        }
    };
    if($run == 0){
        $_SESSION['giohang'][] = $addsp;
    }
    print_r($_SESSION['giohang']);
    die;
?>