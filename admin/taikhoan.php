<link rel="stylesheet" href="admin.css">
<section>
    <div class="footer2"> 
        <h1>TÀI KHOẢN</h1>
    </div>
    <div class="text-header">
    <form action="admin.php?act=addtk" method="post">
       <input type="text" name="phone" id="dienthoai" placeholder="số điện thoại">
       <input type="text" name="adress" id="diachi" placeholder="địa chỉ">
       <input type="text" name="username" id="taikhoan" placeholder="tên tài khoản (tối đa 15 kí tự)">
       <input type="text" name="password" id="matkhau" placeholder="mật khẩu (từ 6 đến 15 kí tự)">
       <input type="text" name="repassword" id="matkhaunhaplai" placeholder="mật khẩu nhập lại">
       <input type="text" name="role" id="phanquyen" placeholder="phân quyền">
       <input type="submit" name="themmoi" value="Thêm tài khoản">
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