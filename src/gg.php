<?php
  include_once("./chat.php");
  include_once("./logocart.php");
  include_once("./banner.php");
?>
<link href="./output.css" rel="stylesheet">
<title>Trang sản phẩm giảm giá</title>



<script>
// Hàm hiển thị thông báo "+1"
function showNotification() {
    // Tạo thông báo
    const notification = document.createElement('div');
    notification.classList.add('fixed', 'top-1/2', 'mt-44', 'right-10', 'transform', '-translate-y-1/2', 'w-6', 'bg-red-500', 'rounded-full', 'flex', 'items-center', 'justify-center');
    notification.innerHTML = '<p class="text-white font-mono">+1</p>';

    // Thêm thông báo vào trang
    document.body.appendChild(notification);

    // Sau 1,5 giây thì ẩn thông báo
    setTimeout(function() {
        notification.remove();  // Ẩn thông báo sau 1,5 giây
    }, 1000);
}

// Lắng nghe sự kiện click trên tất cả input[type="submit"] có name="addtocart"
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.add-to-cart-button').forEach(function(button) {
        button.addEventListener('click', function() {
            // Kiểm tra xem người dùng đã đăng nhập chưa
            const isLoggedIn = <?php echo isset($_SESSION['username']) && $_SESSION['username'] != '' ? 'true' : 'false'; ?>;
            
            if (!isLoggedIn) {
                // Nếu chưa đăng nhập, hiển thị thông báo và ngừng hành động
                alert('Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
                window.location.href = 'dangnhap.php'; // Chuyển hướng đến trang đăng nhập
                return; // Dừng lại không gửi yêu cầu AJAX
            }

            // Hiển thị thông báo +1
            showNotification();

            // Lấy dữ liệu sản phẩm
            const productId = this.getAttribute('data-product-id');
            const productName = this.getAttribute('data-product-name');
            const productPrice = this.getAttribute('data-product-price');
            const productImg = this.getAttribute('data-product-img');

            // Gửi yêu cầu AJAX
            const formData = new FormData();
            formData.append('id', productId);
            formData.append('tensp', productName);
            formData.append('gia', productPrice);
            formData.append('img', productImg);
            formData.append('addtocart', 'true');

            fetch('index.php?act=addcart', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message); // Hiển thị thông báo thành công
                } else {
                    alert(data.message); // Hiển thị thông báo lỗi
                }
            })
        });
    });
});
</script>


<!-- Sản phẩm phụ kiện -->
<div class="flex felx-row gap-x-2 mb-4 mt-4 max-w-5xl mx-auto ">
    <a class="font-mono" href="index.php">Laptop267 ></a>
    <p class="font-mono underline text-blue-500">Giảm giá</p>
</div>
<div class="grid grid-cols-4 max-w-5xl mx-auto gap-x-12 gap-y-10">
    <?php
    foreach ($sphome3 as $sp) {
        if (mb_strlen($sp['mieuta'], 'UTF-8') > 120) {
            $mieuta_short = mb_substr($sp['mieuta'], 0, 120, 'UTF-8') . '...';
        } else {
            $mieuta_short = $sp['mieuta'];
        }
        $formatted_price = number_format($sp['gia'], 0, '.', '.');
        echo '
        <div class="relative hover:scale-105 transition-transform duration-300 w-56 h-[470px] bg-blue-100 rounded-md shadow-xl flex flex-col mt-8">
          <div class="flex flex-col gap-y-2 flex-grow">
            <a class="relative" href="sanphamct.php?id='.$sp['id'].'">
            <img class="w-56 h-52 cursor-pointer" src="../uploads/'.$sp['img'].'" alt="">
            <img class="w-14 h-auto absolute right-2 top-2" src="https://cdn-icons-png.flaticon.com/128/791/791968.png">
            </a>

            <a href="sanphamct.php?id='.$sp['id'].'">
            <div class="font-bold flex justify-center uppercase cursor-pointer px-2">'.$sp['tensp'].'</div>
            </a>

            <div class="px-2 text-sm">'.$mieuta_short.'</div>
               <div class="left-1/2 transform -translate-x-1/2 absolute mt-[360px]">
                 <img class="h-16 w-auto" src="https://cdn-icons-png.flaticon.com/128/992/992000.png">
               </div>
          </div>
              <div class="flex flex-row gap-x-2">
                <a href="sanphamct.php?id='.$sp['id'].'">
                <div class="ml-2 flex-grow rounded-xl flex justify-center items-center cursor-pointer bg-custom-orange hover:bg-customhover-orange w-28 h-10 mx-auto mb-4">
                  <div class="font-mono text-white text-center">'.$formatted_price.'&#160;đ</div>
                </div>
                </a>
                <button class="add-to-cart-button px-2 mr-2 h-10 bg-custom-orange hover:bg-customhover-orange rounded-xl flex items-center justify-center text-white font-mono cursor-pointer" data-product-id="'.$sp['id'].'" data-product-name="'.$sp['tensp'].'" data-product-img="'.$sp['img'].'" data-product-price="'.$sp['gia'].'">
                  ADD Cart
                </button>
              </div>
        </div>
        ';
    }
    ?>
</div>
