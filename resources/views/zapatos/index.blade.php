<x-app-layout>
    @vite(['resources/css/app.css','resources/js/app.js'])


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Codigo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Denominación
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($zapatos as $zapato)

                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$zapato->codigo}}
                    </th>
                    <td class="px-6 py-4">
                        {{$zapato->denominacion}}

                    </td>
                    <td class="px-6 py-4">
                        {{$zapato->precio}}€

                    </td>
                    <td class="px-6 py-4">
                        <form action="{{route("carritos.create")}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" method="GET">
                            @csrf
                            <input name="zapato_id" type="hidden" value="{{$zapato->id}}">
                            <button>Añadir al carrito</button>

                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-app-layout>
