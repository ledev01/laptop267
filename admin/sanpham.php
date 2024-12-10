<link rel="stylesheet" href="admin.css">
<section>
    <div class="footer2"> 
        <h1>SẢN PHẨM</h1>
    </div>
    <div class="text-header">
    <form action="admin.php?act=addsp" method="post" enctype="multipart/form-data">
       <select name="iddm" id="">
            <option value="0">Danh mục</option>
            <?php
                $iddm=$kqone[0]['iddm'];
                if(isset($dsdm)){
                    foreach ($dsdm as $dm) {
                        if($dm['id']==$iddm)
                        echo '<option value="'.$dm['id'].'"selected>'.$dm['tendm'].'</option>';
                    else
                    echo '<option value="'.$dm['id'].'">'.$dm['tendm'].'</option>';

                    }
                }
            ?>
       </select>
       <input type="text" name="tensp" id="ipsanpham" placeholder="Tên sản phẩm">
       <input type="file" name="img" id="" placeholder="Hình ảnh">
       <?php
           if(isset($uploadOk) && ($uploadOk ==0)){
            echo '<span style="color: red;">Yêu cầu nhập lại hình</span>';
           }
       ?>
       <input type="text" name="gia" id="" placeholder="Giá">
       <input type="text" name="mieuta" id="ipmieuta" placeholder="Miêu tả sản phẩm">
       <input type="text" name="chuthich" id="ipchuthich" placeholder="Chú thích">
     
       <input type="submit" name="themmoi" value="Thêm sản phẩm">
    </form>
    </div>
    <br>
    <table class="styled-table">
        <tr> 
            <th>STT</th>
            <th id="danhmuc">Danh mục</th>
            <th>Tên sản phẩm</th>
            <th id="img">Hình ảnh</th>
            <th>Giá (vnđ)</th>
            <th id="mieuta">Miêu tả sản phẩm</th>
            <th id="chuthich">Chú thích</th>
            <th id="hanhdong">Hành động</th>
        </tr>
        <?php
        // var_dump($kq);
        ?>

<?php
// Giả sử bạn đã lấy tất cả danh mục vào biến $dsdm
$danhMucMap = [];
if (isset($dsdm)) {
    foreach ($dsdm as $dm) {
        $danhMucMap[$dm['id']] = $dm['tendm']; // Tạo một mảng với id là khóa và tên là giá trị
    }
}

if (isset($kq) && (count($kq) > 0)) {
    $i = 1;
    foreach ($kq as $sp) {
        $tendm = isset($danhMucMap[$sp['iddm']]) ? $danhMucMap[$sp['iddm']] : 'Không xác định'; // Lấy tên danh mục
        echo '   <tr>
                    <td>' . $i . '</td>
                    <td>' . $tendm . '</td> <!-- Hiển thị tên danh mục -->
                    <td>' . $sp['tensp'] . '</td>
                    <td><img id="img" src="' . $sp['img'] . '" width="300px" height="240px"></td>
                    <td>' . $sp['gia'] . '</td>
                    <td>' . $sp['mieuta'] . '</td>
                    <td>' . $sp['chuthich'] . '</td>
                    <td><a href="admin.php?act=updatespform&id=' . $sp['id'] . '">Sửa</a> | <a href="admin.php?act=delsp&id=' . $sp['id'] . '">xóa</a></td>
                  </tr>';
        $i++;
    }
}
?>

    </table>
</section>