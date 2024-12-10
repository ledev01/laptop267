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


    $sphome2=getall_sp(54);
  
   
    include("pk.php");
    include("footer.php");
?>

