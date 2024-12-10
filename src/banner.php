<link href="./output.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
<div id="banner" class="top-1/4 left-4 mt-12 z-10 fixed">
   <img src="https://laptop88.vn/media/banner/CTT12165x425.jpg"/>
</div>
<script>
 window.onscroll = function() {
        var banner = document.getElementById('banner');
        var scrollPosition = window.scrollY + window.innerHeight;
        var documentHeight = document.documentElement.scrollHeight;

        // Kiểm tra nếu khoảng cách từ bottom trang tới top của banner còn cách 1000px nữa
        if (documentHeight - scrollPosition <= 500) {
            banner.classList.add('hidden');
        } else {
            banner.classList.remove('hidden');
        }
    };
</script>

</body>
</html>