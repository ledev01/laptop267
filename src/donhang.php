<title>Trang đơn hàng</title>

<link href="./output.css" rel="stylesheet">
<div class="grid max-w-6xl mx-auto mt-4">
    <p class="text-3xl text-red-500 font-mono mt-4 ml-48">Đơn hàng đã được khởi tạo thành công !</p>
    <div class="flex flex-row gap-x-4">
        <div class="flex flex-grow">
            <?php
            if(isset($_SESSION['iddh']) && ($_SESSION['iddh']) > 0){
                $getshowcart = getshowcart($_SESSION['iddh']);
                if (isset($getshowcart) && count($getshowcart) > 0) {
                    echo '<table class="w-full border-collapse border-2 border-gray-300 mt-4 h-auto ">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 ">STT</th>
                                <th class="border border-gray-300 px-4 py-2 w-1/4 ">Tên sản phẩm</th>
                                <th class="border border-gray-300 px-4 py-2 ">Hình ảnh</th>
                                <th class="border border-gray-300 px-4 py-2 ">Giá (vnđ)</th>
                                <th class="border border-gray-300 px-4 py-2 ">Số lượng</th>
                                <th class="border border-gray-300 px-4 py-2 ">Thành tiền (vnđ)</th>
                            </tr>';
                    
                    $i = 1;
                    $tong = 0;
                    foreach ($getshowcart as $item) {
                        $tt = $item['soluong'] * $item['dongia'];
                        $tong += $tt;
                        $formatted_price = number_format($item['dongia'], 0, '.', '.');
                        $formatted_tt = number_format($tt, 0, '.', '.');
                        $formatted_tong = number_format($tong, 0, '.', '.');
                        echo '<tr>
                            <td class="border border-gray-300 px-4 py-2 h-[129px]">' . $i . '</td>
                            <td class="border border-gray-300 px-4 py-2 h-[129px]">' . $item['tensp'] . '</td>
                            <td class="border border-gray-300 px-4 py-2 flex items-center justify-center h-[129px]">
                                <img class="w-32 h-28 cursor-pointer" src="../uploads/'. $item['img'].'" alt="">
                            </td>
                            <td class="border border-gray-300 px-4 py-2 h-[129px]">' . $formatted_price . '</td>
                            <td class="border border-gray-300 px-4 py-2 h-[129px]">' . $item['soluong'] . '</td>
                            <td class="border border-gray-300 px-4 py-2 h-[129px]">' . $formatted_tt . '</td>
                        </tr>';
                        $i++;
                    }
                    echo '<tr>
                            <td colspan="5" class="border border-gray-300 px-4 py-2 text-blue-500 font-semibold pl-80 h-[39px]">Tổng tiền</td>
                            <td class="border border-gray-300 px-4 py-2 h-[39px]">' . $formatted_tong . '&#160;vnđ</td>
                        </tr>';
                    echo '</table>';
                }
            }
            ?>
        </div>

        <!-- Thông tin cá nhân -->
        <?php
        if(isset($_SESSION['iddh']) && ($_SESSION['iddh']) > 0){
            $orderinfo = getorderinfo($_SESSION['iddh']);
            if(count($orderinfo) > 0){
        ?>
        <div class="w-max-2xl mt-4">
            <p class="text-3xl text-red-500 font-mono mt-4 px-4">Thông tin khách hàng</p>
            <form action="dieukhien.php?act=thanhtoan" method="post">
                <div class="mt-4 flex flex-col gap-y-6 px-4 pt-4">
                    <div>
                        <p><strong>Mã đơn hàng:</strong> <?=$orderinfo[0]['madh'];?></p>
                        <p><strong>Tên người nhận:</strong> <?=$orderinfo[0]['hoten'];?></p>
                        <p><strong>Địa chỉ:</strong> <?=$orderinfo[0]['address'];?></p>
                        <p><strong>Email:</strong> <?=$orderinfo[0]['email'];?></p>
                        <p><strong>SĐT:</strong> <?=$orderinfo[0]['tel'];?></p>
                    </div>
                    <div class="flex flex-col gap-y-2">
                        <strong><span class="mr-4 text-blue-500">Phương thức thanh toán:</span></strong>
                        <?php
                             switch ($orderinfo[0]['pttt']){
                                   case '1':
                                      $txtmess="- Thanh toán khi nhận hàng";
                                      break;
                                   case '2':
                                      $txtmess="- Thanh toán trực tuyến";
                                      break;
                             }
                             echo $txtmess;
                        ?>
                    </div>
                </div>
            </form>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>



<div class=" mt-32 flex justify-center text-orange-500 font-extrabold text-xl">Cảm ơn bạn đã gửi gắm niềm tin tại Laptop267Shop</div>
      <!-- thanh tittle giữa trang  -->
        <div class=" grid grid-cols-4 max-w-5xl mx-auto mt-7 mb-10 gap-x-12">

          <div class=" w-56 h-96 rounded-md bg-white shadow-2xl hover:shadow-none duration-300">
          <div class="flex flex-col items-center gap-y-3 ">
          <img class=" w-28 h-auto pt-2" src="https://order247.maugiaodien.com/wp-content/uploads/2020/05/i2.png" alt="">  
          <p class="flex items-center text-center  text-gray-600 font-semibold uppercase px-3">đặt hàng và vận chuyển nhanh chóng</p>
          <p class="text-gray-500 text-center px-3">Yêu cầu đặt hàng của quý khách được xử lý nhanh chóng. Thời gian từ lúc xác nhận đơn hàng đến lúc lên đơn và vận chuyển trong vòng 6h.</p>
          </div>
          </div>

          <div class=" w-56 h-96 rounded-md bg-white shadow-2xl hover:shadow-none duration-300">
            <div class="flex flex-col items-center gap-y-3 ">
            <img class=" w-28 h-auto pt-2" src="https://order247.maugiaodien.com/wp-content/uploads/2020/05/icon-yeu-cau-phia-doi-tac-03.png" alt="">  
            <p class="flex items-center text-center  text-gray-600 font-semibold uppercase px-3">tiết kiệm chi phí</p>
            <p class="text-gray-500 text-center px-3">Laptop267Shop luôn có chương trình ưu đãi chiết khấu cao đối với các khách hàng thân thiết. Sản phẩm có giá thành thấp hơn giá thị trường 4-5%.</p>
            </div>
          </div>

          <div class=" w-56 h-96 rounded-md bg-white shadow-2xl hover:shadow-none duration-300">
              <div class="flex flex-col items-center gap-y-3 ">
              <img class=" w-28 h-auto pt-2" src="https://order247.maugiaodien.com/wp-content/uploads/2020/05/i7.png" alt="">  
              <p class="flex items-center text-center  text-gray-600 font-semibold uppercase px-3">chất lượng hàng đầu</p>
              <p class="text-gray-500 text-center px-3">Sản phẩm là những thương hiệu hàng đầu được thông qua kiểm duyệt quốc tế về chất lượng. Tự tin mang đến cho khách hàng những sản phẩm có chất lượng tốt nhất.</p>
              </div>
          </div>

          <div class=" w-56 h-96 rounded-md bg-white shadow-2xl hover:shadow-none duration-300">
                <div class="flex flex-col items-center gap-y-3 ">
                <img class=" w-28 h-auto pt-2" src="https://order247.maugiaodien.com/wp-content/uploads/2020/05/i9.png" alt="">  
                <p class="flex items-center text-center  text-gray-600 font-semibold uppercase px-3">tư vấn khách hàng 24/7</p>
                <p class="text-gray-500 text-center px-3">Đội ngũ nhân viên năng động, tràn đầy nhiệt huyết sẽ mang đến cho bạn những dịch vụ hoàn thiện nhất bởi thái độ và trách nhiệm chuyên nghiệp nhất.</p>
                </div>
          </div>
</div>
      




    





