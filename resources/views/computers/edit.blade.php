@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh; padding: 20px;">
    
    <form action="{{ route('computers.update', $computer['id']) }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf
        @method('PUT')
        
        <h1 style="text-align: center; color: #39A900; margin-bottom: 20px;">Editar Computador</h1>
        
        <label>
            Número de Serie:
            <input type="text" name="number" value="{{ $computer['number'] ?? $computer['serial_number'] ?? '' }}" required>
        </label>
        
        <label>
            Marca:
            <input type="text" name="brand" value="{{ $computer['brand'] ?? '' }}" required>
        </label>

        <label>
            Imagen:
            <input type="file" name="image" accept="image/jpeg,image/png,image/gif">
            <small>Opcional. JPG, PNG o GIF, máximo 5 MB.</small>
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </label>

        <button type="submit" class="btn btn-submit" style="width: 100%;">Actualizar Computador</button>
    </form>
</div>

<style>
    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    h1 { font-size: 24px; text-align: center; color: #39A900; }

    label { font-size: 14px; font-weight: 600; color: #374151; display: flex; flex-direction: column; gap: 6px; }

    input {
        padding: 10px 14px;
        border: 1px solid #d1d5db;
        border-radius: 6px;
        font-size: 15px;
        outline: none;
        transition: all 0.2s ease-in-out;
    }

    input:focus { border-color: #39A900; box-shadow: 0 0 0 3px rgba(57, 169, 0, 0.15); }

    .btn-submit {
        background-color: #39A900;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-submit:hover {
        transform: scale(1.03);
        filter: brightness(110%);
    }
</style>
@endsection