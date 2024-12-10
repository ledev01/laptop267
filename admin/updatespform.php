<link rel="stylesheet" href="admin.css">
<section>
    <div class="footer2"> 
        <h1>CẬP NHẬT SẢN PHẨM</h1>
    <?php
         //echo var_dump($kqone);
    ?>
    </div>
    <div class="text-header">
    <form action="admin.php?act=update_sp" method="post" enctype="multipart/form-data">
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
       <input type="text" name="tensp" id="ipsanpham" value="<?=$kqone[0]['tensp']?>">
       <input type="file" name="img" id="taikhoan" >
       <img src="<?= $kqone[0]['img']?>" width="100px" height="66px" alt="">
       <?php
           if(isset($uploadOk) && ($uploadOk ==0)){
            echo '<span style="color: red;">Yêu cầu nhập lại hình</span>';
           }
       ?>
       <input type="text" name="gia" id="ippgia" value="<?=$kqone[0]['gia']?>">
       <input type="text" name="mieuta" id="ipmieuta" value="<?=$kqone[0]['mieuta']?>">
       <input type="text" name="chuthich" id="ipchuthich" value="<?=$kqone[0]['chuthich']?>">
       <input type="hidden" name="id" value="<?=$kqone[0]['id']?>">
       <input type="submit" name="capnhat" value="Cập nhật">
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
           if(isset($kq)&&(count($kq)>0)){
               $i=1;
               foreach($kq as $sp){
                  echo '   <tr>
                             <td>'.$i.'</td>
                             <td>'.$sp['iddm'].'</td>
                             <td>'.$sp['tensp'].'</td>
                             <td><img id="img" src="'.$sp['img'].'" width="300px" height="240px"</td>
                             <td>'.$sp['gia'].'</td>
                             <td>'.$sp['mieuta'].'</td>
                             <td>'.$sp['chuthich'].'</td>
                             <td><a href="admin.php?act=updatespform&id='.$sp['id'].'">Sửa</a> | <a href="admin.php?act=delsp&id='.$sp['id'].'">xóa</a></td>
                           </tr>';
                           $i++;
               }
           }
        ?>

    </table>
</section>