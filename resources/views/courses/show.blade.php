<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Curso</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f4f6f9; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .card { background-color: white; width: 700px; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); display: flex; flex-direction: column; gap: 15px; }
        h1 { text-align: center; color: #39A900; }
        p { font-size: 16px; color: #333; }
        p strong { color: #555; }
        .btn-volver { background-color: #6c757d; color: white; border: none; padding: 12px; border-radius: 6px; text-align: center; text-decoration: none; font-size: 16px; font-weight: bold; transition: 0.3s; display: block; }
        .btn-volver:hover { background-color: #5a6268; }
    </style>
</head>
<body>

    <div class="card">
        <h1>Detalle del Curso</h1>
        
        <p><strong>ID:</strong> {{ $courses['id'] ?? 'N/A' }}</p>
        <p><strong>Número de curso:</strong> {{ $courses['course_number'] ?? 'N/A' }}</p>
        <p><strong>Día:</strong> {{ $courses['day'] ?? 'N/A' }}</p>
        <p><strong>Área ID:</strong> {{ $courses['area_id'] ?? 'N/A' }}</p>
        <p><strong>Centro de Formación ID:</strong> {{ $courses['training_center_id'] ?? 'N/A' }}</p>
        <p><strong>Fecha de creación:</strong> {{ $courses['created_at'] ?? 'N/A' }}</p>
        <p><strong>Última actualización:</strong> {{ $courses['updated_at'] ?? 'N/A' }}</p>

        <a href="{{ route('courses.index') }}" class="btn-volver">Volver al listado</a>
    </div>

</body>
</html>