<title>Trang giỏ hàng</title>

<?php 
if (session_status() == PHP_SESSION_NONE) { 
    session_start(); 
} 
include_once("../model/connectdb.php"); 
include_once("../model/user.php"); 
include_once("../model/sanpham.php"); 
include_once("../model/danhmuc.php"); 
include_once("../model/donhang.php"); 
include("header.php"); 
?>

<div class="grid max-w-7xl mx-auto px-2 flex justify-center mt-4"> 
    <p class="text-3xl text-red-500 font-mono mt-4">Giỏ Hàng Của Bạn</p> 
    <div class="flex flex-row gap-x-4 flex-grow"> 
        <div> 
            <?php 
            // Kiểm tra xem giỏ hàng có sản phẩm không
            if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) { 
                echo '<table class="border-collapse border-2 border-gray-300 mt-4"> 
                    <tr> 
                        <th class="border border-gray-300 px-4 py-2">STT</th> 
                        <th class="border border-gray-300 px-4 py-2 w-1/4">Tên sản phẩm</th> 
                        <th class="border border-gray-300 px-4 py-2">Hình ảnh</th> 
                        <th class="border border-gray-300 px-4 py-2">Giá (vnđ)</th> 
                        <th class="border border-gray-300 px-4 py-2">Số lượng</th> 
                        <th class="border border-gray-300 px-4 py-2">Thành tiền (vnđ)</th> 
                        <th class="border border-gray-300 px-4 py-2">Hành Động</th> 
                    </tr>';
                
                $i = 1; 
                $tong = 0; 
                foreach ($_SESSION['giohang'] as $item) { 
                    $tt = $item[3] * $item[4]; 
                    $tong += $tt; 
                    $formatted_price = number_format($item[3], 0, '.', '.'); 
                    $formatted_tt = number_format($tt, 0, '.', '.'); 
                    $formatted_tong = number_format($tong, 0, '.', '.'); 
                    echo '<tr> 
                        <td class="border border-gray-300 px-4 py-2">' . $i . '</td> 
                        <td class="border border-gray-300 px-4 py-2">' . $item[1] . '</td> 
                        <td class="border border-gray-300 px-4 py-2 flex items-center justify-center"> 
                            <img class="w-32 h-28 cursor-pointer" src="../uploads/' . $item[2] . '" alt=""> 
                        </td> 
                        <td class="border border-gray-300 px-4 py-2">' . $formatted_price . '</td> 
                        <td class="border border-gray-300 px-4 py-2">' . $item[4] . '</td> 
                        <td class="border border-gray-300 px-4 py-2">' . $formatted_tt . '</td> 
                        <td class="border border-gray-300 px-4 py-2"> 
                            <a class="text-red-500 font-mono underline flex justify-center" href="index.php?act=del1cart&id=' . $item[0] . '">Xóa</a> 
                        </td> 
                    </tr>';
                    $i++; 
                }
                
                echo '<tr> 
                    <td colspan="5" class="border border-gray-300 px-4 py-2"></td> 
                    <td class="border border-gray-300 px-4 py-2">' . $formatted_tong . ' vnđ</td> 
                    <td class="border border-gray-300 px-4 py-2"> 
                        <a href="index.php?act=delcart" class="w-auto h-auto bg-red-700 hover:bg-red-800 hover:scale-95 transition-transform duration-300 flex items-center justify-center px-1 rounded-md"> 
                            <p class="text-md text-white font-mono">Hủy</p> 
                        </a> 
                    </td> 
                </tr>'; 
                echo '</table>';

                // Add the extra content after the cart table when there are products in the cart
                echo '<br>
                <div class="flex flex-row">
                    <div class="flex flex-grow"></div>
                    <div class="flex flex-row gap-x-4">
                        <div class="w-auto h-auto bg-custom-orange hover:bg-customhover-orange hover:scale-95 transition-transform duration-300 flex items-center justify-center px-2 rounded-md">
                            <a class="text-md text-white font-mono" href="index.php"> < Tiếp tục chọn sản phẩm</a>
                        </div>
                        <div class="w-auto h-auto bg-custom-orange flex items-center justify-center px-2 ">
                            <p class="text-md text-white font-mono"> Để đặt hàng vui lòng nhập thông tin bên cạnh ></p>
                        </div>
                    </div>
                </div>';
            } else { 
                // Nếu giỏ hàng trống
                echo '<p class="text-xl text-red-500 font-mono mt-4">Giỏ hàng trống!</p>
                    <div class="flex flex-col gap-y-8">
                       <div class="flex justify-center mt-10 flex-row gap-x-4">
                         <img class="w-36 h-auto" src="https://cdn-icons-png.flaticon.com/128/13637/13637462.png" />
                         <img class="w-36 h-auto" src="https://cdn-icons-png.flaticon.com/128/13560/13560513.png" />
                       </div>
                       <div class="w-auto h-auto bg-custom-orange hover:bg-customhover-orange hover:scale-95 transition-transform duration-300 flex items-center justify-center px-2 rounded-md">
                            <a class="text-md text-white font-mono" href="index.php"> < Chọn sản phẩm nào !</a>
                        </div>
                    </div>
                '; 
            }
            ?> 
        </div> 

        <?php if (isset($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) { ?>
            <!-- Only display the personal information form if the cart has products -->
            <div class="h-[500px] max-w-2xl bg-slate-100 border border-gray-400 mt-4"> 
                <p class="text-3xl text-red-500 font-mono mt-4 px-4">Thông tin cá nhân</p> 
                <form action="dieukhien.php?act=thanhtoan" method="post"> 
                    <input type="hidden" name="tongdonhang" value="<?=$tong?>"> 
                    <div class="mt-4 flex flex-col gap-y-6 px-4 pt-4"> 
                        <input class="pl-2" type="text" name="hoten" placeholder="Nhập họ tên"> 
                        <input class="pl-2" type="text" name="address" placeholder="Nhập địa chỉ"> 
                        <input class="pl-2" type="text" name="email" placeholder="Nhập email"> 
                        <input class="pl-2" type="text" name="tel" placeholder="Nhập số điện thoại"> 
                        <div class="flex flex-col gap-y-4"> 
                            <span class="mr-4">Phương thức thanh toán:</span> 
                            <label> 
                                <input type="radio" name="pttt" value="1"> Thanh toán khi nhận hàng 
                            </label> 
                            <label> 
                                <input type="radio" name="pttt" value="2"> Thanh toán trực tuyến 
                            </label> 
                        </div> 
                        <div class="flex justify-center"> 
                            <input class="w-32 h-auto bg-custom-orange hover:bg-customhover-orange hover:scale-95 transition-transform duration-300 flex items-center justify-center px-2 py-2 rounded-md text-white font-semibold text-sm" 
                            type="submit" name="thanhtoan" value="Đặt hàng"> 
                        </div> 
                    </div> 
                </form> 
            </div>
        <?php } ?>

    </div>
</div> 

<?php include("footer.php"); ?> 
