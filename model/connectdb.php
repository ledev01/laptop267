<?php
function connectdb() {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=laptopshop", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; // Trả về đối tượng kết nối
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage(); // Hiển thị lỗi
        return null; // Trả về null nếu không kết nối được
    }
}
?>
