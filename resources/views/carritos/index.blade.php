<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Denominación
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carritos as $carrito)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $carrito->zapato->denominacion }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $carrito->zapato->precio }} €

                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="{{route("carritos.update", $carrito)}}">
                                @csrf
                                @method("PUT")
                                <input type="hidden" value="+" name="tipo">
                                <button >+</button>
                            </form>
                            {{ $carrito->cantidad }}
                            <form method="POST" action="{{route("carritos.update", $carrito)}}">
                                @csrf
                                @method("PUT")
                                <input type="hidden" value="-" name="tipo">
                                <button>-</button>
                            </form>

                        </td>
                        <td class="px-6 py-4">
                            {{ $carrito->cantidad *  $carrito->zapato->precio}} €
                        </td>

                        <td class="px-6 py-4">
                            <form method="POST" action="{{route("carritos.destroy", $carrito)}}">
                                @csrf
                                @method('Delete')
                                <button>Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <form method="POST" action="{{route("carritos.vaciar", auth()->user())}}">
            @csrf
            @method('DELETE')
            <button>Vaciar carrito</button>
        </form>
        <form method="POST" action="{{route("carritos.comprar", auth()->user())}}">
            @csrf
            <button>COMPRAR</button>
        </form>

    </div>
</x-app-layout>
