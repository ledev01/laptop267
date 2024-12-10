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
        case 'sanpham':
            // Kiểm tra nếu có gửi dữ liệu từ form tìm kiếm (kyw) và id (id)
            if (isset($_POST['kyw']) && $_POST['kyw'] !== "") {
                $kyw = $_POST['kyw'];  // Lấy từ khóa tìm kiếm từ form
            } else {
                $kyw = "";  // Nếu không có từ khóa, đặt thành chuỗi rỗng
            }
            
            // Kiểm tra nếu có gửi id từ form (id) qua GET, nếu không sẽ là 0
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
            } else {
                $id = 0;  // Nếu không có id, gán giá trị mặc định là 0
            }
            
            // Gọi hàm tìm kiếm sản phẩm, tìm kiếm theo từ khóa và id
            $sphome4 = timkiemsp($kyw, $id);
            
            // Bao gồm file view để hiển thị kết quả tìm kiếm
            include("sanphamsearch.php");
            break;
    }
}
include("footer.php");

?>