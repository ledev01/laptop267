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


    $sphome3=getall_sp(56);
  
   
    include("gg.php");
    include("footer.php");
?>

