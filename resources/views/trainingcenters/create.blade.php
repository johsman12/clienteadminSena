@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg border-0">
            <!-- Header con verde institucional -->
            <div class="card-header text-white text-center" style="background-color: #39A900;">
                <h4 class="mb-0">Registro del Centro de Formación</h4>
            </div>
            <div class="card-body p-4">
                
                {{-- Mensaje de éxito --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Formulario corregido --}}
                <form action="{{ route('trainingcenters.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nombre del Centro:</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Ej. Centro de Innovación" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="location" class="form-label fw-bold">Ubicación:</label>
                        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" placeholder="Ej. Bloque B, Piso 2" value="{{ old('location') }}" required>
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-2 mt-3">
                        <i class="fa fa-save me-2"></i>Guardar Registro
                    </button>

                    <a href="{{ route('trainingcenters.index') }}" class="btn btn-secondary w-100 py-2 mt-2">
                        Volver a la lista
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection