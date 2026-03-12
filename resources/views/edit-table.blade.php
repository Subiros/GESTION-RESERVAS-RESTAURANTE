<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Editar Mesa</title>
</head>
<body>
    <div class="flex min-h-screen justify-center flex-col text-center">
        <h1 class="font-bold">EDITAR MESA: <u class="font-normal"><i>{{$table->name}}</i></u></h1>
        <form action="{{ route('edit-table.post', $table->id) }}" method="post">
            @csrf
            <div class="m-2">
                <label for="name">Nombre de la Mesa:</label>
                <input type="text" name="name" value="{{$table->name}}" value="{{ old('name') }}" class="border pl-1 pr-1" placeholder="{{$table->name}}">
            </div>

            <div class="m-2">
                <label for="persons_number">Número de Personas:</label>
                <input type="number" name="persons_number" value="{{$table->persons_number}}" value="{{ old('persons_number') }}" class="border pl-1 pr-1" placeholder="{{$table->persons_number}}">  
            </div>

            <button type="submit" class="border rounded-lg pl-1 pr-1 hover:bg-gray-300 cursor-pointer transition duration-300">
                Editar Mesa
            </button>
        </form>

        @if(session('success'))
            <script>
                if (window.opener) {
                    window.opener.location.reload(); 
                }
                alert('{{ session('success') }}');
                window.close();
            </script>
        @endif

        @error('name')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
        @error('persons_number')
            <p class="text-red-500">{{ $message }}</p>
        @enderror
    </div>
</body>
</html>