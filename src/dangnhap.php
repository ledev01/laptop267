<?php
session_start();
ob_start();  // Bắt đầu output buffering
include("../model/connectdb.php");
include("../model/user.php");


if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    $role = checkuser($username, $password);

    if ($role === null) {
        // Nếu không tìm thấy tài khoản hoặc mật khẩu sai
        $text_error = "Tài khoản hoặc Mật khẩu không đúng !";
    } else if($role === 0) {
        // Nếu đăng nhập thành công
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $username;
        header('location: index.php');
        exit();
    }
}
ob_end_flush();  // Kết thúc output buffering
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Trang Đăng Nhập</title>
</head>
<?php
      include("header.php");
?>
<div class="relative">
    <div class="absolute">
   
    </div>
    <img class="w-full h-auto bg-cover " 
    src="https://www.vietnamworks.com/hrinsider/wp-content/uploads/2023/12/hay-vung-tin-vao-nhung-uoc-mong-ban-da-gui-den-vu-tru.jpg" alt="">
</div>   
<!-- code đoạn header không ảnh hưởng đến background ảnh -->
    <div class="mt-24 absolute w-[500px] h-[500px] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-xl shadow-lg z-10">
   
    <form action="<?php echo isset($role) && $role === 0 ? 'index.php?act=dangnhap' : $_SERVER['PHP_SELF']; ?>" method="post">
   
      <div class="flex flex-row items-center">
    <a href="index.php"><svg class="mb-10 h-4 w-4 text-black " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-width="2" d="M3 9l9-6 9 6v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
    </svg></a>
    <div class="flex-grow flex justify-center">
        <h2 class="text-lg font-bold mb-4 pb-8">Đăng Nhập</h2>
    </div>
    </div>
    <!-- code đoạn logo home trở về trang chủ và tiêu đề đăng nhập -->
      <input spellcheck="false" type="text" name="username" id="username" placeholder="Tài khoản" class="w-[435px] block mb-4 p-2 border rounded" />
<div class="relative">
  <input spellcheck="false" type="password" name="password" id="password" placeholder="Mật khẩu" class="block w-full p-2 border rounded pr-10" />
  <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center pr-3">
      <svg class="text-gray-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
      stroke-linejoin="round"><path d="M1 12s4.5-10 11-10 11 10 11 10-4.5 10-11 10S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
    </svg>
  </button>
  <!-- hinh cai mat -->
</div>
<script>
  const togglePassword = document.getElementById('toggle-password');
  const passwordInput = document.getElementById('password');
  let isPasswordVisible = false;

  togglePassword.addEventListener('click', () => {
    isPasswordVisible = !isPasswordVisible;
    passwordInput.setAttribute('type', isPasswordVisible ? 'text' : 'password');
  });

  togglePassword.addEventListener('mouseleave', () => {
    if (isPasswordVisible) {
      passwordInput.setAttribute('type', 'password');
      isPasswordVisible = false; // Đặt lại trạng thái
    }
  });
</script>
<!-- script hiển thị mật khẩu khi click vào mắt và biến mất khi di chuột ra -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('submitButton').addEventListener('click', (event) => {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        const phpMessageContainer = document.getElementById('php-message');
        const messageContainer = document.getElementById('message');

        // Ẩn cả hai thông báo trước khi kiểm tra
        phpMessageContainer.classList.add('hidden');
        messageContainer.innerHTML = ''; // Xóa thông báo cũ (nếu có)

        // Kiểm tra thông tin đăng nhập
        if (!username || !password) {
            const messageElement = document.createElement('div');
            messageElement.textContent = 'Bạn phải nhập đầy đủ thông tin !';
            messageContainer.appendChild(messageElement);
            messageContainer.classList.remove('hidden'); // Hiển thị thông báo lỗi
            messageContainer.classList.add('flex', 'justify-center', 'items-center', 'text-red-500', 'bg-red-100', 'border', 'border-red-400', 'rounded', 'p-2');

            event.preventDefault(); // Ngăn chặn form được gửi
            return;
        }
    });
});
</script>
<!-- kiểm tra xem nhập thiếu dữ liệu thì đưa ra thông báo , thông báo phải nhập đầy đủ thông tin cùng vị trí của thông báo tài khoản hoặc mật khẩu không đúng, 2 thông thông báo không được hiển thị cùng  1 lúc  -->
      <input type="submit" name="dangnhap" id="submitButton" class="font-semibold w-full bg-custom-orange text-white p-2 rounded 
       hover:bg-customhover-orange trainsition-color mt-8" value="Đăng Nhập">
      <!-- nút đăng nhập -->
       <div class="mt-2">
        <div id="php-message" class="<?php echo $text_error ? '' : 'hidden'; ?>">
            <?php
            if ($text_error) {
                echo "<div class='flex justify-center items-center text-red-500 bg-red-100 border border-red-400 rounded p-2'>$text_error</div>";
            }
            ?>
        </div>
        <div id="message" class="hidden justify-center items-center text-red-500 bg-red-100 border border-red-400 rounded p-2"></div>
    </div>
    
</form>

<!-- thông báo tài khoản hoặc mật khẩu không đúng và bạn phải nhập đầy đủ thông tin --> 
      <div class="flex flex-row items-center gap-x-2 pt-10">
        <div class="flex-1 border-b border-gray-300"></div>
        <h5 class="text-gray-700">Hoặc</h5>
        <div class="flex-1 border-b border-gray-300"></div>
      </div>

      <div class="pt-10 flex flex-row gap-x-2 justify-center">
        <div class="text-gray-700">
          <p>Bạn chưa có tài khoản ?</p>
        </div>
        <a href="dangki.php" class="text-blue-500 cursor-pointer">
          <p>Tạo tài khoản</p>
        </a>
      </div> 
  </div>
</body>
</html>



