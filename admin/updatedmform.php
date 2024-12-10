<link rel="stylesheet" href="admin.css">
<section>
    <div class="footer2"> 
        <h1>CẬP NHẬT DANH MỤC</h1>
    <?php
         //echo var_dump($kqone);
    ?>
    </div>
    <div class="text-header">
    <form action="admin.php?act=updatedmform" method="post">
       <input type="text" name="tendm" id="" value="<?=$kqone[0]['tendm']?>">
       <input type="hidden" name="id" value="<?=$kqone[0]['id']?>">
       <input type="submit" name="capnhat" value="Cập nhật">
    </form>
    </div>
    <br>
    <table class="styled-table">
        <tr>
            <th>STT</th>
            <th>Tên danh mục</th>
            <th>Ưu tiên</th>
            <th>Hiển thị</th>
            <th>Hành động</th>
        </tr>
        <?php
        // var_dump($kq);
        ?>

        <?php 
           if(isset($kq)&&(count($kq)>0)){
               $i=1;
               foreach($kq as $dm){
                  echo '   <tr>
                             <td>'.$i.'</td>
                             <td>'.$dm['tendm'].'</td>
                             <td>'.$dm['uutien'].'</td>
                             <td>'.$dm['hienthi'].'</td>
                             <td><a href="admin.php?act=updatedmform&id='.$dm['id'].'">Sửa</a> | <a href="admin.php?act=deldm&id='.$dm['id'].'">xóa</a></td>
                           </tr>';
                           $i++;
               }
           }
        ?>

    </table>
</section>