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
            <h1 class="text-xl font-semibold">
                Gestión de Reservas
            </h1>

            <div class="flex gap-4">
                <a href="/reservar-mesa" class="bg-gray-800 hover:bg-gray-600 transition duration-300 text-white px-4 py-2 rounded">
                    Reservar Mesa
                </a>

                <a href="#" class="bg-[#7A7A7A] hover:bg-[#9A9A9A] transition duration-300 text-white px-4 py-2 rounded">
                    Gestionar mis Reservas
                </a>
            </div>

        </div>
    </div>

</body>
</html>