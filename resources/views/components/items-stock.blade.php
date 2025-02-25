<div class="mt-4 text-sm text-gray-700">
        <div class="flex flex-col items-start  py-2">
            @php
                $totalStock = 50; 
                $stockDisponible = 9; 
                $porcentaje = ($stockDisponible / $totalStock) * 100;
            @endphp

            <p class="text-gray-700 text-sm font-semibold">
                Only <span class="text-black font-bold">{{ $stockDisponible }}</span> item(s) left in stock!
            </p>

            <div class="w-full bg-gray-300 rounded-full h-2 mt-1">
                <div class="bg-red-500 h-2 rounded-full" style="width: {{ $porcentaje }}%;"></div>
            </div>
        </div>
  </div>