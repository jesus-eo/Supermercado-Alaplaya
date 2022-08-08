<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pasarela pago</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div>
        <div>
            @if (Session::has('success'))
                <div class="py-3 px-5 mb-4 bg-green-400 text-black text-sm rounded-md border border-green-200 flex items-center"
                    role="alert">
                    <div class="w-4 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                        </svg>
                    </div>
                    <span>Pago efectuado correctamente</span>
                </div>
            @endif

        </div>
        <div class="flex justify-center min-h-screen items-center">
            <div class="flex justify-center flex-col items-center  border-black rounded-md border-4 h-60">
                <h3 class="mb-4">Importe a pagar: {{ $total }}€</h3>
                <form action="{{ Route('pagarTasa') }}" method="post">
                    <div class="p-4">
                        @csrf
                        <label for="numTargeta">Número de targeta:</label>
                        <input class="border border-black" id="targeta" name="targeta" type="text" required
                            pattern="[0-9]{16}" maxlength="16" title="Debes introducir un número de 16 dígitos">
                    </div>
                    <div class="flex justify-center items-center">
                        @if (Session::has('success'))
                            <button class="cursor-pointer px-4 py-1 text-sm text-gray-500 bg-gray-400 rounded" id="btnPago" type="submit" disabled>Realizar pago</button>
                        @else
                            <button class="cursor-pointer px-4 py-1 text-sm text-white bg-green-400 rounded"
                                id="btnPago" type="submit">Realizar pago</button>
                        @endif
                    </div>
                </form>
                @if (Session::has('success'))
                    <a href="{{ route('index') }}">
                        <button class="mt-4 px-4 py-1 text-sm cursor-pointer text-white bg-blue-400 rounded"
                            id="btnInicio">Volver al inicio</button>
                    </a>
                @endif
            </div>
        </div>
    </div>

</body>

</html>
