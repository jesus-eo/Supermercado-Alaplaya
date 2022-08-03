<div>
    <div>
        @if ($message == 'success')
        <div class="py-3 px-5 mb-4 bg-green-400 text-black text-sm rounded-md border border-green-200 flex items-center" role="alert">
            <div class="w-4 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                </svg>
            </div>
            <span>{{$textMessage }}</span>
        </div>

        @endif
        @if ($message == 'fault')
        <div class="py-3 px-5 mb-4 bg-red-500 text-black text-sm rounded-md border border-red-200 flex items-center" role="alert">
            <div class="w-4 mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01" />
                </svg>
            </div>
            <span> {{$textMessage}}</span>
        </div>
        @endif
    </div>
    <table>
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Código
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Denominación
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Precio
                </th>
                <th class="px-6 py-2 text-xs text-gray-500">
                    Borrar
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">

            @foreach ($carrito as $producto)
                <tr class="whitespace-nowrap">

                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $producto->codigo }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $producto->denominacion }}
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900">
                            {{ $producto->precio }}
                        </div>
                    </td>
                    <td>
                            <button class="px-4 py-1 text-sm text-white bg-red-400 rounded"
                                onclick='return confirm("Seguro deseas borrarlo")'
                                wire:click = 'borrarProducto({{$producto}})'type="submit">Borrar</button>
                    </td>
            @endforeach
            <tr>
                <td>Subtotal</td>
                <td>{{$total}}</td>
                <td>{{$count}}</td>
            </tr>
        </tbody>
    </table>
    <div>
        {{-- Añadir productos a la session carrito --}}
        <label for="codigo-barras"></label>
        <input class="border border-black" type="text" name="codigo" id="codigo-barras" wire:model="codigoBarras">
        <button class="px-4 py-1 text-sm text-white bg-green-400 rounded" type="submit"
            wire:click='anyadirProducto'>Añadir producto a la compra</button>
    </div>

</div>
