<link rel="stylesheet" href="admin.css">
<section>
    <div class="footer2"> 
        <h1>ĐƠN HÀNG</h1>
    </div>

    <table class="styled-table">
        <tr>
            <th>STT</th>
            <th>Mã đơn hàng</th>
            <th>Thành tiền</th>
            <th>Phương thức thanh toán</th>
            <th>Họ tên</th>
            <th>Địa chỉ</th>
            <th>email</th>
            <th>Số điện thoại</th>
            <th>Hành động</th>
        </tr>
        <?php
        // var_dump($kq);
        ?>

<?php 
   if(isset($kq) && (count($kq) > 0)) {
       $i = 1;
       foreach($kq as $dh) {
           // Kiểm tra giá trị pttt và gán giá trị tương ứng
           if ($dh['pttt'] == 1) {
               $pttt_text = 'Thanh toán khi nhận hàng';
           } elseif ($dh['pttt'] == 2) {
               $pttt_text = 'Thanh toán trực tuyến';
           } else {
               $pttt_text = 'Chưa xác định'; // Trường hợp khác
           }

           echo '   <tr>
                      <td>'.$i.'</td>
                      <td>'.$dh['madh'].'</td>
                      <td>'.$dh['tongdonhang'].'</td>
                      <td>'.$pttt_text.'</td>
                      <td>'.$dh['hoten'].'</td>
                      <td>'.$dh['address'].'</td>
                      <td>'.$dh['email'].'</td>
                      <td>'.$dh['tel'].'</td>
                      <td><a href="admin.php?act=deldh&id='.$dh['id'].'">Hủy đơn</a></td>
                    </tr>';
           $i++;
       }
   }
?>


    </table>
</section>