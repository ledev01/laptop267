<?php
// function checkuser($username,$password){
//     $conn = connectdb();
//     $stmt = $conn->prepare("SELECT *FROM tbl_user WHERE username='$username' AND password='$password' ");
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq=$stmt->fetchAll();
//     if(count($kq)>0 )return $kq[0]['role'];
//     else return 0;
// }
function checkuser($username, $password) {
    // var_dump($_SESSION['role']);
    $conn = connectdb(); // Gọi hàm kết nối
    if ($conn === null) {
        return null; // Nếu không kết nối được, trả về null
    }
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // $stmt = $conn->prepare("SELECT *FROM tbl_user WHERE username='$username' AND password='$password' ");
    // $stmt->execute();
    $kq = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($kq) {
        return $kq['role']; // Trả về vai trò của người dùng
    } else {
        return null; // Không tìm thấy người dùng
    }
}

function getuserinfor($username,$password){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT *FROM tbl_user WHERE username='$username' AND password='$password' ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>