<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-300">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

            <form action="">
                <div  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4" >
                    <div class="mb-4">
                        <label for="codigo" class="block text-gray-700 text-sm font-bold mb-2">Código</label>
                        <input type="number" wire:model = {{'codigo'}} name="codigo" id="codigo"  value="{{$codigo}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="Código" required>
                        @error('codigo') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="denominacion"  class="block text-gray-700 text-sm font-bold mb-2">Denominación</label>
                        <input type="text"  wire:model = {{'denominacion'}} name="denominacion" value="{{$denominacion}}" id="denominacion"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="Denominación" required>
                        @error('denominacion') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="precio" class="block text-gray-700 text-sm font-bold mb-2">Precio
                        </label>
                        <input type="number"  wire:model = {{'precio'}} name="precio" id="precio" value="{{$precio}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus outlinr-none" placeholder="Precio" title="Debes insertar un número valido"  required>
                        @error('precio') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="flex items-center justify-evenly w-full">
                        <button
                            id="btnenviartour"
                         type="submit"
                         class="rounded-md  hover:bg-green-700 transition duration-300 bg-green-900  text-white font-bold py-2 px-4 my-3"
                        @if ($formUpdate)
                            wire:click.prevent ={{'updateProducto()'}}
                        @else
                            wire:click.prevent ={{'storeProducto()'}}
                        @endif

                       >Enviar
                        </button>

                       <a class="rounded-md  hover:bg-blue-600 transition duration-300 bg-blue-700  text-white font-bold py-2 px-4 my-3" href="">Cancelar</a>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
