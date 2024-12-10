<link rel="stylesheet" href="output.css">
<form class="flex flex-row gap-x-1" action="dieukhiensearch.php?act=sanpham" method="POST">
    <input id="search" spellcheck="false" class="w-56 pl-2 bg-white font-mono text-sm focus:outline-none focus:ring-0 placeholder-gray-500 border-none" 
           placeholder="Tìm kiếm sản phẩm.." type="text" name="kyw" value="<?php echo isset($_POST['kyw']) ? $_POST['kyw'] : ''; ?>"> 
    <input class="cursor-pointer border border-2 border-white rounded-md px-1 text-white font-semibold" name="timkiem" type="submit" value="Tìm kiếm"> 
</form>
