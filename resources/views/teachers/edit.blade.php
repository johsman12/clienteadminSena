<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Instructor</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        form { background-color: white; width: 700px; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); display: flex; flex-direction: column; gap: 15px; }
        h1 { text-align: center; color: #39A900; }
        label { font-weight: bold; color: #333; }
        input, select { width: 100%; padding: 12px; border: 1px solid #ced4da; border-radius: 6px; font-size: 15px; outline: none; transition: 0.3s; }
        input:focus, select:focus { border-color: #39A900; box-shadow: 0 0 5px rgba(57,169,0,0.4); }
        button { background-color: #39A900; color: white; border: none; padding: 12px; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; transition: 0.3s; }
        button:hover { background-color: #2d8700; }
    </style>
</head>
<body>

    <form action="{{ route('teachers.update', $teacher['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <h1>Editar Instructor</h1>
        
        <label>Nombre:
            <input type="text" name="name" value="{{ $teacher['name'] }}" required>
        </label>
        
        <label>Email:
            <input type="email" name="email" value="{{ $teacher['email'] }}" required>
        </label>

        <label>Número de celular:
            <input type="tel" name="cell_number" value="{{ old('cell_number', $teacher['cell_number'] ?? $teacher['cell_phone'] ?? '') }}" required>
        </label>
        
        <label for="area_id">Área:</label>
        <select name="area_id" id="area_id" required>
            @foreach ($areas as $area)
                <option value="{{ $area['id'] }}" {{ $teacher['area_id'] == $area['id'] ? 'selected' : '' }}>
                    {{ $area['name'] }}
                </option>
            @endforeach
        </select>

        <label for="training_center_id">Centro de formación:</label>
        <select name="training_center_id" id="training_center_id" required>
            @foreach ($training_centers as $training)
                <option value="{{ $training['id'] }}" {{ $teacher['training_center_id'] == $training['id'] ? 'selected' : '' }}>
                    {{ $training['name'] }}
                </option>
            @endforeach
        </select>
        
        <button type="submit">Actualizar Información</button>
    </form>

</body>
</html>