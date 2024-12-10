<link href="./output.css" rel="stylesheet">
<title>Trang sản phẩm</title>

<!-- hiển thị sản phẩm -->
<div class="flex felx-row gap-x-2 mt-4 mb-4 max-w-5xl mx-auto">
    <a class="font-mono" href="index.php">Laptop267 ></a>
    <p class="font-mono underline text-blue-500">Sản phẩm tìm thấy</p>
</div>

<div class="grid grid-cols-4 max-w-5xl mx-auto gap-x-12 gap-y-10">
    <?php
    if (empty($sphome4)) {
        echo '<p class="text-xs whitespace-nowrap inline-block">Không có sản phẩm bạn tìm kiếm !.</p>';
    } else {
        foreach ($sphome4 as $sp) {
            // Xử lý mô tả sản phẩm
            if (mb_strlen($sp['mieuta'], 'UTF-8') > 120) {
                $mieuta_short = mb_substr($sp['mieuta'], 0, 120, 'UTF-8') . '...';
            } else {
                $mieuta_short = $sp['mieuta'];
            }

            // Định dạng giá sản phẩm
            $formatted_price = number_format($sp['gia'], 0, '.', '.');

            // Hiển thị sản phẩm
            echo '
            <div class="relative hover:scale-105 transition-transform duration-300 w-56 h-[470px] bg-violet-100 rounded-md shadow-xl flex flex-col mt-8">
                <div class="flex flex-col gap-y-2 flex-grow">
                    <a href="sanphamct.php?id='.$sp['id'].'">
                    <img class="w-56 h-52 cursor-pointer" src="../uploads/'.$sp['img'].'" alt="">
                    </a>
                    <a href="sanphamct.php?id='.$sp['id'].'">
                    <div class="font-bold flex justify-center uppercase cursor-pointer px-2">'.$sp['tensp'].'</div>
                    </a>
                    <div class="px-2 text-sm">'.$mieuta_short.'</div>
                </div>
                <div class="left-1/2 transform -translate-x-1/2 absolute mt-[360px]">
                    <img class="h-16 w-auto" src="https://cdn-icons-png.flaticon.com/128/992/992000.png">
                </div>
                <div class="flex flex-row gap-x-2">
                    <a href="sanphamct.php?id='.$sp['id'].'">
                    <div class="ml-2 flex-grow rounded-xl flex justify-center items-center cursor-pointer bg-custom-orange hover:bg-customhover-orange w-28 h-10 mx-auto mb-4">
                        <div class="font-mono text-white text-center">'.$formatted_price.'&#160;đ</div>
                    </div>
                    </a>
                    <button class="add-to-cart-button px-2 mr-2 h-10 bg-custom-orange hover:bg-customhover-orange rounded-xl flex items-center justify-center text-white font-mono cursor-pointer" data-product-id="'.$sp['id'].'" data-product-name="'.$sp['tensp'].'" data-product-img="'.$sp['img'].'" data-product-price="'.$sp['gia'].'">
                        ADD Cart
                    </button>
                </div>
            </div>';
        }
    }
    ?>
</div>