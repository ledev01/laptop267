<?php
function themsp($iddm, $tensp, $img, $gia, $mieuta, $chuthich) {
    $conn = connectdb();


    $sql = "INSERT INTO tbl_sanpham (iddm, tensp, img, gia,mieuta, chuthich) VALUES (:iddm, :tensp, :img, :gia,:mieuta, :chuthich)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':iddm', $iddm);
    $stmt->bindParam(':tensp', $tensp);
    $stmt->bindParam(':img', $img);
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':mieuta', $mieuta);
    $stmt->bindParam(':chuthich', $chuthich);

    // Execute the statement
    $stmt->execute();
}

function updatesp($id, $iddm, $tensp, $img, $gia, $mieuta, $chuthich) {
    $conn = connectdb();
    $sql = "UPDATE tbl_sanpham SET iddm = :iddm, tensp = :tensp, gia = :gia, mieuta = :mieuta, chuthich = :chuthich";
    if ($img != "") {
        $sql .= ", img = :img";
    }
    $sql .= " WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':iddm', $iddm);
    $stmt->bindParam(':tensp', $tensp);
    if ($img != "") {
        $stmt->bindParam(':img', $img);
    }
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':mieuta', $mieuta);
    $stmt->bindParam(':chuthich', $chuthich);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function getonesp($id){
     $conn = connectdb();
     $stmt = $conn->prepare("SELECT *FROM tbl_sanpham WHERE id=".$id);
     $stmt->execute();
     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
     $kq=$stmt->fetchAll();
     return $kq;
}
function delsp($id){
     $conn = connectdb();
     $sql = "DELETE FROM tbl_sanpham WHERE id=".$id;

  // use exec() because no results are returned
  $conn->exec($sql);
}

function getall_sp($iddm = null) {
    $conn = connectdb();
    
    // Nếu có $iddm, lọc sản phẩm theo danh mục
    if ($iddm !== null) {
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham WHERE iddm = :iddm");
        $stmt->bindParam(':iddm', $iddm, PDO::PARAM_INT);
    } else {
        // Nếu không có $iddm, lấy tất cả sản phẩm
        $stmt = $conn->prepare("SELECT * FROM tbl_sanpham");
    }

    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}

function timkiemsp($kyw) {
    $conn = connectdb();
    // Tìm kiếm sản phẩm theo từ khóa trong tên sản phẩm, mô tả, hoặc chú thích
    $sql = "SELECT * FROM tbl_sanpham WHERE tensp LIKE :kyw OR mieuta LIKE :kyw OR chuthich LIKE :kyw";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%".$kyw."%";  // Dùng % để tìm kiếm theo từ khóa
    $stmt->bindParam(':kyw', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    return $kq;
}


?>