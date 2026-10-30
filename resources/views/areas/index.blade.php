@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center" style="color: #39A900;">LISTAS DE AREAS</h1>
    
    <!-- Botón de Nueva Área (Centrado o alineado según prefieras) -->
    <div style="margin-bottom: 20px;">
        <a href="{{ route('areas.create') }}" class="btn btn-new">Nueva Area</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($areas as $area)
            <tr>
                <td>{{ $area['id'] }}</td>
                <td>{{ $area['name'] }}</td>
                <td>
                    <a href="{{ route('areas.show', $area['id']) }}" class="btn btn-view">Ver detalle</a>
                    <a href="{{ route('areas.edit', $area['id']) }}" class="btn btn-edit">Editar</a>
                    
                    <form action="{{ route('areas.destroy', $area['id']) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('¿Estás seguro de borrar esta área?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    /* Mueve estos estilos a tu archivo CSS global o déjalos aquí. 
       Asegúrate de que los estilos de la tabla no se vean afectados por Bootstrap */
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
    th { background-color: #f8f9fa; }
    
    .btn { 
        padding: 8px 12px; text-decoration: none; border-radius: 4px; color: white; 
        display: inline-block; transition: background-color 0.3s ease, transform 0.2s ease;
        text-align: center; min-width: 70px; font-weight: bold; font-size: 14px;
    }
    .btn:hover { transform: scale(1.05); filter: brightness(110%); }
    .btn-new { background-color: #39A900; }
    .btn-view { background-color: #17a2b8; }
    .btn-edit { background-color: #007bff; }
    .btn-delete { background-color: #dc3545; border: none; cursor: pointer; }
</style>
@endsection