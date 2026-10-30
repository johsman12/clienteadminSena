@extends('layouts.app')

@section('content')
<style>
    .card-container { 
        background-color: white; 
        width: 100%; 
        max-width: 600px; 
        padding: 40px; 
        border-radius: 15px; 
        box-shadow: 0 10px 25px rgba(0,0,0,0.1); 
        display: flex; 
        flex-direction: column; 
        gap: 15px; 
        margin: 40px auto;
    }
    h1 { text-align: center; color: #39A900; margin-bottom: 10px; }
    p { font-size: 15px; color: #333; padding: 8px 0; border-bottom: 1px solid #f1f1f1; }
    p strong { color: #555; }
    
    .btn-volver { 
        background-color: #6c757d; 
        color: white; 
        border: none; 
        padding: 12px; 
        border-radius: 6px; 
        text-align: center; 
        text-decoration: none; 
        font-size: 16px; 
        font-weight: bold; 
        margin-top: 20px; 
        transition: 0.3s; 
        display: block;
    }
    .btn-volver:hover { background-color: #5a6268; }
</style>

<div class="card-container">
    <h1>Detalle del Instructor</h1>
    
    <p><strong>ID:</strong> {{ $teachers['id'] ?? 'N/A' }}</p>
    <p><strong>Nombre:</strong> {{ $teachers['name'] ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $teachers['email'] ?? 'N/A' }}</p>
    <p><strong>Número de celular:</strong> {{ $teachers['cell_number'] ?? $teachers['cell_phone'] ?? 'N/A' }}</p>
    <p><strong>Área ID:</strong> {{ $teachers['area_id'] ?? 'N/A' }}</p>
    <p><strong>Centro de Formación ID:</strong> {{ $teachers['training_center_id'] ?? 'N/A' }}</p>
    <p><strong>Fecha de Creación:</strong> {{ $teachers['created_at'] ?? 'N/A' }}</p>

    <a href="{{ route('teachers.index') }}" class="btn-volver">Volver al Listado</a>
</div>
@endsection