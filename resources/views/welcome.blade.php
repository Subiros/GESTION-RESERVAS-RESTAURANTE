<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Gestión de Reservas</title>
</head>
<body>

    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col items-center gap-4">
            @guest
                <h1 class="text-xl font-semibold">
                    Inicia sesión para:
                </h1>
            @endguest

            @auth
                <h1 class="text-xl font-semibold">
                    Gestión de tu Reserva
                </h1>
            @endauth

            <div class="flex gap-4">
                <a href="/reservar-mesa" class="bg-gray-800 hover:bg-gray-600 transition duration-300 text-white px-4 py-2 rounded">
                    Reservar Mesa
                </a>

                <a href="#" class="bg-[#7A7A7A] hover:bg-[#9A9A9A] transition duration-300 text-white px-4 py-2 rounded">
                    Gestionar mis Reservas
                </a>
            </div>

            @auth
                @if(Auth::user()->email == 'admin2@admin.com')
                    <a href="/admin" class="hover:shadow-xl transition duration-300">Panel para Administradores</a>
                @endif

                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="hover:shadow-xl transition duration-300 cursor-pointer">
                        Cerrar Sesión
                    </button>
                </form>
            @endauth
        </div>
    </div>

</body>
</html>