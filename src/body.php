<?php
  include_once("./chat.php");
  include_once("./logocart.php");
  include_once("./banner.php");
?>
<link href="./output.css" rel="stylesheet">
<title>Trang chủ</title>

<body>


<script>
// Hàm hiển thị thông báo
function showNotification(event) {
    // Ngừng hành động mặc định của form (ngừng gửi form và reload trang)
    // event.preventDefault();
    
    // Tạo thông báo
    const notification = document.createElement('div');
    notification.classList.add('fixed', 'top-1/2', 'mt-44', 'right-10', 'transform', '-translate-y-1/2', 'w-6', 'bg-red-500', 'rounded-full', 'flex', 'items-center', 'justify-center');
    notification.innerHTML = '<p class="text-white font-mono ">+1</p>';
    
    // Thêm thông báo vào trang
    document.body.appendChild(notification);
    
    // Sau 1,5 giây thì ẩn thông báo và gửi form
    setTimeout(function() {
        notification.remove();  // Ẩn thông báo sau 2,5 giây
        
        // Gửi form sau khi thông báo biến mất
        event.target.form.submit();  // Gửi form mà không reload trang
    }, 1500);
}

// Chỉ thêm sự kiện sau khi DOM đã được tải xong
document.addEventListener('DOMContentLoaded', function() {
    // Lắng nghe sự kiện click trên tất cả input[type="submit"] có name="addtocart"
    document.querySelectorAll('input[name="addtocart"]').forEach(function(button) {
        button.addEventListener('click', showNotification);
    });
});
</script>


<div class="">

      
       <div class="">
        <div class=" grid lg:grid-cols-10 sm:grid-cols-5 max-w-5xl mx-auto">
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">dell</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">hp</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">lenovo</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">asus</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">acer</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">microsoft</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">huawei</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">gigabyte</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">samsung</p>
          <p class="mt-7 w-24 h-11 border border-orange-500 text-black rounded-md font-bold flex items-center justify-center hover:bg-custom-orange hover:text-white uppercase">lg</p>
        </div>
        <!-- các hãng laptop -->



        <div class="flex relative mx-auto w-[730px] h-[358px] mt-16 mb-6 z-0">
          <div class="overflow-hidden rounded-lg">
            <div id="carousel" class="flex transition-transform duration-500">
              <img src="https://laptop88.vn/media/banner/08_Aug645ad1aec36837bf5ae441224d2131bb.jpg" alt="Image 1" class="w-full" />
              <img src="https://laptop88.vn/media/banner/747x350-DELL-INSPIRON-PLUS-7430.jpg" alt="Image 2" class="w-full" />
              <img src="https://laptop88.vn/media/banner/747x350-Banner-hng-2.jpg" alt="Image 3" class="w-full" />
              <img src="https://laptop88.vn/media/banner/747x350-Banner-hng-1.jpg" alt="Image 1" class="w-full" />
              <img src="https://laptop88.vn/media/banner/BACKUP-HP-VICTUS-15-747x350.jpg" alt="Image 2" class="w-full" />
              <img src="https://laptop88.vn/media/banner/747x350-Lenovo-LOQ-sua-gia.jpg" alt="Image 3" class="w-full" />
              <img src="https://laptop88.vn/media/banner/slim3i7-757x350.jpg" alt="Image 1" class="w-full" />
              <img src="https://laptop88.vn/media/banner/09_Juleade1b3c2cae70f8f7f08d65531f5552.jpg" alt="Image 2" class="w-full" />
              <img src="https://laptop88.vn/media/banner/21_Jun9f9395ef66fb1722236a26c4efc912c8.jpg" alt="Image 3" class="w-full" />
              <img src="https://laptop88.vn/media/banner/thinkbook14g6757x350.jpg" alt="Image 3" class="w-full" />
            </div>
          </div>
          
          <button id="prev" class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-gray-50 text-gray-600 text-3xl p-2 rounded-full hover:bg-transparent hover:text-gray-900 ">
            &#8592; <!-- Mũi tên trái -->
          </button>
          <button id="next" class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-gray-50 text-gray-600 text-3xl p-2 rounded-full hover:bg-transparent hover:text-gray-900">
            &#8594; <!-- Mũi tên phải -->
          </button>
        </div>
        
        <script>
          const carousel = document.getElementById('carousel');
          const images = carousel.children;
          let index = 0;
        
          // Hàm chuyển đổi ảnh
          function updateCarousel() {
            carousel.style.transform = `translateX(-${index * 100}%)`;
          }
        
          document.getElementById('next').onclick = function() {
            index = (index + 1) % images.length;
            updateCarousel();
          };
        
          document.getElementById('prev').onclick = function() {
            index = (index - 1 + images.length) % images.length;
            updateCarousel();
          };
        
          // Tự động chuyển ảnh sau mỗi 5 giây
          setInterval(() => {
            index = (index + 1) % images.length;
            updateCarousel();
          }, 5000);
        </script>
      



        <div class="grid grid-cols-3 max-w-5xl mx-auto gap-x-4">
          <img class="" src="https://laptop88.vn/media/banner/31_Jul34c3f1c53320e2f51d2f8832b6b46e4c.jpg" alt="">
          <img class="" src="https://laptop88.vn/media/banner/31_Julc74c45af4e38f562a364e61fb5e6274c.jpg" alt="">
          <img class="" src="https://laptop88.vn/media/banner/31_Jul7558d20659a7ef907d2818eeb7aa849e.jpg" alt="">        
        </div>

      
  </div>

  

</body>

  <script>
      const menuToggle = document.getElementById('menu-toggle');
      const menu = document.getElementById('menu');

      menuToggle.addEventListener('click', () => {
          menu.classList.toggle('hidden');
      });
  </script>
  <!-- phần js cho thanh menu chạy xuống  -->
</body>


<!-- Sản phẩm nổi bật -->
<h1 class="pl-64 text-3xl font-mono text-gray-700 underline mt-16">Sản phẩm giảm giá</h1>
<div class="grid grid-cols-4 max-w-5xl mx-auto gap-x-12 gap-y-10 mt-4">
  <?php
  foreach ($sphome3 as $sp) {
    $mieuta_short = mb_strlen($sp['mieuta'], 'UTF-8') > 120 ? mb_substr($sp['mieuta'], 0, 120, 'UTF-8') . '...' : $sp['mieuta'];
    $formatted_price = number_format($sp['gia'], 0, '.', '.');
    echo '
    <form action="index.php?act=addcart" method="post" class="product-form">
    <div class="relative hover:scale-105 transition-transform duration-300 w-56 h-[470px] bg-blue-100 rounded-md shadow-xl flex flex-col">
      <div class="flex flex-col gap-y-2 flex-grow">
        <a class="relative" href="sanphamct.php?id='.$sp['id'].'">
            <img class="w-56 h-52 cursor-pointer" src="../uploads/'.$sp['img'].'" alt="">
            <img class="w-14 h-auto absolute right-2 top-2" src="https://cdn-icons-png.flaticon.com/128/791/791968.png">
        </a>
        <a href="sanphamct.php?id='.$sp['id'].'">
          <div class="font-bold flex justify-center uppercase cursor-pointer px-2">'.$sp['tensp'].'</div>
        </a>
        <div class="px-2 text-sm">'.$mieuta_short.'</div>
      </div>
         <div class="left-1/2 transform -translate-x-1/2 absolute mt-[360px]">
                 <img class="h-16 w-auto" src="https://cdn-icons-png.flaticon.com/128/992/992000.png">
               </div>
      <div class="flex flex-row gap-x-2">
        <a href="sanphamct.php?id='.$sp['id'].'">
          <div class="ml-2 flex-grow rounded-xl flex justify-center items-center cursor-pointer bg-custom-orange hover:bg-customhover-orange w-28 h-10 mx-auto mb-4">
            <div class="font-mono text-white text-center">'.$formatted_price.'&#160;đ</div>
          </div>
        </a>
        <input class="px-2 mr-2 h-10 bg-custom-orange hover:bg-customhover-orange rounded-xl flex items-center justify-center text-white font-mono cursor-pointer add-to-cart-button" type="button" value="ADD Cart" data-product-id="'.$sp['id'].'" data-product-name="'.$sp['tensp'].'" data-product-price="'.$sp['gia'].'" data-product-img="'.$sp['img'].'">
      </div>
    </div>
    </form>
    ';
  }
  ?>
</div>


<!-- Sản phẩm nổi bật -->
<h1 class="pl-64 text-3xl font-mono text-gray-700 underline mt-16">Sản phẩm nổi bật</h1>
<div class="grid grid-cols-4 max-w-5xl mx-auto gap-x-12 gap-y-10 mt-4">
  <?php
  foreach ($sphome1 as $sp) {
    $mieuta_short = mb_strlen($sp['mieuta'], 'UTF-8') > 120 ? mb_substr($sp['mieuta'], 0, 120, 'UTF-8') . '...' : $sp['mieuta'];
    $formatted_price = number_format($sp['gia'], 0, '.', '.');
    echo '
    <form action="index.php?act=addcart" method="post" class="product-form">
    <div class="relative hover:scale-105 transition-transform duration-300 w-56 h-[470px] bg-violet-100 rounded-md shadow-xl flex flex-col">
      <div class="flex flex-col gap-y-2 flex-grow">
        <a href="sanphamct.php?id='.$sp['id'].'">
          <img class="w-56 h-52 cursor-pointer" src="../uploads/'.$sp['img'].'" alt="">
        </a>
        <a href="sanphamct.php?id='.$sp['id'].'">
          <div class="font-bold flex justify-center uppercase cursor-pointer px-2">'.$sp['tensp'].'</div>
        </a>
        <div class="px-2 text-sm">'.$mieuta_short.'</div>
      </div>
          <div class="left-1/2 transform -translate-x-1/2 absolute mt-[360px]">
                 <img class="h-16 w-auto" src="https://cdn-icons-png.flaticon.com/128/992/992000.png">
               </div>
      <div class="flex flex-row gap-x-2">
        <a href="sanphamct.php?id='.$sp['id'].'">
          <div class="ml-2 flex-grow rounded-xl flex justify-center items-center cursor-pointer bg-custom-orange hover:bg-customhover-orange w-28 h-10 mx-auto mb-4">
            <div class="font-mono text-white text-center">'.$formatted_price.'&#160;đ</div>
          </div>
        </a>
        <input class="px-2 mr-2 h-10 bg-custom-orange hover:bg-customhover-orange rounded-xl flex items-center justify-center text-white font-mono cursor-pointer add-to-cart-button" type="button" value="ADD Cart" data-product-id="'.$sp['id'].'" data-product-name="'.$sp['tensp'].'" data-product-price="'.$sp['gia'].'" data-product-img="'.$sp['img'].'">
      </div>
    </div>
    </form>
    ';
  }
  ?>
</div>

<!-- Phụ kiện nổi bật -->
<h1 class="pl-64 text-3xl font-mono text-gray-700 underline mt-16">Phụ kiện nổi bật</h1>
<div class="grid grid-cols-4 max-w-5xl mx-auto gap-x-12 gap-y-10 mt-4">
  <?php
  foreach ($sphome2 as $sp) {
    $mieuta_short = mb_strlen($sp['mieuta'], 'UTF-8') > 120 ? mb_substr($sp['mieuta'], 0, 120, 'UTF-8') . '...' : $sp['mieuta'];
    $formatted_price = number_format($sp['gia'], 0, '.', '.');
    echo '
    <form action="index.php?act=addcart" method="post" class="product-form">
    <div class="relative hover:scale-105 transition-transform duration-300 w-56 h-[470px] bg-yellow-100 rounded-md shadow-xl flex flex-col">
      <div class="flex flex-col gap-y-2 flex-grow">
        <a href="sanphamct.php?id='.$sp['id'].'">
          <img class="w-56 h-52 cursor-pointer" src="../uploads/'.$sp['img'].'" alt="">
        </a>
        <a href="sanphamct.php?id='.$sp['id'].'">
          <div class="font-bold flex justify-center uppercase cursor-pointer px-2">'.$sp['tensp'].'</div>
        </a>
        <div class="px-2 text-sm">'.$mieuta_short.'</div>
      </div>
           <div class="left-1/2 transform -translate-x-1/2 absolute mt-[360px]">
                 <img class="h-16 w-auto" src="https://cdn-icons-png.flaticon.com/128/992/992000.png">
               </div>
      <div class="flex flex-row gap-x-2">
        <a href="sanphamct.php?id='.$sp['id'].'">
          <div class="ml-2 flex-grow rounded-xl flex justify-center items-center cursor-pointer bg-custom-orange hover:bg-customhover-orange w-28 h-10 mx-auto mb-4">
            <div class="font-mono text-white text-center">'.$formatted_price.'&#160;đ</div>
          </div>
        </a>
        <input class="px-2 mr-2 h-10 bg-custom-orange hover:bg-customhover-orange rounded-xl flex items-center justify-center text-white font-mono cursor-pointer add-to-cart-button" type="button" value="ADD Cart" data-product-id="'.$sp['id'].'" data-product-name="'.$sp['tensp'].'" data-product-price="'.$sp['gia'].'" data-product-img="'.$sp['img'].'">
      </div>
    </div>
    </form>
    ';
  }
  ?>
</div>

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




        
<div class=" mt-32 flex justify-center text-orange-500 font-extrabold text-xl">Tại sao bạn nên gửi gắm niềm tin tại Laptop267Shop</div>
      <!-- thanh tittle giữa trang  -->

   
        <div class=" grid grid-cols-4 max-w-5xl mx-auto mt-7 mb-10 gap-x-12">

          <div class=" w-56 h-96 rounded-md bg-white shadow-2xl hover:shadow-none duration-300">
          <div class="flex flex-col items-center gap-y-3 ">
          <img class=" w-28 h-auto pt-2" src="https://order247.maugiaodien.com/wp-content/uploads/2020/05/i2.png" alt="">  
          <p class="flex items-center text-center  text-gray-600 font-semibold uppercase px-3">đặt hàng và vận chuyển nhanh chóng</p>
          <p class="text-gray-500 text-center px-3">Yêu cầu đặt hàng của quý khách được xử lý nhanh chóng. Thời gian từ lúc xác nhận đơn hàng đến lúc lên đơn và vận chuyển trong vòng 6h.</p>
          </div>
          </div>

          <div class=" w-56 h-96 rounded-md bg-white shadow-2xl hover:shadow-none duration-300">
            <div class="flex flex-col items-center gap-y-3 ">
            <img class=" w-28 h-auto pt-2" src="https://order247.maugiaodien.com/wp-content/uploads/2020/05/icon-yeu-cau-phia-doi-tac-03.png" alt="">  
            <p class="flex items-center text-center  text-gray-600 font-semibold uppercase px-3">tiết kiệm chi phí</p>
            <p class="text-gray-500 text-center px-3">Laptop267Shop luôn có chương trình ưu đãi chiết khấu cao đối với các khách hàng thân thiết. Sản phẩm có giá thành thấp hơn giá thị trường 4-5%.</p>
            </div>
          </div>

          <div class=" w-56 h-96 rounded-md bg-white shadow-2xl hover:shadow-none duration-300">
              <div class="flex flex-col items-center gap-y-3 ">
              <img class=" w-28 h-auto pt-2" src="https://order247.maugiaodien.com/wp-content/uploads/2020/05/i7.png" alt="">  
              <p class="flex items-center text-center  text-gray-600 font-semibold uppercase px-3">chất lượng hàng đầu</p>
              <p class="text-gray-500 text-center px-3">Sản phẩm là những thương hiệu hàng đầu được thông qua kiểm duyệt quốc tế về chất lượng. Tự tin mang đến cho khách hàng những sản phẩm có chất lượng tốt nhất.</p>
              </div>
          </div>

          <div class=" w-56 h-96 rounded-md bg-white shadow-2xl hover:shadow-none duration-300">
                <div class="flex flex-col items-center gap-y-3 ">
                <img class=" w-28 h-auto pt-2" src="https://order247.maugiaodien.com/wp-content/uploads/2020/05/i9.png" alt="">  
                <p class="flex items-center text-center  text-gray-600 font-semibold uppercase px-3">tư vấn khách hàng 24/7</p>
                <p class="text-gray-500 text-center px-3">Đội ngũ nhân viên năng động, tràn đầy nhiệt huyết sẽ mang đến cho bạn những dịch vụ hoàn thiện nhất bởi thái độ và trách nhiệm chuyên nghiệp nhất.</p>
                </div>
          </div>
          

      
        </div>
        </div>
      

