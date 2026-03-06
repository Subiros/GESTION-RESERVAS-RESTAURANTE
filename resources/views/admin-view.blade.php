<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Inicio Admin</title>
</head>
<body class="bg-[#eba860]">

    <div class="min-h-screen p-2 pt-0 flex flex-col">
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

        <div class="h-[50vh] border-2 border-[#b57238]  rounded-lg flex items-center justify-center bg-white mb-2">
            GESTIÓN DE MESAS DEL RESTAURANTE
        </div>

        <div class="flex-1 flex gap-2">
            <div class="flex-1 border-2 border-[#b57238] rounded-lg flex items-center justify-center bg-white">
                AFORO
            </div>

            <div class="flex-1 border-2 border-[#b57238] rounded-lg flex items-center justify-center bg-white">
                CONFIGURACION RAPIDA DE MESAS
            </div>
        </div>

    </div>

</body>
</html>