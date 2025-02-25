<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
<!-- Header -->
<x-header></x-header>


<div class="max-w-5xl mx-auto p-6">
    <div class="text-center mb-6">
        <h1 class="text-4xl font-bold font-volkhov mt-8">Shopping Cart</h1>
        <p class="text-lg text-gray-600 mt-3 mb-14">
            <a href="#" class="text-black font-jost">Home</a> <span class="mx-2 font-jost">></span> Your Shopping Cart
        </p>
    </div>

    <div class="w-full border-b-2 pb-3 grid grid-cols-[1fr_1fr_1fr_auto] text-lg font-volkhov font-semibold text-black ">
        <div>Product</div>
        <div>Price</div>
        <div>Quantity</div>
        <div class="place-items-start">Total</div>
    </div>
    
    <div class="w-full grid grid-cols-[1fr_1fr_1fr_auto] items-start py-4 border-b font-volkhov">
        <div class="flex items-start gap-4">
            <img src="https://wearoldmoney.com/cdn/shop/files/old_money_t-shirt_white.jpg" alt="Product Image" class="w-40 h-auto border">
            <div class="flex flex-col gap-2">
                <div class="font-bold text-lg">Mini Dress With Ruffled Straps</div>
                <div class="text-gray-500">Color: Red</div>
                <a href="#" class="text-gray border-b-2 w-fit">Remove</a>
            </div>
        </div>
        <div class="text-left text-lg">$14.90</div>
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
        <div class="text-center text-lg font-bold">$14.90</div>
    </div>

    <div class="max-w-md ml-auto mt-6">
        <label class="flex items-center gap-2 mb-4 text-gray-600 font-poppins">
            <input type="checkbox" class="w-5 h-5 accent-black border-2 border-black">
            <span>For <span class="text-black font-bold">$10.00 </span>Please Wrap The Product</span>
        </label>
        <hr class="my-4">
        <div class="flex justify-between text-lg mb-4 font-volkhov">
            <span class="text-black font-bold">Subtotal</span>
            <span class="font-bold ">$100.00</span>
        </div>
        <div class="flex justify-between text-lg mb-4 font-volkhov">
            <span class="text-black font-bold">Sipping</span>
            <span class="font-bold">Free</span>
        </div>
        <button class="w-full bg-primary text-white py-3 text-lg font-bold rounded shadow-md hover:bg-black font-poppins">Comprar</button>
        
    </div>
</div>

</body>
</html>