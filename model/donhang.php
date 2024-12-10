<?php
   function  taodonhang($madh,$tongdonhang,$hoten,$address,$email,$tel,$pttt){
    $conn = connectdb();
    $sql = "INSERT INTO tbl_order (madh,tongdonhang,hoten,address,email,tel,pttt)
    VALUES ('".$madh."','".$tongdonhang."','".$hoten."','".$address."','".$email."','".$tel."','".$pttt."')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();
    return $last_id;
    }

    function addtocart($iddh,$idpro,$tensp,$img,$dongia,$soluong){
        $conn = connectdb();
        $sql = "INSERT INTO tbl_cart (iddh,idpro,tensp,img,dongia,soluong)
        VALUES ('".$iddh."','".$idpro."','".$tensp."','".$img."','".$dongia."','".$soluong."')";
        $conn->exec($sql);
    }
    function getshowcart($iddh) {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_cart where iddh=".$iddh);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function getorderinfo($iddh) {
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_order where id=".$iddh);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function deldh($id){
        $conn = connectdb();
        $sql = "DELETE FROM tbl_order WHERE id=".$id;
   
     // use exec() because no results are returned
     $conn->exec($sql);
   }

   function getonedh($id){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT *FROM tbl_order WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function getall_dh(){
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT *FROM tbl_order");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>