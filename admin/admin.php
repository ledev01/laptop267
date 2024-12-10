<link rel="stylesheet" href="admin.css">
<title>Trang admin</title>


<?php
    session_start();
    ob_start();
    // var_dump($_SESSION['role']);
    if(isset($_SESSION['role']) && ($_SESSION['role'] === 1)){

    include("../model/connectdb.php");
    include("../model/danhmuc.php");
    include("../model/sanpham.php");
    include("../model/taikhoan.php");
    include("../model/donhang.php");
  
    

    include("header.php");  
    if(isset($_GET['act'])){
       switch ($_GET['act']) {




        case 'danhmuc':
            $kq=getall_dm();
            include("danhmuc.php");  # code...
            break;
        case 'adddm':
            if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                $tendm=$_POST['tendm'];
                themdm($tendm);
            }
            $kq=getall_dm();
            include("danhmuc.php");  # code...
            break;
        case 'deldm':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                deldm($id);
            }
            $kq=getall_dm();
            include("danhmuc.php");  # code..
            break;
        case 'updatedmform':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                $kqone=getonedm($id);
                $kq=getall_dm();
                include("updatedmform.php");  # code...
            }
            if(isset($_POST['id'])){
                $id=$_POST['id'];
                $tendm=$_POST['tendm'];
                updatedm($id,$tendm);
                $kq=getall_dm();
                include("danhmuc.php");  # code...
            }
            break;  
            //case danh mục 




        case 'sanpham':
            $dsdm=getall_dm();
            $kq=getall_sp();
            include("sanpham.php");  # code...
            break;

            case 'addsp':
                if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                    // Retrieve form inputs
                    $iddm = $_POST['iddm'] ;
                    
                    $tensp = $_POST['tensp'] ;
                    $gia = $_POST['gia'] ;
                    $mieuta = $_POST['mieuta'] ;
                    $chuthich = $_POST['chuthich'] ;

                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);
                    $img=$target_file;
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                    }
                    if($uploadOk==1){
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                    themsp($iddm, $tensp, $img, $gia, $mieuta,$chuthich);
                    }
                }
                $dsdm=getall_dm();
                $kq = getall_sp();
                include("sanpham.php");  # code...
                break; 
            case 'delsp':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    delsp($id);
                }
                $kq=getall_sp();
                include("sanpham.php");  # code..
                break; 

            case 'updatespform':
                $dsdm=getall_dm();
                if (isset($_GET['id'])&&($_GET['id']>0)) {
                    //$id = $_GET['id'];
                    $kqone = getonesp($_GET['id']);
                }
                    $kq = getall_sp();
                    include("updatespform.php");
                    break;
            case 'update_sp':
                    $dsdm=getall_dm();
                    if (isset($_POST['capnhat'])&&($_POST['capnhat'])) {
                        //$capnhat = $_GET['capnhat'];
                        $id = $_POST['id'];
                        $iddm =  $_POST['iddm'] ;
                        $tensp =  $_POST['tensp'] ;
                        $gia = $_POST['gia'] ;
                        $mieuta = $_POST['mieuta'] ;
                        $chuthich = $_POST['chuthich'] ;
                        if($_FILES["img"]["name"]!=""){
                            $target_dir = "../uploads/";
                            $target_file = $target_dir . basename($_FILES["img"]["name"]);
                            $img=$target_file;
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                            // Allow certain file formats
                            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif" ) {
                            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }
                            if($uploadOk==1){
                               move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                               //themsp($iddm, $tensp, $img, $gia, $mieuta,$chuthich);
                            }
                        }else{
                            $img="";
                        }
                        updatesp($id, $iddm, $tensp, $img, $gia, $mieuta, $chuthich);
                    }
                        $kq = getall_sp();
                        include("sanpham.php");
                        break;    
            //case sản phẩm




        case 'taikhoan':
            $kq=getall_tk();
            include("taikhoan.php");  # code...
            break;
        case 'addtk':
            if (isset($_POST['themmoi']) && $_POST['themmoi']) {
                // Retrieve form inputs
                $phone = $_POST['phone'] ;
                $adress = $_POST['adress'] ;
                $username = $_POST['username'] ;
                $password = $_POST['password'] ;
                $repassword = $_POST['repassword'] ;
                $role = $_POST['role'] ;
                themtk($phone, $adress, $username, $password, $repassword,$role);
            }
            $kq = getall_tk();
            include("taikhoan.php");  # code...
            break; 
        case 'deltk':
            if(isset($_GET['id'])){
                $id=$_GET['id'];
                deltk($id);
            }
            $kq=getall_tk();
            include("taikhoan.php");  # code..
            break;  
        case 'updatetkform':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $kqone = getonetk($id);
                $kq = getall_tk();
                include("updatetkform.php");
            }
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $phone =  $_POST['phone'] ;
                $adress =  $_POST['adress'] ;
                $username =  $_POST['username'] ;
                $password = $_POST['password'] ;
                $repassword = $_POST['repassword'] ;
                $role = $_POST['role'] ;
                updatetk($id, $phone, $adress, $username, $password,$repassword,$role);
                
                $kq = getall_tk();
                include("taikhoan.php");
            }
            break;
  
        
            //case tài khoản 
            
        case 'donhang':
            case 'deldh':
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    deldh($id);
                }
                $kq=getall_dh();
                include("donhang.php");  # code..
                break;  
        case 'thoat':
            if(isset($_SESSION['role'])) unset($_SESSION['role']);
            header( 'location : dangnhap.php');
            // break;
        default:
            include("home.php"); # code...
            break;
       }
    }else{
    include("home.php");  
    } 


    }else{
        // echo "Bạn không có quyền truy cập trang admin.";
        header('location: dangnhap.php');
        // exit();
    }

   
  
?> 
 
    

