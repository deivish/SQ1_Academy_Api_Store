<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>
<!-- Header -->
<x-header></x-header>


<!-- Container -->
<div class="container mx-auto p-6 grid grid-cols-[2fr_3fr_5fr] gap-2 w-full">
  <!-- Columna izquierda con imágenes pequeñas -->
  <div class="flex flex-col space-y-3 w-3/6 p-0">
    <img src="https://wearoldmoney.com/cdn/shop/files/old_money_t-shirt_white.jpg" alt="small1" class="w-full cursor-pointer ">
    <img src="https://wearoldmoney.com/cdn/shop/files/main-image-1_4620b553-657d-4ead-b0eb-ee33fe91bf2b.jpg?v=1705945350&width=1000" alt="small2" class="w-full cursor-pointer ">
    <img src="https://wearoldmoney.com/cdn/shop/files/IMG-4556.jpg?v=1713167164&width=800" alt="small3" class="w-full cursor-pointer ">
    <img src="https://wearoldmoney.com/cdn/shop/files/IMG-4557.jpg?v=1709161451&width=800" alt="small4" class="w-full cursor-pointer ">
    <img src="https://wearoldmoney.com/cdn/shop/files/IMG-4555.jpg?v=1713167164&width=800" alt="small5" class="w-full cursor-pointer ">
    <img src="https://wearoldmoney.com/cdn/shop/files/main-image-1_8b6e9e69-ac97-4c16-8faf-056bea95ca23.jpg?v=1705941738&width=1000" alt="small6" class="w-full cursor-pointer ">
    <img src="https://wearoldmoney.com/cdn/shop/files/006_2ae361d2-3549-4b43-8331-0c858f6c5a4e.jpg?v=1702477794&width=700" alt="small7" class="w-full cursor-pointer ">
  </div>

  <div class="flex justify-center items-start ">
    <img src="https://wearoldmoney.com/cdn/shop/files/old_money_t-shirt_white.jpg" alt="main" class="w-96  shadow-lg" />
  </div>

  <div class="w-full max-w-md p-4 rounded-lg font-volkhov bg-white">
    <span class=" text-gray font-semibold font-volkhov">FASCO</span>
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-semibold">Denim Jacket</h2>
      <a href="#" class="text-gray-500 hover:text-yellow-500">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.5a.562.562 0 011.04 0l2.125 5.11a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.562.562 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.562.562 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
        </svg>
      </a>
    </div>
    <div class="text-yellow-500 text-lg mb-2">★★★★☆ <span class="text-gray-500 text-sm">(3)</span></div>

    <p class="text-xl font-bold text-gray-800">
      $39.00 <span class="line-through text-gray-500 text-sm">$59.00</span>
      <span class="text-red-500 text-sm font-semibold">SAVE 33%</span>
    </p>
    
    <x-sale></x-sale>
    
    <x-items-stock></x-items-stock>
    
    <div class="mt-4">
      <h4 class="text-gray-700 font-semibold">Size:</h4>
      <div class="flex space-x-2 mt-2">
        <button class="px-3 py-1 border rounded hover:bg-black hover:text-white">M</button>
        <button class="px-3 py-1 border rounded hover:bg-black hover:text-white">L</button>
        <button class="px-3 py-1 border rounded hover:bg-black hover:text-white">XL</button>
        <button class="px-3 py-1 border rounded hover:bg-black hover:text-white">XXL</button>
      </div>
    </div>
    <div class="mt-4">
      <h4 class="text-gray-700 font-semibold">Color:</h4>
      <div class="flex space-x-2 mt-2">
        <button class="w-6 h-6 rounded-full bg-blue-500"></button>
        <button class="w-6 h-6 rounded-full bg-black"></button>
        <button class="w-6 h-6 rounded-full bg-pink-500"></button>
      </div>
    </div>

      <div class="flex flex-col space-y-2 mt-4">
          <label class="text-gray-700 font-medium">Quantity:</label>
          <div class="flex items-center space-x-4">
              <div class="flex items-center border rounded-lg overflow-hidden w-28">
                  <!-- Botón de disminuir cantidad -->
                  <button type="button" class="px-3 py-2  text-gray-700 hover:bg-gray-300" onclick="decreaseQuantity()">
                      -
                  </button>
                  
                  <!-- Input de cantidad -->
                  <input type="text" id="quantity" value="1" class="w-full text-center border-l border-r bg-white focus:outline-none" readonly>
                  
                  <!-- Botón de aumentar cantidad -->
                  <button type="button" class="px-3 py-2  text-gray-700 hover:bg-gray-300" onclick="increaseQuantity()">
                      +
                  </button>
              </div>

              <!-- Botón de añadir al carrito -->
              <button class="w-full py-2 border border-black rounded-lg bg-white text-black hover:bg-darkerGray transition">
                  Add to cart
              </button>
          </div>
      
          
      </div>

      <x-icons-feature></x-icons-feature>

      <x-deliveryinfo></x-deliveryinfo>

      <div className="w-full mt-6">
        <img 
          src="/images/banner-product.png" 
          alt="Payment Methods" 
          className="w-full"
        />
      </div>
  </div>

</div>


</body>
</html>