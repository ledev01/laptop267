<?php
function themtk($phone, $adress, $username, $password, $repassword, $role) {
    $conn = connectdb();


    $sql = "INSERT INTO tbl_user (phone, adress, username, password,repassword, role) VALUES (:phone, :adress, :username, :password,:repassword, :role)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':adress', $adress);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':repassword', $repassword);
    $stmt->bindParam(':role', $role);

    // Execute the statement
    $stmt->execute();
}

function updatetk($id, $phone, $adress, $username, $password, $repassword, $role) {
     $conn = connectdb();
     
     // Câu lệnh SQL để cập nhật các trường
     $sql = "UPDATE tbl_user SET phone = :phone, adress = :adress, username = :username, password = :password, repassword = :repassword, role = :role WHERE id = :id";
     $stmt = $conn->prepare($sql);
 
     // Ràng buộc tham số
     $stmt->bindParam(':id', $id);
     $stmt->bindParam(':phone', $phone);
     $stmt->bindParam(':adress', $adress);
     $stmt->bindParam(':username', $username);
     $stmt->bindParam(':password', $password);
     $stmt->bindParam(':repassword', $repassword);
     $stmt->bindParam(':role', $role);
     $stmt->execute();
 }
 
function getonetk($id){
     $conn = connectdb();
     $stmt = $conn->prepare("SELECT *FROM tbl_user WHERE id=".$id);
     $stmt->execute();
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $kq=$stmt->fetchAll();
     return $kq;
}
function deltk($id){
     $conn = connectdb();
     $sql = "DELETE FROM tbl_user WHERE id=".$id;

  // use exec() because no results are returned
  $conn->exec($sql);
}
function getall_tk(){
     $conn = connectdb();
     $stmt = $conn->prepare("SELECT *FROM tbl_user");
     $stmt->execute();
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $kq=$stmt->fetchAll();
     return $kq;
}
?>