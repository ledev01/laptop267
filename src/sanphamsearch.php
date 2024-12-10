<?php

include_once("./chat.php");
include_once("./logocart.php");
include_once("./banner.php");

include_once("../model/connectdb.php");
include_once("../model/user.php");
include_once("../model/sanpham.php");
include_once("../model/danhmuc.php");




    // $sphome4=getonesp(39);
    $sphome4 = timkiemsp($kyw, $id);
   
    include("spsearch.php");

?>

