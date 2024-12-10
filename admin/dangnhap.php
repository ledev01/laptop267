<?php
   session_start();
   ob_start();
   include("../model/connectdb.php");
   include("../model/user.php");
   if (isset($_POST['dangnhap']) && $_POST['dangnhap']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = checkuser($username, $password);
    $_SESSION['role'] = $role;

    if ($role === 1) {
        header('location: admin.php');
    }else{
      header('location: dangnhap.php');
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DANGNHAP-ADMIN</title>
</head>
<body>
  <h2>login</h2>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="text" name="username" id="">
    <input type="text" name="password" id="">
    <input type="submit" name="dangnhap" id="" value="dang nhap">
  </form>
  
</body>
</html>