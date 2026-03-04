<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Registrarse</title>
</head>
<body>
    
    <div style="background-image: url('/img/bf-img-login.jpg'); no-repeat; background-size: cover; background-position: center;"  class="min-h-screen flex flex-col items-center justify-center">
        <div class="bg-[#b57238] p-5 border-2 border-solid rounded-lg mr-2 ml-2 shadow-2xl shadow-white">
            <h1 class="text-2xl text-center pb-2">
                Registrarse
            </h1>
            <form method="POST" action="{{ route('register.post') }}" class="bg-[#eba860] p-4 border rounded-xl">
            @csrf
                <div class="text-center m-1">
                    <label for="name">
                        Nombre
                    </label>
                    <input type="text" name="name" required class="border rounded-lg px-1 bg-[#E6E6E6]">
                </div>
                
                <div class="text-center mt-2 m-3">
                    <label for="surname">
                        Apellido(s)
                    </label>
                    <input type="text" name="surname" required class="border rounded-lg px-1 bg-[#E6E6E6]">
                </div>
                
                <div class="text-center mt-2 m-3">
                    <label for="mail">
                        Mail
                    </label>
                    <input type="mail" name="mail" required class="border rounded-lg px-1 bg-[#E6E6E6]">
                </div>
                
                <div class="text-center mt-2 m-3">
                    <label for="password">
                        Contraseña
                    </label>
                    <input type="password" name="password" required class="border rounded-lg px-1 bg-[#E6E6E6]">
                </div>
                
                <div class="text-center mt-2 m-3"r>
                    <label for="repeat-password">
                        Repetir contraseña
                    </label>
                    <input type="password" name="password_confirmation" required class="border rounded-lg px-1 bg-[#E6E6E6]">
                </div>

                <div class="flex justify-between items-center w-full mb-2">
                    <button type="submit" class="border p-1 pb-0 pt-0 rounded-lg bg-white hover:bg-[#E6E6E6] transition duration-300 cursor-pointer">
                        Crear cuenta
                    </button>

                    <a href="/login" class="text-xs text-[#0E00AB] underline hover:text-blue-600 transition duration-300">
                        ¿Ya tienes cuenta?
                    </a>
                </div>
                @if ($errors->any())
                    <div class="bg-red-100 text-red-800 p-2 rounded-full mt-3 text-sm text-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            <div class="max-w-[400px] w-full">
                <p class="text-xs text-gray-600 mt-1">
                    * El inicio de sesión permite gestionar las reservas de forma personalizada y asociarlas a tu cuenta. Así se pueden consultar o modificar datos cuando sea necesario. Los datos se tratan de forma confidencial y únicamente con la finalidad de gestionar el servicio, conforme a la normativa vigente.
                </p>
            </div>
        </div>
    </div>
</body>
</html>