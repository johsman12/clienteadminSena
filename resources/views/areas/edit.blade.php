<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Área</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; padding: 20px; }
        .container { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h1 { color: #39A900; }
        input { width: 100%; padding: 10px; margin-top: 10px; box-sizing: border-box; }
        .btn-guardar { background: #39A900; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Área</h1>
        <form action="{{ route('areas.update', $area['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nombre del Área:</label>
        <input type="text" name="name" value="{{ $area['name'] }}" required>
            <button type="submit" class="btn-guardar">Actualizar</button>
        </form>
    </div>
</body>
</html>