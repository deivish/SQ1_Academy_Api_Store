<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-white">
    <!-- Header -->
    <div class="w-full">
    <x-header></x-header>
<!-- Contenedor -->
<div class="flex items-center justify-between w-full p-4  font-volkhov">
  <!-- Sección Izquierda -->
  <div class="flex gap-8 ml-8 items-end">
    <h2 class="text-3xl font-semibold ">Filters</h2>
    <button class="text-primary text-sm font-medium hover:underline"
    onclick="removeFilters()">
    Remove Filters
</button>
    <div class="relative">
      <select class="text-sm font-medium border-none outline-none cursor-pointer">
        <option>Best selling</option>
        <option>Price: Low to High</option>
        <option>Price: High to Low</option>
        <option>Newest</option>
      </select>
    </div>
  </div>

  <!-- Sección Derecha (Iconos de vista) -->
  <div class="flex items-center gap-2">
    <button class="p-2 rounded-md bg-gray-100 hover:bg-gray-200">
    <img src="/images/icons/bar1.png" alt="Carrito de compras" class="h-6" />
    </button>
    <button class="p-2 rounded-md bg-gray-100 hover:bg-gray-200">
    <img src="/images/icons/bar2.png" alt="Carrito de compras" class="h-6" />
    </button>
    <button class="p-2 rounded-md bg-gray-100 hover:bg-gray-200">
    <img src="/images/icons/bar3.png" alt="Carrito de compras" class="h-6" />
    </button>
    <button class="p-2 rounded-md bg-gray-100 hover:bg-gray-200">
    <img src="/images/icons/bar4.png" alt="Carrito de compras" class="h-6" />
    </button>
    <button class="p-2 rounded-md bg-gray-100 hover:bg-gray-200">
    <img src="/images/icons/bar5.png" alt="Carrito de compras" class="h-6" />
    </button>
  </div>
</div>

<div class="flex gap-5 m-5">
    <!-- Columna de Filtros -->
    <div class="w-1/4 p-5 rounded-lg box-border">
        <!-- Filtro de Tallas -->
        <div class="mb-5">
            <h4 class="text-xl font-volkhov text-black">Size</h4>
            <form action="{{ route('search') }}" method="GET">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    <input type="hidden" name="size" id="size-input">
                    <button  type="submit" class=" size-filter w-12 h-12 rounded-lg border border-gray-400 text-gray-400 text-2xl font-sans transition hover:text-blue-500 hover:border-blue-500" data-size="M" >M</button>
                    <button  type="submit" class=" size-filter w-12 h-12 rounded-lg border border-gray-400 text-gray-400 text-2xl font-sans transition hover:text-blue-500 hover:border-blue-500" data-size="L" >L</button>
                    <button  type="submit" class=" size-filter w-12 h-12 rounded-lg border border-gray-400 text-gray-400 text-2xl font-sans transition hover:text-blue-500 hover:border-blue-500" data-size="XL" >XL</button>
                    <button  type="submit" class=" size-filter w-12 h-12 rounded-lg border border-gray-400 text-gray-400 text-2xl font-sans transition hover:text-blue-500 hover:border-blue-500" data-size="S" >S</button>
                </div>
            </form>
        </div>

        <!-- Filtro de Colores -->
        <div class="mb-5">
            <h4 class="text-xl font-volkhov text-black">Colors</h4>
            <form action="{{ route('search') }}" method="GET" id="color-filter-form">
                <div class="grid grid-cols-6 gap-2">
                    <input type="hidden" name="color" id="color-input">
                    <button type="submit" class="w-10 h-10 rounded-full border border-transparent transition hover:border-blue-500" style="background-color: #2980b9" onclick="setColor(event, 'Blue')"></button>
                    <button type="submit" class="w-10 h-10 rounded-full border border-transparent transition hover:border-blue-500" style="background-color: #dfe6e9" onclick="setColor(event, 'White')"></button>
                    <button type="submit" class="w-10 h-10 rounded-full border border-transparent transition hover:border-blue-500" style="background-color: #fab1a0" onclick="setColor(event, 'Pink')"></button>
                    <button type="submit" class="w-10 h-10 rounded-full border border-transparent transition hover:border-blue-500" style="background-color: #fbc531" onclick="setColor(event, 'Yellow')"></button>
                    <button type="submit" class="w-10 h-10 rounded-full border border-transparent transition hover:border-blue-500" style="background-color: #c0392b" onclick="setColor(event, 'Red')"></button>
                    <button type="submit" class="w-10 h-10 rounded-full border border-transparent transition hover:border-blue-500" style="background-color: #2d3436" onclick="setColor(event, 'Black')"></button>
                </div>
            </form>
        </div>

        <script>
            function setColor(color) {
                event.preventDefault();
                document.getElementById('color-input').value = color;
                event.target.closest('form').submit();
            }
        </script>

        <!-- Filtro de Precios -->
        <div class="mb-5">
            <h4 class="text-xl font-volkhov text-black">Prices</h4>
            <div class="flex flex-col gap-2 text-2xl text-gray-500 font-sans items-start">
                <button class="price-filter hover:text-blue-500" data-min="0" data-max="50">$0-$50</button>
                <button class="price-filter hover:text-blue-500" data-min="50" data-max="100">$50-$100</button>
                <button class="price-filter hover:text-blue-500" data-min="100" data-max="150">$100-$150</button>
                <button class="price-filter hover:text-blue-500" data-min="150" data-max="200">$150-$200</button>
                <button class="price-filter hover:text-blue-500" data-min="200" data-max="400">$300-$400</button>
            </div>
        </div>

        <!-- Filtro de Brands -->
        <div class="mb-5">
            <h4 class="text-xl font-volkhov text-black mb-3">Brands</h4>
            <div class="grid grid-cols-3 gap-4 text-gray-500 font-poppins text-2xl">
                <button data-brand="Minimog" class="hover:text-blue-500">Minimog</button>
                <button data-brand="Retrolie" class="hover:text-blue-500">Retrolie</button>
                <button data-brand="Brook" class="hover:text-blue-500">Brook</button>
                <button data-brand="Learts" class="hover:text-blue-500">Learts</button>
                <button data-brand="Abby" class="hover:text-blue-500">Abby</button>
            </div>
        </div>


        <!-- Filtro de Colecciones -->
        <div class="mb-5">
            <h4 class="text-xl font-volkhov text-black">Collections</h4>
            <ul class="space-y-2 text-gray-500 text-2xl">
                <li><input type="checkbox" id="collection1"> <label for="collection1">All products</label></li>
                <li><input type="checkbox" id="collection2"> <label for="collection2">Best sellers</label></li>
                <li><input type="checkbox" id="collection3"> <label for="collection3">New arrivals</label></li>
                <li><input type="checkbox" id="collection4"> <label for="collection4">Accessories</label></li>
            </ul>
        </div>

        <!-- Filtro de Tags
        <div class="mb-5">
            <h4 class="text-xl font-serif text-black">Tags</h4>
            <ul class="space-y-2 text-gray-500 text-2xl">
                <li><input type="checkbox" id="tag1"> <label for="tag1">Fashion</label></li>
                <li><input type="checkbox" id="tag2"> <label for="tag2">Hats</label></li>
                <li><input type="checkbox" id="tag3"> <label for="tag3">Sandal</label></li>
                <li><input type="checkbox" id="tag4"> <label for="tag4">Belt</label></li>
                <li><input type="checkbox" id="tag5"> <label for="tag5">Bags</label></li>
                <li><input type="checkbox" id="tag6"> <label for="tag6">Sneaker</label></li>
                <li><input type="checkbox" id="tag7"> <label for="tag7">Denim</label></li>
                <li><input type="checkbox" id="tag8"> <label for="tag8">Minimog</label></li>
                <li><input type="checkbox" id="tag9"> <label for="tag9">Vagabond</label></li>
                <li><input type="checkbox" id="tag10"> <label for="tag10">Sunglasses</label></li>
                <li><input type="checkbox" id="tag11"> <label for="tag11">Beachwear</label></li>
            </ul>
        </div>-->
    </div> 

    <!-- Columna de Tarjetas -->
    @if(isset($products) && $products->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3  gap-6 mt-6 w-3/4">

    @foreach ($products as $product)
            <article class="bg-white font-volkhov overflow-hidden p-4">
                <img class="w-full h-60 object-cover"
                    src="{{ $product->image ?? 'https://wearoldmoney.com/cdn/shop/files/IMG-4556.jpg?v=1713167164&width=800' }}" 
                    alt="{{ $product->name }}" />
                
                <h3 class="text-lg font-semibold mt-4">{{ $product->name }}</h3>

                <!-- Muestra las tallas disponibles para este producto -->
                @if($showSize)
                    <div class="flex gap-2 mt-3">
                        @foreach ($product->variants as $variant)
                            <span class="px-2 py-1 text-sm ">{{ $variant->size }}</span>
                        @endforeach
                    </div>
                @endif


                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">${{ number_format($product->price, 2) }}</span>
                    @if ($product->old_price)
                        <span class="text-sm line-through text-gray-400">${{ number_format($product->old_price, 2) }}</span>
                    @endif
                </div>

                
                <div class="flex gap-2 mt-3">
                    @foreach (explode(',', $product->colors) as $color)
                        <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500 product-card"
                            style="background-color: {{ $color }}"></button>
                    @endforeach
                </div>
            </article>
        @endforeach
            
            <!-- <article class="bg-white font-volkhov  overflow-hidden p-4 ">
                <img class="w-full h-60 object-cover "
                    src="https://wearoldmoney.com/cdn/shop/files/main-image-1_4620b553-657d-4ead-b0eb-ee33fe91bf2b.jpg?v=1705945350&width=1000"
                    alt="Otro Producto" />
                <h3 class="text-lg font-semibold mt-4">OLD MONEY Suéter</h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">$85.50</span>
                    <span class="text-sm line-through text-gray-400">$110.00</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(201, 196, 199)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(84, 78, 88)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(146, 58, 109)"></button>
                </div>
            </article>

            <article class="bg-white font-volkhov rounded-2xl overflow-hidden p-4">
                <img class="w-full h-60 object-cover "
                    src="https://wearoldmoney.com/cdn/shop/files/IMG-4556.jpg?v=1713167164&width=800"
                    alt="Otro Producto" />
                <h3 class="text-lg font-semibold mt-4">OLD MONEY Suéter</h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">$85.50</span>
                    <span class="text-sm line-through text-gray-400">$110.00</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(201, 196, 199)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(84, 78, 88)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(146, 58, 109)"></button>
                </div>
            </article>

            <article class="bg-white font-volkhov rounded-2xl overflow-hidden p-4">
                <img class="w-full h-60 object-cover "
                    src="https://wearoldmoney.com/cdn/shop/files/IMG-4557.jpg?v=1709161451&width=800"
                    alt="Otro Producto" />
                <h3 class="text-lg font-semibold mt-4">OLD MONEY Suéter</h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">$85.50</span>
                    <span class="text-sm line-through text-gray-400">$110.00</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(201, 196, 199)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(84, 78, 88)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(146, 58, 109)"></button>
                </div>
            </article>

            <article class="bg-white font-volkhov rounded-2xl overflow-hidden p-4">
                <img class="w-full h-60 object-cover "
                    src="https://wearoldmoney.com/cdn/shop/files/IMG-4555.jpg?v=1713167164&width=800"
                    alt="Otro Producto" />
                <h3 class="text-lg font-semibold mt-4">OLD MONEY Suéter</h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">$85.50</span>
                    <span class="text-sm line-through text-gray-400">$110.00</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(201, 196, 199)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(84, 78, 88)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(146, 58, 109)"></button>
                </div>
            </article>

            <article class="bg-white font-volkhov rounded-2xl overflow-hidden p-4">
                <img class="w-full h-60 object-cover "
                    src="https://wearoldmoney.com/cdn/shop/files/main-image-1_8b6e9e69-ac97-4c16-8faf-056bea95ca23.jpg?v=1705941738&width=1000"
                    alt="Otro Producto" />
                <h3 class="text-lg font-semibold mt-4">OLD MONEY Suéter</h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">$85.50</span>
                    <span class="text-sm line-through text-gray-400">$110.00</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(201, 196, 199)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(84, 78, 88)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(146, 58, 109)"></button>
                </div>
            </article>

            <article class="bg-white font-volkhov rounded-2xl overflow-hidden p-4">
                <img class="w-full h-60 object-cover "
                    src="https://wearoldmoney.com/cdn/shop/files/006_2ae361d2-3549-4b43-8331-0c858f6c5a4e.jpg?v=1702477794&width=700"
                    alt="Otro Producto" />
                <h3 class="text-lg font-semibold mt-4">OLD MONEY Suéter</h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">$85.50</span>
                    <span class="text-sm line-through text-gray-400">$110.00</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(201, 196, 199)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(84, 78, 88)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(146, 58, 109)"></button>
                </div>
            </article>

            <article class="bg-white font-volkhov rounded-2xl overflow-hidden p-4">
                <img class="w-full h-60 object-cover "
                    src="https://wearoldmoney.com/cdn/shop/files/004.jpg?v=1702477794&width=700"
                    alt="Otro Producto" />
                <h3 class="text-lg font-semibold mt-4">OLD MONEY Suéter</h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">$85.50</span>
                    <span class="text-sm line-through text-gray-400">$110.00</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(201, 196, 199)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(84, 78, 88)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(146, 58, 109)"></button>
                </div>
            </article>

            <article class="bg-white font-volkhov rounded-2xl overflow-hidden p-4">
                <img class="w-full h-60 object-cover "
                    src="https://wearoldmoney.com/cdn/shop/files/007_9a09dd58-7bf8-43df-9f56-188a94eb553e.jpg?v=1704580172&width=600"
                    alt="Otro Producto" />
                <h3 class="text-lg font-semibold mt-4">Otro Producto</h3>
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-lg font-bold text-red-500">$85.50</span>
                    <span class="text-sm line-through text-gray-400">$110.00</span>
                </div>
                <div class="flex gap-2 mt-3">
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(201, 196, 199)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(84, 78, 88)"></button>
                    <button class="w-5 h-5 rounded-full border border-gray-300 transition hover:border-gray-500" style="background-color: rgb(146, 58, 109)"></button>
                </div>
            </article> -->
        </div>
</div>
 <!-- Enlaces de paginación -->
 <div class="mt-6 flex justify-center">
        {{ $products->links() }}
    </div>
@else
    <p class="text-center text-gray-500">No hay productos disponibles.</p>
@endif

<!-- Envia el color seleccionado a la tarjeta -->
<script>
    function setColor(event, color) {
        event.preventDefault(); // Evita el envío automático del formulario

        document.getElementById('color-input').value = color; // Guarda el color en el input oculto
        localStorage.setItem('selectedColor', color); // Guarda el color en localStorage

        document.getElementById('color-filter-form').submit(); // Envía el formulario manualmente
    }

    // Al cargar la página, verifica si hay un color almacenado y cambia el fondo de las tarjetas
    document.addEventListener("DOMContentLoaded", function () {
        const selectedColor = localStorage.getItem('selectedColor');
        if (selectedColor) {
            document.querySelectorAll('.product-card').forEach(card => {
                card.style.backgroundColor = selectedColor; // Aplica el color de fondo a las tarjetas
            });
        }
    });
</script>
<!-- Remueve los filtros en mi vista -->
<script>
    function removeFilters() {
        localStorage.removeItem('selectedColor'); // Elimina el color almacenado
        window.location.href = "{{ route('search') }}"; // Recarga la página sin filtros
    }
</script>

<!-- Script para manejar selección de talla -->
<script>
    document.querySelectorAll('.size-filter').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe inmediatamente
            document.getElementById('size-input').value = this.dataset.size;
            this.closest('form').submit(); // Envía el formulario con la talla seleccionada
        });
    });
</script>

<!-- Script para filtrar por precios -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".price-filter");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const minPrice = this.getAttribute("data-min");
            const maxPrice = this.getAttribute("data-max");

            // Obtener los parámetros actuales de la URL
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set("min_price", minPrice);
            urlParams.set("max_price", maxPrice);

            // Redirigir con los nuevos parámetros (método GET)
            window.location.href = window.location.pathname + "?" + urlParams.toString();
        });
    });
});
</script>

</body>
</html>
