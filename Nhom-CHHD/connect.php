<?php
/**
 * Created by PhpStorm.
 * User: VIETTHANG_COMPUTER
 * Date: 20/02/2017
 * Time: 1:58 PM
 */
session_start();
$dbhost ="localhost";
$dbuser = "root";
$dbpass = "cuong123";
$connect = mysqli_connect($dbhost, $dbuser, $dbpass, "quanaonam.com");
if(!$connect){
    echo "Khong the ket noi den Co So Du Lieu";
}
?>