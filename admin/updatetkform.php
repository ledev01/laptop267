<link rel="stylesheet" href="admin.css">
<section>
    <div class="footer2"> 
        <h1>CẬP NHẬT TÀI KHOẢN</h1>
    <?php
         //echo var_dump($kqone);
    ?>
    </div>
    <div class="text-header">
    <form action="admin.php?act=updatetkform" method="post">
       <input type="text" name="phone" id="dienthoai" value="<?=$kqone[0]['phone']?>">
       <input type="text" name="adress" id="diachi" value="<?=$kqone[0]['adress']?>">
       <input type="text" name="username" id="taikhoan" value="<?=$kqone[0]['username']?>">
       <input type="text" name="password" id="matkhau" value="<?=$kqone[0]['password']?>">
       <input type="text" name="repassword" id="matkhaunhaplai" value="<?=$kqone[0]['repassword']?>">
       <input type="text" name="role" id="phanquyen" value="<?=$kqone[0]['role']?>">
       <input type="hidden" name="id" value="<?=$kqone[0]['id']?>">
       <input type="submit" name="capnhat" value="Cập nhật">
    </form>
    </div>
    <br>
    <table class="styled-table">
        <tr>
            <th>STT</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Tên tài khoản</th>
            <th>Mật khẩu</th>
            <th>Mật khẩu nhập lại</th>
            <th>Phân quyền</th>
            <th>Hành động</th>
        </tr>
        <?php
        // var_dump($kq);
        ?>

        <?php 
           if(isset($kq)&&(count($kq)>0)){
               $i=1;
               foreach($kq as $tk){
                  echo '   <tr>
                             <td>'.$i.'</td>
                             <td>'.$tk['phone'].'</td>
                             <td>'.$tk['adress'].'</td>
                             <td>'.$tk['username'].'</td>
                             <td>'.$tk['password'].'</td>
                             <td>'.$tk['repassword'].'</td>
                             <td>'.$tk['role'].'</td>
                             <td><a href="admin.php?act=updatetkform&id='.$tk['id'].'">Sửa</a> | <a href="admin.php?act=deltk&id='.$tk['id'].'">xóa</a></td>
                           </tr>';
                           $i++;
               }
           }
        ?>

    </table>
</section>