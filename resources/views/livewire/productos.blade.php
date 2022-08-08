<div>
    <div>
        @if ($message == 'success')
            <div class="py-3 px-5 mb-4 bg-green-400 text-black text-sm rounded-md border border-green-200 flex items-center"
                role="alert">
                <div class="w-4 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                </div>
                <span>{{ $textMessage }}</span>
            </div>
        @endif
        @if ($message == 'fault'|| Session::has('fault'))
            <div class="py-3 px-5 mb-4 bg-red-500 text-black text-sm rounded-md border border-red-200 flex items-center"
                role="alert">
                <div class="w-4 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                    </svg>
                </div>
                <span> {{ $textMessage ? $textMessage : session('fault') }}</span>
            </div>
        @endif
    </div>
    <div class="mt-4 w-full">
        {{-- Añadir productos a la session carrito --}}
        <label for="codigo-barras"></label>
        <input class="border border-black" type="text" name="codigo" id="codigo-barras" wire:model="codigoBarras"
            value="{{ $codigoBarras }}" placeholder="Código de barras producto">
        <button class="px-4 py-1 text-sm text-white bg-green-400 rounded" type="submit"
            wire:click='anyadirProducto'>Añadir producto</button>
    </div>
    <table class=" mt-4 border-collapse border border-slate-400 ">
        <thead class="bg-gray-300">
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500 border border-slate-300">
                    Código
                </th>
                <th class="px-6 py-2 text-xs text-gray-500 border border-slate-300">
                    Denominación
                </th>
                <th class="px-6 py-2 text-xs text-gray-500 border border-slate-300">
                    Precio
                </th>
                <th class="px-6 py-2 text-xs text-gray-500 border border-slate-300">
                    Borrar
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">

            @foreach ($carrito as $producto)
                <tr class="whitespace-nowrap">

                    <td class="px-6 py-4 border border-slate-300">
                        <div class="text-sm text-gray-900">
                            {{ $producto->codigo }}
                        </div>
                    </td>
                    <td class="px-6 py-4 border border-slate-300">
                        <div class="text-sm text-gray-900">
                            {{ $producto->denominacion }}
                        </div>
                    </td>
                    <td class="px-6 py-4 border border-slate-300">
                        <div class="text-sm text-gray-900">
                            {{ $producto->precio }}
                        </div>
                    </td>
                    <td class=" px-6 py-4 border border-slate-300">
                        <button class="px-4 py-1 text-sm text-white bg-red-400 rounded"
                            onclick='confirm("Seguro deseas quitar el producto de la cesta") || event.stopImmediatePropagation()'
                            wire:click='borrarProducto({{ $producto }})'>Borrar</button>
                    </td>
            @endforeach
            <tr class=" px-6 py-4 border border-slate-300">
                <td></td>
                <td></td>
                <td>Subtotal:</td>
                <td>{{ $total }}€</td>
            </tr>
        </tbody>
    </table>
    <div class="flex justify-between w-full">
    <button title="Anular Compra" wire:click='anularCompra' class="bg-orange-700 mt-4 px-4 py-1 text-sm text-white rounded">
        Anular compra
    </button>
    <form action="{{Route('abonarCompra')}}" method="get">
        <input type="hidden" name="total" value="{{$total}}">
        <button  title="Finalizar Compra" class="bg-blue-700  mt-4 px-4 py-1 text-sm text-white rounded" type="submit">
            Finalizar Compra
        </button>
    </form>
</div>
</div>
