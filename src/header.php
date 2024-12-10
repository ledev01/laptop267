<link href="./output.css" rel="stylesheet">

<header class="w-full "> 

  <header class="bg-custom-orange h-7">
      <div class="grid grid-cols-2 max-w-5xl mx-auto">
        <p class="flex items-center text-white text-xs font-semibold pt-1">Laptop267shop thế giới laptop</p>
        
        <div class="flex justify-end mr-4">
            <div class="flex flex-row items-center text-white text-xs font-semibold pt-1">
                <div class="cursor-pointer flex flex-row gap-2 mr-4">
                    <img src="" alt="">
                    <p class="text-white">laptop267shop@gmail.com</p>
                </div>

                <div class="h-5 w-0.5 bg-gray-600"></div>
                
                <div class="cursor-pointer flex flex-row gap-2">
                    <img class="w-3 h-3 mt-1 ml-1 font-sans" src="" alt="">
                    <p class="text-white">037.2607982</p>
                </div>
            </div>
        </div>
    </div>
  </header>
  <!-- header infor trên cùng  -->
  

  <header class="bg-custom-orange h-28">
    <div class="grid grid-cols-5 max-w-5xl mx-auto ">
      <div class="flex items-center">
       <a href="index.php">
        <div class="flex items-center pt-4 ml-12">
         <img src="https://cdn-icons-png.flaticon.com/128/825/825561.png" alt="" class="w-20 h-20 "/>
        </div>      
       </a>
      </div>

      <div class="flex flex-row gap-x-2 items-center pt-6">
         <img class="h-14 w-auto flex items-center" src="https://cdn-icons-png.flaticon.com/128/5643/5643764.png" alt="">
          <div class="flex flex-col text-xs ">
           <p class="font-semibold text-white">Đặt hàng nhanh chóng</p>
           <p class="text-white">Xử lí đơn hàng trong 24h</p>
          </div>
      </div>

      <div class="flex flex-row gap-x-2 items-center pt-6">
        <img class="h-14 w-auto flex items-center" src="https://cdn-icons-png.flaticon.com/128/7928/7928539.png" alt="">
        <div class="flex flex-col text-xs ">
          <p class="font-semibold text-white">Hotline: 037.2607982</p>
          <p class="text-white">Tư vấn 24/7 miễn phí</p>
        </div>
     </div>

     <div class="flex flex-row gap-x-2 items-center pt-6">
       <img class="h-14 w-auto flex items-center" src="https://cdn-icons-png.flaticon.com/128/11135/11135818.png" alt="">
        <div class="flex flex-col text-xs ">
         <p class="font-semibold text-white">Giao hàng toàn quốc</p>
         <p class="text-white">Ship COD tại nhà</p>
        </div>
     </div>

    <div class="flex flex-row gap-x-4 pt-14 items-center h-10"> 
      <?php
    if (isset($_SESSION['username']) && ($_SESSION['username'] != "")) {
      echo '<div class="ml-6 flex flex-col gap-y-4">';
      echo '<a href="index.php?act=userinfor">
              <button class="h-8 w-auto border border-2 border-white rounded-xl px-2 py-2 font-serif text-white text-bas font-bold flex items-center">' . $_SESSION['username'] . '</button>
            </a>';
      echo '<a href="index.php?act=thoat">
              <button class="flex items-center border border-1 border-white h-8 rounded-xl cursor-pointer px-2 py-2 text-white text-xs font-bold transition-color hover:bg-customhover-orange">Đăng xuất</button>
            </a>';
      echo '</div>';
    } else {
    ?>
    
        <a href="dangnhap.php?act=dangnhap">
            <button class="flex items-center border border-1 border-white h-8 rounded-xl cursor-pointer px-2 py-2 text-white text-xs font-bold transition-color hover:bg-customhover-orange">Đăng nhập</button>
        </a>
        <a href="dangki.php?act=dangki">
            <button class="flex items-center border border-1 border-white h-8 rounded-xl cursor-pointer px-2 py-2 text-white text-xs font-bold transition-color hover:bg-customhover-orange">Đăng kí</button>
        </a>
    <?php } ?>
    </div>


    </div>  

  </header>



<!-- header ở giữa -->



</header>
<div id="myElement" class="w-full z-20">
  <nav class="h-18 bg-custom-orange shadow sticky">
    <div class="max-w-5xl mx-auto px-4 py-4">
    <div class="flex flex-row gap-32 items-center justify-between w-full">
    <div class="hidden md:flex font-bold space-x-7">
        <a href="index.php" class="flex flex-row items-center gap-x-2">
            <svg class="h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2" d="M3 9l9-6 9 6v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
            </svg>
            <div class="text-white hover:text-black">Trang Chủ</div>
        </a>
        <a href="sanpham.php" class="flex items-center text-white hover:text-black">Sản Phẩm</a>
        <a href="phukien.php" class="flex items-center text-white hover:text-black">Phụ Kiện</a>
        <a href="giamgia.php" class="flex items-center text-white hover:text-black">Giảm giá</a>
        <a href="tintuc.php" class="flex items-center text-white hover:text-black">Tin tức</a>
        <a href="lienhe.php" class="flex items-center text-white hover:text-black">Liên Hệ</a>
    </div>

    <!-- Form tìm kiếm -->
    <div class="flex justify-center items-center mt-3">
        <?php
        include("./timkiem.php") 
        ?>
    </div>
</div>

         
                     
          <div class="md:hidden">
              <button id="menu-toggle" class="focus:outline-none">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                  </svg>
              </button>
          </div>
      </div>
      <div id="menu" class="hidden md:hidden">
          <div class="px-4 py-3">
              <a href="index.php" class="block text-white hover:text-yellow-200">Trang Chủ</a>
              <a href="sanpham.php" class="block text-white hover:text-yellow-200">Sản Phẩm</a>
              <a href="phukien.php" class="block text-white hover:text-yellow-200">Phụ Kiện</a>
              <a href="giamgia.php" class="block text-white hover:text-yellow-200">Giảm giá</a>
              <a href="tintuc.php" class="block text-white hover:text-yellow-200">Bảo Hành</a>
              <a href="lienhe.php" class="block text-white hover:text-yellow-200">Liên Hệ</a>
              <!-- <a href="#" class="block"> -->
              <!-- <input class=" bg-orange-300 w-72 pl-2 font-mono text-sm border border-orange-600 focus:border-orange-700 focus:outline-none
               placeholder-yellow-50 " placeholder="Tìm kiếm sản phẩm.." type="text"> -->
 
              <!-- </a> -->
              <div class="hidden md:flex">
            
           </div>
          </div>
         </div>
        </div>
      </div>
    </div>
  </nav>
</div>

<script>
window.addEventListener('scroll', function() {
  const element = document.getElementById('myElement');
  const body = document.body;

  // Lấy chiều cao của phần tử khi nó ở vị trí ban đầu
  const elementHeight = element.offsetHeight;

  if (window.scrollY >= 140) {
    element.classList.add('fixed', 'z-20', 'top-0');
    // Thêm phần tử lót để giữ khoảng cách cho phần tử
    body.style.paddingTop = `${elementHeight}px`;
  } else {
    element.classList.remove('fixed', 'z-20', 'top-0');
    // Xóa phần tử lót khi phần tử trở lại trạng thái ban đầu
    body.style.paddingTop = '0';
  }
});

</script>


