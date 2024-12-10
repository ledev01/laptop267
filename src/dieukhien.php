<?php
session_start();
ob_start();
if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
include("../model/connectdb.php");
include("../model/user.php");
include("../model/sanpham.php");
include("../model/danhmuc.php");
include("../model/donhang.php");

include("header.php");


if (isset($_GET['act'])) {
    switch ($_GET['act']){
        case 'thanhtoan':
            if((isset($_POST['thanhtoan']))&&($_POST['thanhtoan'])){
                //laydulieu
                $tongdonhang=$_POST['tongdonhang'];
                $hoten=$_POST['hoten'];
                $address=$_POST['address'];
                $email=$_POST['email'];
                $tel=$_POST['tel'];
                $pttt=$_POST['pttt'];
                $madh="CRAIN267".rand(0,999999);
                //taodonhang
                $iddh=taodonhang($madh,$tongdonhang,$hoten,$address,$email,$tel,$pttt);
                $_SESSION['iddh']=$iddh;
                if(isset($_SESSION['giohang'])&&(count($_SESSION['giohang'])>0)){
                    foreach($_SESSION['giohang'] as $item){
                        addtocart($iddh,$item[0],$item[1],$item[2],$item[3],$item[4]);
                    }
                }
                unset($_SESSION['giohang']);
            }
            include("donhang.php");
            break;
    }
}
include("footer.php");

?>