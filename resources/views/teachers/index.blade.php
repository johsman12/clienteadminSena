@extends('layouts.app')

@section('title', 'Instructores | AdminSENA')

@section('content')
    <style>
        .container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #39A900; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #f8f9fa; }

        /* Estilo del botón Nuevo Instructor */
        .btn-nuevo { 
            background: #39A900; 
            color: white; 
            padding: 10px 15px; 
            text-decoration: none; 
            border-radius: 5px; 
            font-weight: bold; 
            transition: 0.3s; 
            display: inline-block;
        }
        .btn-nuevo:hover { 
            background: #2e8b00; 
            transform: scale(1.05); 
        }

        /* Estilos para botones de acción */
        .btn-ver { background: #17a2b8; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; transition: 0.3s; display: inline-block; }
        .btn-ver:hover { background: #138496; transform: scale(1.05); }

        .btn-editar { background: #ffc107; color: black; padding: 8px 12px; text-decoration: none; border-radius: 4px; transition: 0.3s; display: inline-block; }
        .btn-editar:hover { background: #d39e00; transform: scale(1.05); }

        .btn-borrar { background: #dc3545; color: white; border: none; padding: 8px 12px; cursor: pointer; border-radius: 4px; transition: 0.3s; display: inline-block; }
        .btn-borrar:hover { background: #c82333; transform: scale(1.05); }
    </style>
    <div class="container">
        <h1>Listado de Instructores</h1>
        <a href="{{ route('teachers.create') }}" class="btn-nuevo">+ Nuevo Instructor</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Área</th>
                    <th>Centro de Formación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                <tr>
                    <td>{{ $teacher['id'] ?? 'N/A' }}</td>
                    <td>
                        <!-- Opcional: Hacemos el nombre un enlace directo al show -->
                        <a href="{{ route('teachers.show', $teacher['id']) }}" style="color: #39A900; font-weight: bold; text-decoration: none;">
                            {{ $teacher['name'] ?? 'N/A' }}
                        </a>
                    </td>
                    <td>{{ $teacher['email'] ?? 'N/A' }}</td>
                    <td>{{ $teacher['cell_number'] ?? $teacher['cell_phone'] ?? 'N/A' }}</td>
                    <td>{{ $teacher['area_id'] ?? 'N/A' }}</td>
                    <td>{{ $teacher['training_center_id'] ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('teachers.show', $teacher['id']) }}" class="btn-ver">Ver</a>
                        <a href="{{ route('teachers.edit', $teacher['id']) }}" class="btn-editar">Editar</a>
                        <form action="{{ route('teachers.destroy', $teacher['id']) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-borrar">Borrar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center;">No hay instructores registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection