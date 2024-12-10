<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ob_start();
include_once("../model/connectdb.php");
include_once("../model/user.php");
include_once("../model/sanpham.php");
include_once("../model/danhmuc.php");

    include("header.php");


    $sphome1=getall_sp(49);
   
    include("sp.php");
    include("footer.php");
?>

