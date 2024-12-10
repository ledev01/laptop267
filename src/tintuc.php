<link href="./output.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
<?php 
if (session_status() == PHP_SESSION_NONE) { 
    session_start(); 
} 
include("header.php"); 

  include_once("./chat.php");
  include_once("./logocart.php");
  include_once("./logoscroll.php");
  

?>

<title>Trang tin tức</title>


<div class="mt-4">
   <div class="flex flex-col max-w-5xl mx-auto">
       
   <div class="flex felx-row gap-x-2 mb-4">
    <a class="font-mono" href="index.php">Laptop267 ></a>
    <p class="font-mono underline text-blue-500">Tin tức</p>
   </div>
   <div class="px-16">
   <p class="font-semibold text-2xl font-merriweather">Loạt laptop gây chú ý ra mắt đầu 2025 sẽ có mặt tại Laptop267</p>
   <p class="pt-4 font-merriweather">Các laptop của MSI, Lenovo, Acer, Asus thu hút sự quan tâm lớn từ người dùng khi có thiết kế và tính năng khác biệt, như AI, 3D không cần kính.</p>
   </div>

   <div class="mt-6 flex flex-col gap-y-4 px-16">
    <p class="font-semibold font-merriweather">Laptop game mạnh nhất ứng dụng AI</p>
    <img src="https://i1-sohoa.vnecdn.net/2024/01/15/image-2024-1-15-969-9995-1705261343.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=B18d1ykhr_u6beCSvgWqmQ">
    <p class="text-xs font-merriweather">MSI Titan 18 HX. Ảnh: The Verge</p>
    <p class="pt-2 font-merriweather">MSI ra mắt loạt laptop tại triển lãm CES 2024 tuần trước ở Las Vegas, trong đó nổi bật là mẫu Titan 18 HX A14V. Sản phẩm thu hút sự chú ý khi trang bị công nghệ AI chạy trực tiếp trên máy, cấu hình mạnh nhất hiện tại, touchpad độc đáo với đèn LED RGB và mức giá 5.000 USD. Ngoài khả năng phát sáng, hiển thị dải màu tùy chỉnh, touchpad còn có hệ thống phản hồi xúc giác.</p>
    <p class="pt-2 font-merriweather">Laptop sử dụng chip Intel Core Ultra tích hợp sẵn NPU - nhân xử lý AI chuyên biệt, kết hợp bộ phần mềm AI từ nhà sản xuất MSI như AI Engine, AI Artist và AI Noise Cancellation Pro. Trong đó, AI Engine tự động tối ưu hóa các thiết lập trên laptop từ hiệu năng, hình ảnh, âm thanh đến đèn nền theo thói quen, trạng thái sử dụng. AI Artist tạo ảnh từ văn bản, có thể chạy offline thay vì cần kết nối Internet như các chatbot thông thường.</p>
    <p class="pt-2 font-merriweather">Đây cũng là mẫu laptop gaming mạnh nhất với chip Intel Core i9 thế hệ thứ 14, card đồ họa GeForce RTX sử dụng kiến trúc Ada Lovelac với nhân tensor riêng biệt cho AI khi chơi game. Máy có màn hình 18 inch sử dụng tấm nền cao cấp nhất hiện tại là MiniLED 18 inch, tần số quét 120 Hz, RAM DDR5 128 GB và hỗ trợ PCIe Gen 5. Sản phẩm nhiều khả năng được bán tại Việt Nam ngay trong tháng này.</p>
   </div>

   <div class="mt-6 flex flex-col gap-y-4 px-16">
    <p class="font-semibold font-merriweather">Laptop lai tablet chạy song song Android và Windows</p>
    <img src="https://i1-sohoa.vnecdn.net/2024/01/15/image-2024-1-15-723-8513-1705261343.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=B0NwJyGwlyw2PlUSvnaxxg">
    <p class="text-xs font-merriweather">Lenovo ThinkBook Plus Gen 5 Hybrid. Ảnh: TechFinitive</p>
    <p class="pt-2 font-merriweather">ThinkBook Plus Gen 5 Hybrid được giới công nghệ đánh giá là mẫu laptop thú vị với thiết kế bàn phím tách rời quen thuộc nhưng ẩn bên trong là hai thành phần khác nhau. Phần màn hình kiêm tablet Android khi tháo rời với chip Snapdragon 8+ Gen 1, RAM 12 GB, 256 GB bộ nhớ trong cùng cổng sạc USB-C riêng. Mặt sau có camera kép 13 và 5 megapixel.</p>
    <p class="pt-2 font-merriweather">Trong khi đó, phần thân máy với bàn phím là một mẫu laptop Windows 11 thực thụ với cấu hình gồm chip Core Ultra 7, GPU Intel Arc, 1 TB SSD và RAM tối đa 32 GB. Riêng module này có thể kết nối với màn hình ngoài riêng để hoạt động như một Mini PC khi cần thiết. Giá bán cho bộ sản phẩm từ 1.999 USD.</p>
   </div>

   <div class="mt-6 flex flex-col gap-y-4 px-16">
    <p class="font-semibold font-merriweather">Laptop màn hình 3D không cần kính</p>
    <img src="https://i1-sohoa.vnecdn.net/2024/01/15/Untitled-1-6228-1705261343.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=29Y0I0b2ThYW6GK7XD9VbA">
    <p class="text-xs font-merriweather">Acer Aspire 3D 15 SpatialLabs Edition.</p>
    <p class="pt-2 font-merriweather">3D không còn là từ khóa "hot" trong năm 2024 nhưng sản phẩm của Acer vẫn tạo ấn tượng tại CES 2024. Acer Aspire 3D 15 SpatialLabs Edition có màn hình OLED hiển thị 3D và người dùng có thể xem nội dung trực tiếp dạng ba chiều mà không cần kính phân cực. Công nghệ của Acer dựa trên hai cảm biến hình ảnh cho phép theo dõi vị trí mắt và đầu người khi chuyển động. Máy tạo ra hai hình ảnh 2D tách biệt và tạo hiệu ứng thị giác ba chiều cho não bộ.</p>
    <p class="pt-2 font-merriweather">Sản phẩm có cấu hình gồm màn hình 15,6 inch độ phân giải 2K, chip Intel Core i7-13620H, card đồ họa GeForce RTX 4050, bộ nhớ RAM 32 GB với giá 1.400 USD.</p>
   </div>

   <div class="mt-6 flex flex-col gap-y-4 px-16">
    <p class="font-semibold font-merriweather">Laptop hai màn hình 14 inch</p>
    <img src="https://i1-sohoa.vnecdn.net/2024/01/15/image-2024-1-15-734-6581-1705261343.jpg?w=1020&h=0&q=100&dpr=1&fit=crop&s=98v9iOAuktNq_DajMnKamg">
    <p class="text-xs font-merriweather">ZenBook Duo 2024. Ảnh: Expert Review</p>
    <p class="pt-2 font-merriweather">Asus là nhà sản xuất tích cực ra mắt các mẫu laptop hai màn hình nhất thời gian qua. Model mới ZenBook Duo 2024 đưa thiết kế này lên tầm mới khi màn hình phụ có kích thước đúng bằng màn hình chính 14 inch. Sử dụng ở tư thế mở hoàn toàn, máy có thêm một chân đỡ phía sau để giữ hai màn hình phù hợp với góc nhìn của người sử dụng.</p>
    <p class="pt-2 font-merriweather">Ngoài thiết kế lạ mắt, laptop của Asus còn có cấu hình mạnh với chip Core Ultra 9 185H, RAM 32 GB và bộ nhớ SSD tối đa 2 TB. Máy có hai cổng Thunderbolt và USB tiêu chuẩn, cổng HDMI. Giá bán sản phẩm từ 1.499 USD.</p>
   </div>
    
   </div>
</div>


<?php 
include("footer.php")
?>

