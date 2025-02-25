<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>
  <!-- Header -->
  <x-header></x-header>

    
  <div class="text-4xl font-bold text-center my-6 font-volkhov mt-8">Checkout</div>
    <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 p-6">
        <!-- Columna Izquierda -->
        <div class="space-y-6">
            <!-- Formulario de Contact -->
            <div class="bg-white rounded-lg p-6">
                <div class="flex justify-between items-end">
                <h1 class="text-4xl text-grayDarker font-semibold font-volkhov">Contact</h1>
                <p class="text-sm text-gray-600 ">Have an account? <a href="#" class="text-blue-600">Create Account</a></p>
                </div>
                <input type="email" placeholder="Email Address" class="w-full mt-4 p-2 border rounded-lg font-poppins" required>
            </div>
            
            <!-- Formulario de Delivery -->
            <div class="bg-white rounded-lg p-6">
                <h1 class="text-4xl text-grayDarker font-semibold font-volkhov">Delivery</h1>
                <select class="w-full mt-4 p-2 border rounded-lg font-poppins text-gray" required>
                    <option value="" disabled selected>Country / Region</option>
                    <option value="us">United States</option>
                    <option value="uk">United Kingdom</option>
                    <option value="ca">Canada</option>
                </select>
                <div class="grid grid-cols-2 gap-4 mt-4 font-poppins">
                    <input type="text" placeholder="First Name" class="w-full p-2 border rounded-lg" required>
                    <input type="text" placeholder="Last Name" class="w-full p-2 border rounded-lg" required>
                </div>
                <input type="text" placeholder="Address" class="w-full mt-4 p-2 border rounded-lg font-poppins" required>
                <div class="grid grid-cols-2 gap-4 mt-4 font-poppins">
                    <input type="text" placeholder="City" class="w-full p-2 border rounded-lg" required>
                    <input type="text" placeholder="Postal Code" class="w-full p-2 border rounded-lg" required>
                </div>
                <label class="flex items-center mt-4 font-poppins text-gray">
                    <input type="checkbox" class="mr-2 "> Save This Info For Future
                </label>
            </div>
            
            <!-- Formulario de Payment -->
            <div class="bg-gray-100 rounded-lg p-6">
                <h1 class="text-4xl text-grayDarker font-semibold font-volkhov">Payment</h1>
                <select class="w-full block mt-4 p-2 border rounded-lg text-gray font-poppins" required>
                    <option value="" disabled selected>Credit Card</option>
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                </select>
                <input type="text" placeholder="Card Number" class="w-full mt-4 p-2 border rounded-lg font-poppins" required>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <input type="text" placeholder="Expiration Date" class="w-full p-2 border rounded-lg font-poppins" required>
                    <input type="text" placeholder="Security Code" class="w-full p-2 border rounded-lg font-poppins" required>
                </div>
                <input type="text" placeholder="Card Holder Name" class="w-full mt-4 p-2 border rounded-lg font-poppins" required>
                <label class="flex items-center mt-4 font-poppins text-gray">
                    <input type="checkbox" class="mr-2"> Save This Info For Future
                </label>
                <button class="w-full bg-primary text-white py-2 rounded-lg mt-6">Pay Now</button>
            </div>
        </div>
        
        <!-- Columna Derecha -->
        <div class="bg-gray-100 shadow-md  p-6">
            <div class="flex items-center gap-4 mt-4">
                <img src="https://wearoldmoney.com/cdn/shop/files/old_money_t-shirt_white.jpg" alt="Mini Dress" class="w-20 h-20 object-cover ">
                <div>
                    <h4 class="font-semibold font-volkhov text-primary">Mini Dress With Ruffled Straps</h4>
                    <div class="flex justify-between text-sm text-gray-600 font-poppins">
                        <p>Red</p>
                        <p class="font-bold">$100.00</p>
                    </div>
                </div>
            </div>
            <div class="mt-6 border-t pt-4">
                <div class="flex justify-between text-sm text-gray-600 font-poppins">
                    <span>Subtotal</span>
                    <span>$100.00</span>
                </div>
                <div class="flex justify-between text-sm text-gray-600 mt-2 font-poppins">
                    <span>Shipping</span>
                    <span>$40.00</span>
                </div>
                <div class="flex justify-between text-lg font-bold mt-4">
                    <span>Total</span>
                    <span class="text-primary">$140.00</span>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>