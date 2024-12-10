<link href="./output.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a id="chat" href="javascript:void(0)">
  <button onclick="handleChat()" class="z-10 fixed top-3/4 mt-28 right-10 transform -translate-y-1/2 w-16 h-16 bg-blue-200 hover:bg-blue-300 rounded-full flex items-center justify-center">
    <img src="https://cdn-icons-png.flaticon.com/128/724/724715.png" alt="Hình ảnh cố định" class="absolute w-10 "> <!-- Kích thước hình ảnh -->
  </button>
</a>

<div id="khungchat" class="z-10 w-64 h-80 rounded-md border border-1 border-gray-400 bg-white fixed top-1/2 right-32 hidden">
<div class="relative">
    <div class="flex flex-col">
      <div class="w-full bg-blue-400 h-12 rounded-tl-md rounded-tr-md flex flex-row gap-x-3 items-center px-2">
        <img class="w-8 h-8 rounded-full" src="https://cdn-icons-png.flaticon.com/128/15239/15239514.png"/>
        <p class="text-sm text-white">Laptop267</p>
        <img class="w-3 h-auto" src="https://cdn-icons-png.flaticon.com/128/14035/14035769.png"/>
        <button onclick="handleX()" class="ml-16">
          <img class="w-4 h-auto" src="https://cdn-icons-png.flaticon.com/128/3388/3388658.png" />
        </button>
      </div>
    </div>
    <p class="px-2 pt-2 text-xs font-sans text-gray-400">Bắt đầu trò chuyện với Laptop267, nhân viên sẽ sớm trả lời những câu hỏi của bạn.</p>
    <div class="absolute right-1 top-10">
      
    </div>
    <div class="mt-[180px] w-full border border-1 border-gray-200"></div>
    <div class="w-full mt-4 bg-white flex flex-row gap-x-3 items-center px-2">
      <input spellcheck="false" class="outline-none" onchange="handleChange()" placeholder="Nhập tin nhắn"/>
    </div>
</div>
</div>

<script>
  const chatButton = document.getElementById('chat');
  const khungchat = document.getElementById('khungchat');

  const handleChat = () => {
    khungchat.classList.toggle('hidden');
  };

  const handleX = () => {
    khungchat.classList.add('hidden'); 
  };
</script>
</body>
</html>