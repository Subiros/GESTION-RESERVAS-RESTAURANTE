<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Inicio Admin</title>
</head>
<body style="background-image: url('/img/image-mesh-gradient.png'); no-repeat; background-size: cover; background-position: center;">

    <div class="h-screen p-2 pt-0 flex flex-col">
        <form action="/logout" method="POST" class="m-0 text-xs text-amber-900 flex">
            <svg class="w-[20px] h-[20px] text-amber-800" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
            </svg>


            @csrf
            <button type="submit" class="hover:shadow-xl transition duration-300 cursor-pointer">
                Cerrar Sesión
            </button>
        </form>

        <!-- GESTIONES DE ADMIN -->

        <div class="h-[50vh] border-2 border-[#b57238]  rounded-lg items-center justify-center bg-white mb-2">
            <h1 class="text-center font-bold">CONFIGURACION RAPIDA DE MESAS</h1>

            <div>
                @foreach ($tables as $table)
                    @if ($table->booked==true)
                        <p>{{$table->name}}</p>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="flex-1 flex gap-2">
            <div class="flex-1 border-2 border-[#b57238] rounded-lg items-center justify-center bg-white">
                <div class="flex justify-center gap-2">
                    <div class="font-bold">
                        AFORO DISPONIBLE:
                    </div>
                    <div class="underline">
                        {{$aforo_disponible}} / {{$aforo_total}} ({{$porcentage}}%)
                    </div>
                </div>
            </div>

            <div class="flex-1 border-2 border-[#b57238] rounded-lg bg-white flex flex-col">
                <div class="p-2 pb-0 mb-1">
                    <h1 class="text-center font-bold">CONFIGURACION RAPIDA DE MESAS</h1>
                    <div class="flex gap-2 mr-2">
                        <input type="text" id="buscador" placeholder="Escribe para buscar..." class="flex-1 border rounded-lg pl-1">
                        <div class="flex justify-end">
                            <a href="/admin/add-table" onclick="window.open(this.href,'popup','width='+(screen.width/2)+',height='+(screen.height/2)); return false;">
                                <svg class="w-6 h-6 text-amber-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </a>
                            <div class="refreshButton" onclick="location.reload()">
                                <svg class="w-6 h-6 text-amber-800 hover:cursor-pointer" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="flex-1 max-h-[calc(50vh-110px)] overflow-y-auto overflow-x-auto p-2 pt-0">
                    <div class="border rounded-lg">
                        <table class="min-w-full text-sm text-left text-gray-700 table-fixed border rounded-lg overflow-hidden">
                            <thead class="bg-gray-200 sticky top-0">
                                <tr>
                                    <th class="px-4 py-2 font-medium text-gray-900 border-b border-gray-300">Mesa</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 border-b border-gray-300">Personas</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 border-b border-gray-300">Reservadas</th>
                                    <th class="px-4 py-2 font-medium text-gray-900 border-b border-gray-300">Gestiones</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-mesas">
                                @foreach ($tables as $table)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                        <td class="px-4 py-2">{{$table->name}}</td>
                                        <td class="px-4 py-2">{{$table->persons_number}}</td>
                                        @if ($table->booked == false) 
                                            <td class="px-4 py-2">No Reservada</td>
                                            @else <td class="px-4 py-2">Reservada</td>
                                        @endif
                                        <td>
                                            <div class="flex">
                                                <a href="/admin/edit-table/{{$table->id}}" onclick="window.open(this.href,'popup','width='+(screen.width/2)+',height='+(screen.height/2)); return false;">
                                                    <svg class="w-6 h-6 text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                    </svg>
                                                </a>
                                                <form action="{{ route('delete-table.post', $table->id) }}" method="post" onsubmit="return confirm('¿Eliminar la mesa {{ $table->name }}?');">
                                                    @csrf
                                                    <button type="submit" class="cursor-pointer">
                                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buscador = document.getElementById("buscador");
            const filas = document.querySelectorAll("#tabla-mesas tr");

            buscador.addEventListener("keyup", function () {
                const texto = buscador.value.toLowerCase();

                filas.forEach(function (fila) {
                    const contenido = fila.textContent.toLowerCase();

                    if (contenido.includes(texto)) {
                        fila.style.display = "";
                    } else {
                        fila.style.display = "none";
                    }
                });
            });
        });
    </script>

</body>
</html>