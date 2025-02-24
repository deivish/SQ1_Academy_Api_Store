<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>
    <!-- Header -->
    <x-header></x-header>

<!-- Banner Content -->
<div class="w-full h-[826px] bg-[#DBD0CCCC] flex items-center gap-5 p-5">
  <div class="flex-1 text-right">
    <img src="{{ asset('images/image1.png') }}" alt="" class="inline-block" />
  </div>

  <div class="flex-1 font-poppins">
    <span class="text-2xl mb-2 block">HOT DEALS THIS WEEK</span>
    <h2 class="text-5xl mb-2 text-secondLighter font-bold">SALE UP 50% <br>
    MODERN FURNITURE</h2>
    <button
      class="w-[124px] h-[48px] rounded-md border border-black bg-transparent text-xl transition-all duration-300 hover:border-white hover:bg-secondLighter hover:text-white"
    >
      View now
    </button>
  </div>
</div>

<!-- Brands -->
<div class="w-full h-[200px] flex flex-wrap justify-center items-center gap-8 p-5">
  <img src="{{ asset('images/brands/chanel.png') }}" alt="Chanel" class="w-[140px] sm:w-[160px] md:w-[180px] h-auto object-contain">
  <img src="{{ asset('images/brands/vuitton.png') }}" alt="Louis Vuitton" class="w-[140px] sm:w-[160px] md:w-[180px] h-auto object-contain">
  <img src="{{ asset('images/brands/prada.png') }}" alt="Prada" class="w-[140px] sm:w-[160px] md:w-[180px] h-auto object-contain">
  <img src="{{ asset('images/brands/klein.png') }}" alt="Calvin Klein" class="w-[140px] sm:w-[160px] md:w-[180px] h-auto object-contain">
  <img src="{{ asset('images/brands/denim.png') }}" alt="Denim" class="w-[140px] sm:w-[160px] md:w-[180px] h-auto object-contain">
</div>


<!-- New Arrivals -->
<main class="container mx-auto p-6">
  <section class="space-y-6">
    <div class="text-center">
      <h2 class="text-3xl font-bold">New Arrivals</h2>
      <p class="text-gray-600 max-w-2xl mx-auto mt-3 mb-8">
        Discover our exciting new arrivals, featuring the latest trends and styles to refresh your wardrobe this season.
      </p>
    </div>
<!-- Buttons Filters Arrivals -->
    <nav class="flex flex-wrap justify-center gap-4">
      <button class="px-4 py-2 bg-gray-100 text-gray-500 font-poppins rounded-2xl transition-all duration-300 hover:shadow-md hover:text-black">Men’s Fashion</button>
      <button class="px-4 py-2 font-poppins rounded-2xl transition-all duration-300 bg-primary text-white">Women’s Fashion</button>
      <button class="px-4 py-2 bg-gray-100 text-gray-500 font-poppins rounded-2xl transition-all duration-300 hover:shadow-md hover:text-black">Women Accessories</button>
      <button class="px-4 py-2 bg-gray-100 text-gray-500 font-poppins rounded-2xl transition-all duration-300 hover:shadow-md hover:text-black">Men Accessories</button>
      <button class="px-4 py-2 bg-gray-100 text-gray-500 font-poppins rounded-2xl transition-all duration-300 hover:shadow-md hover:text-black">Discount Deals</button>
    </nav>
    
    <!-- Carts Arrivals -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 font-poppins">
      <article class="border rounded-lg p-4 shadow-md">
        <img class="w-full rounded-lg" src="//wearoldmoney.com/cdn/shop/products/image_3c93e616-8815-4fcc-a2c4-07595ab6fedd.jpg?v=1699118165&width=750" alt="OLD MONEY Suéter con media cremallera" />
        <h3 class="text-lg mt-2">OLD MONEY Suéter con media cremallera</h3>
        <span class="text-gray-500">Gucci</span>
        <div class="mt-2">
          <span class="text-red-500 font-bold">$95.50</span>
          <span class="text-gray-400 line-through">$120.00</span>
        </div>
        <div class="flex gap-2 mt-2">
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(13, 4, 22)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(84, 78, 88)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(60, 75, 47)"></button>
        </div>
        <button class="mt-4 w-full py-2 border border-primary bg-transparent text-primary rounded-lg hover:bg-primary hover:text-white">Comprar</button>
      </article>
      <article class="border rounded-lg p-4 shadow-md">
        <img class="w-full rounded-lg" src="//wearoldmoney.com/cdn/shop/products/image_3c93e616-8815-4fcc-a2c4-07595ab6fedd.jpg?v=1699118165&width=750" alt="OLD MONEY Suéter con media cremallera" />
        <h3 class="text-lg mt-2">OLD MONEY Suéter con media cremallera</h3>
        <span class="text-gray-500">Gucci</span>
        <div class="mt-2">
          <span class="text-red-500 font-bold">$95.50</span>
          <span class="text-gray-400 line-through">$120.00</span>
        </div>
        <div class="flex gap-2 mt-2">
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(13, 4, 22)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(84, 78, 88)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(60, 75, 47)"></button>
        </div>
        <button class="mt-4 w-full py-2  border border-primary bg-transparent text-primary rounded-lg hover:bg-primary hover:text-white">Comprar</button>
      </article>
      <article class="border rounded-lg p-4 shadow-md">
        <img class="w-full rounded-lg" src="//wearoldmoney.com/cdn/shop/products/image_3c93e616-8815-4fcc-a2c4-07595ab6fedd.jpg?v=1699118165&width=750" alt="OLD MONEY Suéter con media cremallera" />
        <h3 class="text-lg mt-2">OLD MONEY Suéter con media cremallera</h3>
        <span class="text-gray-500">Gucci</span>
        <div class="mt-2">
          <span class="text-red-500 font-bold">$95.50</span>
          <span class="text-gray-400 line-through">$120.00</span>
        </div>
        <div class="flex gap-2 mt-2">
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(13, 4, 22)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(84, 78, 88)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(60, 75, 47)"></button>
        </div>
        <button class="mt-4 w-full py-2 border border-primary bg-transparent text-primary rounded-lg hover:bg-primary hover:text-white">Comprar</button>
      </article>
      <article class="border rounded-lg p-4 shadow-md">
        <img class="w-full rounded-lg" src="//wearoldmoney.com/cdn/shop/products/image_3c93e616-8815-4fcc-a2c4-07595ab6fedd.jpg?v=1699118165&width=750" alt="OLD MONEY Suéter con media cremallera" />
        <h3 class="text-lg mt-2">OLD MONEY Suéter con media cremallera</h3>
        <span class="text-gray-500">Gucci</span>
        <div class="mt-2">
          <span class="text-red-500 font-bold">$95.50</span>
          <span class="text-gray-400 line-through">$120.00</span>
        </div>
        <div class="flex gap-2 mt-2">
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(13, 4, 22)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(84, 78, 88)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(60, 75, 47)"></button>
        </div>
        <button class="mt-4 w-full py-2 border border-primary bg-transparent text-primary rounded-lg hover:bg-primary hover:text-white">Comprar</button>
      </article>
      <article class="border rounded-lg p-4 shadow-md">
        <img class="w-full rounded-lg" src="//wearoldmoney.com/cdn/shop/products/image_3c93e616-8815-4fcc-a2c4-07595ab6fedd.jpg?v=1699118165&width=750" alt="OLD MONEY Suéter con media cremallera" />
        <h3 class="text-lg mt-2">OLD MONEY Suéter con media cremallera</h3>
        <span class="text-gray-500">Gucci</span>
        <div class="mt-2">
          <span class="text-red-500 font-bold">$95.50</span>
          <span class="text-gray-400 line-through">$120.00</span>
        </div>
        <div class="flex gap-2 mt-2">
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(13, 4, 22)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(84, 78, 88)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(60, 75, 47)"></button>
        </div>
        <button class="mt-4 w-full py-2 border border-primary bg-transparent text-primary rounded-lg hover:bg-primary hover:text-white">Comprar</button>
      </article>
      <article class="border rounded-lg p-4 shadow-md">
        <img class="w-full rounded-lg" src="//wearoldmoney.com/cdn/shop/products/image_3c93e616-8815-4fcc-a2c4-07595ab6fedd.jpg?v=1699118165&width=750" alt="OLD MONEY Suéter con media cremallera" />
        <h3 class="text-lg  mt-2">OLD MONEY Suéter con media cremallera</h3>
        <span class="text-gray-500">Gucci</span>
        <div class="mt-2">
          <span class="text-red-500 font-bold">$95.50</span>
          <span class="text-gray-400 line-through">$120.00</span>
        </div>
        <div class="flex gap-2 mt-2">
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(13, 4, 22)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(84, 78, 88)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(60, 75, 47)"></button>
        </div>
        <button class="mt-4 w-full py-2 border border-primary bg-transparent text-primary rounded-lg hover:bg-primary hover:text-white">Comprar</button>
      </article>
      <article class="border rounded-lg p-4 shadow-md">
        <img class="w-full rounded-lg" src="//wearoldmoney.com/cdn/shop/products/image_3c93e616-8815-4fcc-a2c4-07595ab6fedd.jpg?v=1699118165&width=750" alt="OLD MONEY Suéter con media cremallera" />
        <h3 class="text-lg mt-2">OLD MONEY Suéter con media cremallera</h3>
        <span class="text-gray-500">Gucci</span>
        <div class="mt-2">
          <span class="text-red-500 font-bold">$95.50</span>
          <span class="text-gray-400 line-through">$120.00</span>
        </div>
        <div class="flex gap-2 mt-2">
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(13, 4, 22)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(84, 78, 88)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(60, 75, 47)"></button>
        </div>
        <button class="mt-4 w-full py-2 border border-primary bg-transparent text-primary rounded-lg hover:bg-primary hover:text-white">Comprar</button>
      </article>
      <article class="border rounded-lg p-4 shadow-md">
        <img class="w-full rounded-lg" src="//wearoldmoney.com/cdn/shop/products/image_3c93e616-8815-4fcc-a2c4-07595ab6fedd.jpg?v=1699118165&width=750" alt="OLD MONEY Suéter con media cremallera" />
        <h3 class="text-lg mt-2">OLD MONEY Suéter con media cremallera</h3>
        <span class="text-gray-500">Gucci</span>
        <div class="mt-2">
          <span class="text-red-500 font-bold">$95.50</span>
          <span class="text-gray-400 line-through">$120.00</span>
        </div>
        <div class="flex gap-2 mt-2">
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(13, 4, 22)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(84, 78, 88)"></button>
          <button class="w-5 h-5 rounded-full" style="background-color: rgb(60, 75, 47)"></button>
        </div>
        <button class="mt-4 w-full py-2 border border-primary bg-transparent text-primary rounded-lg hover:bg-primary hover:text-white">Comprar</button>
      </article>
    </div>
  </section>
  
</main>
<div class="flex justify-center items-center ">
  <button class="w-[207px] h-[56px] px-6 py-4 text-[18px] border border-primary rounded-2xl text-white bg-primary transition-all duration-300 cursor-pointer mt-12 mb-20 hover:shadow-[1px_1px_49px_-3px_rgba(0,0,0,0.55)]">
    View More
  </button>
</div>

<!-- Banner Summer Season Sale -->
<div class="relative flex items-center justify-center w-full h-[443px] bg-gray-200 overflow-hidden mb-0 pb-0">
    <img src="/images/banner.png" alt="" 
        class="w-full h-[443px] object-cover filter blur-[2px] brightness-[55%] clip-path-inset-[0_0_30%_0]">
    
    <div class="absolute top-[70px] text-center flex flex-col items-center">
        <span class="text-4xl text-white font-poppins">Extra 30% Off Online</span>
        <h3 class="text-6xl text-white font-poppins">Summer Season Sale</h3>
        <p class="text-xl text-white font-poppins max-w-[514px] mx-auto">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vel dolor pellentesque, 
            varius elit quis, malesuada quam.
        </p>
        <button class="mt-12 mb-20 w-[135px] h-[50px]  text-xl border border-primary rounded-2xl 
            text-white bg-primary transition-all duration-300 hover:bg-white hover:text-primary shadow-lg">
            Shop Now
        </button>
    </div>
</div>

<!-- Features Containers Icons -->
<div class="flex flex-wrap justify-center items-center bg-white p-12 gap-6">
  <div class="flex items-center max-w-full gap-4">
    <img src="/images/icons/hand.png" alt="High Quality" class="w-12 h-auto" />
    <div class="flex flex-col text-left">
      <h3 class="text-2xl text-black opacity-70">High Quality</h3>
      <p class="text-sm text-gray-600">crafted from top materials</p>
    </div>
  </div>
  <div class="flex items-center max-w-full gap-4">
    <img src="/images/icons/medal.png" alt="Warranty Protection" class="w-12 h-auto" />
    <div class="flex flex-col text-left">
      <h3 class="text-2xl text-black opacity-70">Warranty Protection</h3>
      <p class="text-sm text-gray-600">Over 2 years</p>
    </div>
  </div>
  <div class="flex items-center max-w-full gap-4">
    <img src="/images/icons/box.png" alt="Free Shipping" class="w-12 h-auto" />
    <div class="flex flex-col text-left">
      <h3 class="text-2xl text-black opacity-70">Free Shipping</h3>
      <p class="text-sm text-gray-600">Order over 150 $</p>
    </div>
  </div>
  <div class="flex items-center max-w-full gap-4">
    <img src="/images/icons/phone.png" alt="24/7 Support" class="w-12 h-auto" />
    <div class="flex flex-col text-left">
      <h3 class="text-2xl text-black opacity-70">24 / 7 Support</h3>
      <p class="text-sm text-gray-600">Dedicated support</p>
    </div>
  </div>
</div>


<footer class="w-full border-t border-gray-300 p-4 transition-all duration-150">
  <div class="w-full max-w-6xl mx-auto flex flex-wrap items-center gap-6 justify-center md:justify-between">
    <a href="/index.html">
      <img src="/images/logo.svg" alt="Square1 Academy Store Logo" width="90" height="28" class="w-24 h-auto" />
    </a>

    <nav class="flex flex-wrap justify-center gap-6">
      <a href="#" class="capitalize text-black transition-all duration-150 text-lg font-poppins hover:text-blue-500">Support Center</a>
      <a href="#" class="capitalize text-black transition-all duration-150 text-lg font-poppins hover:text-blue-500">Invoicing</a>
      <a href="#" class="capitalize text-black transition-all duration-150 text-lg font-poppins hover:text-blue-500">Contract</a>
      <a href="#" class="capitalize text-black transition-all duration-150 text-lg font-poppins hover:text-blue-500">Careers</a>
      <a href="#" class="capitalize text-black transition-all duration-150 text-lg font-poppins hover:text-blue-500">Blogs</a>
      <a href="#" class="capitalize text-black transition-all duration-150 text-lg font-poppins hover:text-blue-500">FAQs</a>
    </nav>
  </div>
</footer>


</body>
</html>