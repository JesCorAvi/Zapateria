<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])
    @foreach ($facturas as $factura)
    <p>Factura Nª {{$factura->id}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Denominacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>

                </tr>
            </thead>
            <tbody>
                @foreach ($factura->lineas as $linea)

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$linea->zapato->denominacion}}
                    </th>
                    <td class="px-6 py-4">
                        {{$linea->cantidad}}

                    </td>
                    <td class="px-6 py-4">
                        {{$linea->zapato->precio}}€

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <br>
    @endforeach

    </div>
</x-app-layout>
