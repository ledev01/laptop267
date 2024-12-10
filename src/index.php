<?php
session_start();
ob_start();



if (isset($_POST['addtocart'])) {
    // Kiểm tra nếu người dùng đã đăng nhập
    if (!isset($_SESSION['username']) || $_SESSION['username'] == "") {
        // Người dùng chưa đăng nhập, trả về lỗi yêu cầu đăng nhập
        echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.']);
        exit();
    }

    // Tiến hành thêm sản phẩm vào giỏ hàng nếu đã đăng nhập
    $productId = $_POST['id'];
    $productName = $_POST['tensp'];
    $productPrice = $_POST['gia'];
    $productImg = $_POST['img'];

    // Logic thêm sản phẩm vào giỏ hàng ở đây (chẳng hạn lưu vào session hoặc database)

    echo json_encode(['success' => true, 'message' => 'Sản phẩm đã được thêm vào giỏ hàng!']);
}



if (isset($_GET['act']) && $_GET['act'] == 'addcart') {
    // Kiểm tra xem dữ liệu đã được gửi qua POST chưa
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kiểm tra xem các dữ liệu trong form có tồn tại hay không
        if (isset($_POST['id'], $_POST['tensp'], $_POST['img'], $_POST['gia'])) {
            $id = $_POST['id'];
            $tensp = $_POST['tensp'];
            $img = $_POST['img'];
            $gia = $_POST['gia'];
            $sl = isset($_POST['sl']) ? $_POST['sl'] : 1;  // Lấy số lượng từ form

            // Kiểm tra giỏ hàng trong session
            if (!isset($_SESSION['giohang'])) {
                $_SESSION['giohang'] = [];
            }

            // Kiểm tra xem sản phẩm đã có trong giỏ chưa
            $found = false;
            foreach ($_SESSION['giohang'] as &$item) {
                if ($item[0] == $id) {
                    $item[4] += $sl; // Tăng số lượng nếu sản phẩm đã có trong giỏ
                    $found = true;
                    break;
                }
            }

            // Nếu sản phẩm chưa có trong giỏ, thêm mới
            if (!$found) {
                $_SESSION['giohang'][] = [$id, $tensp, $img, $gia, $sl];
            }

            // Nếu nhấn nút "Mua", chuyển hướng đến trang giỏ hàng
            if (isset($_POST['buy'])) {
                header("Location: cart.php"); // Chuyển hướng đến trang giỏ hàng
                exit; // Dừng thực thi sau khi chuyển hướng
            }

            // Trả về kết quả dưới dạng JSON nếu không chuyển hướng
            echo json_encode(['success' => true]);
        } else {
            // Trả về kết quả lỗi nếu dữ liệu không hợp lệ
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không đầy đủ']);
        }
        exit;
    } 
}



if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
include("../model/connectdb.php");
include("../model/user.php");
include("../model/sanpham.php");
include("../model/danhmuc.php");
include("../model/donhang.php");


    include("header.php");
    if (isset($_GET['act'])) {
    switch ($_GET['act']){
        
        
        case 'dangnhap':
            if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                $username=$_POST['username'];
                $password=$_POST['password'];
                $kq=getuserinfor($username,$password);
                $role=$kq[0]['role'];
                if($kq[0]['role']===1){
                    $_SESSION['role']=$role;
                    header('location: ../admin/admin.php');
                }else{
                  $_SESSION['role']=$role;
                  $_SESSION['idusername']=$kq[0]['id'];
                  $_SESSION['username']=$kq[0]['username'];
                  header('location: index.php');
                  break;
                }
            }

        case 'thoat':
            unset($_SESSION['role']);
            unset($_SESSION['iduser']);
            unset($_SESSION['username']);
            header('location:index.php');
            break;

        case 'dangki':
            include("dangki.php");
            break;

        case 'addcart':
            if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                $id=$_POST['id'];
                $tensp=$_POST['tensp'];
                $img=$_POST['img'];
                $gia=$_POST['gia'];
                if(isset($_POST['sl'])&&($_POST['sl']>0)){
                    $sl=$_POST['sl'];
                }else{
                    $sl=1;
                }
                $fg=0;
                $i=0;
                //kiem tra san pham lap lai hay khong
                //neu lap lai thi thay vi tang sp thi tang sl sp do
                foreach ($_SESSION['giohang'] as $item) {
                    if($item[1]===$tensp){
                        $slnew=$sl+$item[4];
                        $_SESSION['giohang'][$i][4]=$slnew;
                        $fg=1;
                        break;
                    }
                    $i++;
                }
                if($fg==0){
                   $item=array($id,$tensp,$img,$gia,$sl);
                   $_SESSION['giohang'][]=$item;
                }
            }
            break;



        case 'delcart':
            if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            header('location: cart.php');
            break;

        case 'del1cart':
                if (isset($_GET['id'])) {
                    $id = $_GET['id']; // Lấy ID sản phẩm từ URL
                    
                    // Kiểm tra xem giỏ hàng có tồn tại trong session không
                    if (isset($_SESSION['giohang'])) {
                        // Duyệt qua giỏ hàng và tìm sản phẩm có ID tương ứng
                        foreach ($_SESSION['giohang'] as $key => $item) {
                            if ($item[0] == $id) { // Nếu ID sản phẩm trùng khớp
                                unset($_SESSION['giohang'][$key]); // Xóa sản phẩm khỏi giỏ hàng
                                $_SESSION['giohang'] = array_values($_SESSION['giohang']); // Đảm bảo array không có các chỉ số không liên tiếp
                                break; // Thoát khỏi vòng lặp khi tìm thấy sản phẩm cần xóa
                            }
                        }
                    }
                }
            header('location: cart.php'); // Quay lại trang giỏ hàng
            break;
            
        case 'cart':
            include('cart.php');
            break;

            
          
    }
}


    $sphome1 = getall_sp(49); 
    $sphome2 = getall_sp(54);
    $sphome3 = getall_sp(56);

  
    //san pham hien thi o day
    include("body.php");
    include("footer.php");

?>


