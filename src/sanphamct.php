<link href="./output.css" rel="stylesheet">
<title>Trang sản phẩm chi tiết</title>

<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
   include_once("../model/connectdb.php");
   include_once("../model/user.php");
   include_once("../model/sanpham.php");
   include_once("../model/danhmuc.php"); 

   include("header.php");

   include_once("./chat.php");
   include_once("./logocart.php");
 
 
?>


<?php
   if(isset($_GET['id'])&&($_GET['id']>0)){
    $id=$_GET['id'];
    $kq=getonesp($id);
   }
?>


<?php
       $formatted_price = number_format($kq[0]['gia'], 0, '.', '.');
?>



<!-- Nội dung chính -->

<div class="mt-4 grid max-w-5xl mx-auto">
<form action="index.php?act=addcart" method="post">
    <input type="hidden" name="id" value="<?=$kq[0]['id']?>">
    <input type="hidden" name="tensp" value="<?=$kq[0]['tensp']?>">
    <input type="hidden" name="img" value="<?=$kq[0]['img']?>">
    <input type="hidden" name="gia" value="<?=$kq[0]['gia']?>">
    <input type="hidden" name="mieuta" value="<?=$kq[0]['mieuta']?>">
    <input type="hidden" name="chuthich" value="<?=$kq[0]['chuthich']?>">
    <div class="flex flex-col gap-y-4">
        <div class="uppercase text-2xl font-mono text-red-500"><?=$kq[0]['tensp']?></div>

        <div class="flex flex-row gap-x-12">
            <div class="flex flex-col gap-y-1 w-80 h-[604px]">
                <img class="w-80 h-72 " src="../uploads/<?=$kq[0]['img']?>" alt="">
                <div class="flex flex-row gap-x-2">
                <p class="font-mono text-lg text-red-500 underline">Giá :</p>
                <p class="font-mono text-lg"><?=$formatted_price?></p>
                <p class="font-mono text-lg">vnđ</p>
                </div>
                <p class="font-mono text-lg text-blue-500 underline">Miêu tả sản phẩm</p>
                <p class="font-mono text-base"><?=$kq[0]['mieuta']?></p>
            </div>

            <div class="flex flex-col gap-y-2 w-72 h-[630px]">
                <p class="font-mono text-lg text-blue-500 underline">Thông số sản phẩm</p>
                <div class="w-72 rounded-xl border-2 border-orange-400 px-2 pt-2 flex flex-grow">
              	
                <p class="font-mono text-base">
                 <?= nl2br(str_replace('-', '<br style="margin-bottom: 5px;">-', $kq[0]['chuthich'])) ?>
                </p>
                </div>

                <div class="flex flex-row gap-x-1">

                <div class="flex items-center justify-center flex-grow">
                <div class="flex flex-row border border-orange-400 rounded-md p-1 h-auto w-[170px] gap-x-1">
                     <p class="font-mono text-lg text-blue-500">Số lượng:</p>
                     <input type="number" value="1" min="1" max="10" required="" name="sl">
                </div>
                </div>                


                <div class="flex flex-col items-center justify-center gap-y-4">

                    <!-- Nút "ADD Cart" vẫn giữ như cũ -->
                    <!-- <input type="submit" name="addtocart" value="ADD Cart" class="cursor-pointer w-28 h-10 flex items-center justify-center rounded-2xl bg-custom-orange hover:bg-customhover-orange hover:scale-95 transition-transform duration-300 text-white font-mono text-sm add-to-cart-button"> -->

                    <!-- Nút "Mua" sẽ thêm vào giỏ và chuyển hướng -->
                    <input type="submit" name="buy" value="Mua" class="w-28 h-10 flex items-center justify-center rounded-2xl bg-custom-orange hover:bg-customhover-orange hover:scale-95 transition-transform duration-300 text-white font-mono text-sm add-to-cart-button">

                </div>
                </div>
            </div>
            <div class="h-[630px] w-[304px] rounded-xl flex items-center justify-center">
                <div class="flex flex-col gap-y-10">
                    <div class="w-72 h-72 border-2 border-orange-400 rounded-xl">
                        <div class="flex flex-col gap-y-2 px-2 pt-2">
                            <h1 class="text-lg font-semibold text-orange-500">Thông tin bảo hành</h1>
                            <p>Bảo hành 12 tháng laptop267</p>
                            <p class="uppercase text-sm">Miễn phí giao hàng</p>
                            <p>- Với đơn hàng < 4.000.000 đồng: Miễn phí giao hàng cho đơn hàng trong vòng 5km tính từ cửa hàng Laptop267 gần nhất</p>
                            <p>- Với đơn hàng > 4.000.000 đồng: Miễn phí giao hàng (khách hàng chịu phí bảo hiểm hàng hóa nếu có)</p>
                        </div>
                    </div>

                    <div class="w-72 h-72 border-2 border-orange-400 rounded-xl">
                        <div class="flex flex-col gap-y-2 px-2 pt-2">
                            <h1 class="text-lg font-semibold text-orange-500">Yên tâm mua hàng</h1>
                            <p>- Hệ thống cửa hàng toàn quốc</p>
                            <p>- Đại lý phân phối chính hãng</p>
                            <p>- Giá luôn tốt nhất</p>
                            <p>- Hỗ trợ trả góp lãi suất thấp</p>
                            <p>- Bảo hành dài, hậu mãi chu đáo</p>
                            <p>- Miễn phí giao hàng toàn quốc</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</div>


<?php
    include("footer.php");
?>


<script>

document.addEventListener('DOMContentLoaded', function () {
    // Kiểm tra xem người dùng đã đăng nhập hay chưa thông qua session PHP
    const isLoggedIn = <?php echo isset($_SESSION['username']) && $_SESSION['username'] != '' ? 'true' : 'false'; ?>;
    
    // Hàm hiển thị thông báo "+1" sau khi thêm sản phẩm vào giỏ hàng
    function showNotification() {
        const notification = document.createElement('div');
        notification.classList.add('fixed', 'top-1/2', 'mt-44', 'right-10', 'transform', '-translate-y-1/2', 'w-6', 'bg-red-500', 'rounded-full', 'flex', 'items-center', 'justify-center');
        notification.innerHTML = '<p class="text-white font-mono">+1</p>';
        document.body.appendChild(notification);
        setTimeout(function() {
            notification.remove();
        }, 1500);
    }
    

    // Thêm sự kiện vào các nút "Add Cart"
    document.querySelectorAll('.add-to-cart-button').forEach(function(button) {
        button.addEventListener('click', function(event) {
            // Ngừng gửi form nếu người dùng chưa đăng nhập
            if (!isLoggedIn) {
                event.preventDefault(); // Ngừng hành động gửi form
                alert('Vui lòng đăng nhập để thêm và mua sản phẩm!');
                window.location.href = 'dangnhap.php'; // Chuyển hướng đến trang đăng nhập
                return;
            }

            // Nếu người dùng đã đăng nhập, thực hiện thêm sản phẩm vào giỏ hàng mà không chuyển trang
            event.preventDefault(); // Ngừng gửi form
            showNotification(); // Hiển thị thông báo "+1"
            
            // Lấy thông tin sản phẩm từ các input ẩn trong form
            const form = button.closest('form');
            const formData = new FormData(form);

            // Gửi dữ liệu vào giỏ hàng (có thể sử dụng AJAX ở đây, tùy theo nhu cầu)
            fetch('index.php?act=addcart', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Sản phẩm đã được thêm vào giỏ hàng!');
                    window.location.href = 'cart.php';
                } else {
                    alert('Đã có lỗi khi thêm sản phẩm vào giỏ hàng.');
                }
            })
            .catch(error => {
                console.error('Lỗi:', error);
            });
        });
    });
});

</script>
