<?php   
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

ob_start();
include_once("../model/connectdb.php");
include_once("../model/user.php");

$text_error = ""; // To store error messages
$text_success = ""; // To store success messages

// Handle the registration form submission
if (isset($_POST['dangki']) == true) {
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Check if any field is empty
    if (empty($phone) || empty($adress) || empty($username) || empty($password) || empty($repassword)) {
        $text_error = "Vui lòng điền đầy đủ thông tin!";
    }
    // Check if password length is at least 6 characters
    elseif (strlen($password) < 6) {
        $text_error = "Mật khẩu phải có ít nhất 6 ký tự!";
    }
    // Check if password and repassword match
    elseif ($password !== $repassword) {
        $text_error = "Mật khẩu nhập lại không khớp!";
    } else {
        // Check if username or phone already exists in the database
        $conn = new PDO("mysql:host=localhost;dbname=laptopshop;charset=utf8", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Check for existing username
        $sql = "SELECT COUNT(*) FROM tbl_user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $usernameExists = $stmt->fetchColumn();

        // Check for existing phone number
        $sql = "SELECT COUNT(*) FROM tbl_user WHERE phone = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$phone]);
        $phoneExists = $stmt->fetchColumn();

        // If either username or phone exists, show an error
        if ($usernameExists > 0) {
            $text_error = "Tên tài khoản đã được sử dụng, vui lòng chọn tên khác!";
        } elseif ($phoneExists > 0) {
            $text_error = "Số điện thoại đã được sử dụng, vui lòng nhập số khác!";
        } else {
            // If everything is valid, insert the user into the database (do not insert repassword)

            // $sql = "INSERT INTO tbl_user (phone, adress, username, password) VALUES (?, ?, ?, ?)";
            // $stmt = $conn->prepare($sql);
            // $stmt->execute([$phone, $adress, $username, $password]);
            $phone = $_POST['phone'];
            $adress = $_POST['adress'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];
            //echo "<p>số điện thoại : $phone <br> địa chỉ : $adress <br>tên đăng nhập : $username<br> mật khẩu : $password <br>nhập lại mật khẩu : $repassword </p>";
            $conn = new PDO("mysql:host=localhost;dbname=laptopshop;charset=utf8","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="INSERT INTO tbl_user SET phone=? ,adress=? ,username=? ,password=? ,repassword=?";
            $smmt = $conn->prepare($sql);
            $smmt ->execute([$phone,$adress,$username,$password,$repassword]);
            // Success message
            $text_success = "Đăng ký thành công , vui lòng đăng nhập lại !";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <script src="js\hienthimk.js"></script>
    <title>Trang Đăng Kí</title>
</head>
<body>
<?php include("header.php"); ?>
<div class="relative">
    <div class="absolute">
    
    </div>

    <img class="w-full h-auto bg-cover " 
    src="https://www.vietnamworks.com/hrinsider/wp-content/uploads/2023/12/hay-vung-tin-vao-nhung-uoc-mong-ban-da-gui-den-vu-tru.jpg" alt=""/>
</div>   

<div class="mt-[121px] absolute w-[500px] h-[550px] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white p-8 rounded-xl shadow-lg z-10">
    <form action="" method="post">

      <div class="flex flex-row items-center">
        <a href="index.php"><svg class="mb-10 h-4 w-4 text-black " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-width="2" d="M3 9l9-6 9 6v10a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
        </svg></a>
        <div class="flex-grow flex justify-center">
            <h2 class="text-lg font-bold mb-4 pb-8">Đăng kí</h2>
        </div>
      </div>

      <!-- Input fields -->
      <input spellcheck="false" type="text" name="phone" id="phone" placeholder="Số điện thoại" class="w-[435px] block mb-4 p-2 border rounded" />
      <input spellcheck="false" type="text" name="adress" id="adress" placeholder="Địa chỉ" class="w-[435px] block mb-4 p-2 border rounded" />
      <input spellcheck="false" type="text" name="username" id="username" placeholder="Tài khoản" class="w-[435px] block mb-4 p-2 border rounded" />

      <div class="relative">
        <input spellcheck="false" type="password" name="password" id="password" placeholder="Mật khẩu" class="block w-full p-2 border rounded pr-10" />
        <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center pr-3">
          <svg class="text-gray-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
          stroke-linejoin="round"><path d="M1 12s4.5-10 11-10 11 10 11 10-4.5 10-11 10S1 12 1 12z"/><circle cx="12" cy="12" r="3"/></svg>
        </button>
      </div>

      <div class="mt-4">
        <div class="relative">
          <input spellcheck="false" type="password" name="repassword" id="password2" placeholder="Nhập lại mật khẩu" class="block w-full p-2 border rounded pr-10" />
          <button type="button" id="toggle-password2" class="absolute inset-y-0 right-0 flex items-center pr-3">
            <svg class="text-gray-500" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M1 12s4.5-10 11-10 11 10 11 10-4.5 10-11 10S1 12 1 12z" />
              <circle cx="12" cy="12" r="3" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Display error or success message -->
      <!-- Submit Button -->
      <input type="submit" name="dangki" class="font-semibold w-full bg-custom-orange text-white p-2 rounded hover:bg-customhover-orange trainsition-color mt-8" value="Đăng kí">

      <div class="mt-4">
        <?php if ($text_error): ?>
          <div class="text-red-500 bg-red-100 border border-red-400 rounded p-2 flex justify-center"><?php echo $text_error; ?></div>
        <?php elseif ($text_success): ?>
          <div class="text-blue-500 bg-blue-100 border border-blue-400 rounded p-2 flex justify-center"><?php echo $text_success; ?></div>
        <?php endif; ?>
      </div>

    </form>
</div>

</body>
</html>
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

  const togglePassword2 = document.getElementById('toggle-password2');
  const passwordInput2 = document.getElementById('password2');
  let isPasswordVisible2 = false;

  togglePassword2.addEventListener('click', () => {
    isPasswordVisible2 = !isPasswordVisible2;
    passwordInput2.setAttribute('type', isPasswordVisible2 ? 'text' : 'password2');
  });

  togglePassword2.addEventListener('mouseleave', () => {
    if (isPasswordVisible2) {
      passwordInput2.setAttribute('type', 'password');
      isPasswordVisible2 = false; // Đặt lại trạng thái
    }
  });
</script>
<!-- js hiển thị mật khẩu khi click chuột vào con mắt và biến mất khi di chuột ra -->
