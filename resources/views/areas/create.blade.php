@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <form action="{{ route('areas.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        <h1 style="text-align: center; color: #39A900; margin-bottom: 20px;">Area</h1>
        
        <label>
            Nombre:
            <input type="text" name="name" placeholder="Escribe el nombre aquí" required>
        </label>
        
        <button type="submit">Enviar Formulario</button>
    </form>
</div>

<style>
    /* Estilos específicos para el formulario sin afectar el resto del layout */
    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 350px;
        display: flex;
        flex-direction: column;
    }
    label {
        font-weight: 600;
        color: #333333;
        margin-bottom: 8px;
        display: flex;
        flex-direction: column;
    }
    input[type="text"] {
        margin-top: 6px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        transition: border-color 0.3s;
    }
    input[type="text"]:focus {
        outline: none;
        border-color: #39A900;
    }
    button {
        background-color: #39A900;
        color: white;
        border: none;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 15px;
    }
    button:hover {
        background-color: #2d8700;
    }
</style>
@endsection