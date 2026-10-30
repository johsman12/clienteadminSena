@extends('layouts.app')

@section('title', 'Registrar centro | AdminSENA')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-200/60 ring-1 ring-slate-200">
        <div class="bg-[#102a43] px-6 py-6 text-white">
            <h1 class="text-xl font-bold">Registrar centro de formación</h1>
            <p class="mt-1 text-sm text-sky-100/80">Agrega la información del centro.</p>
        </div>
        <form action="{{ route('trainingcenters.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5 bg-slate-50/60 p-6">
            @csrf
            <div>
                <label for="name" class="mb-1.5 block text-sm font-semibold text-slate-700">Nombre del centro</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Ej. Centro de Innovación" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none placeholder:text-slate-400 focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="image" class="mb-1.5 block text-sm font-semibold text-slate-700">Imagen del centro</label>
                <div class="rounded-xl border-2 border-dashed border-slate-300 bg-white p-4 transition hover:border-emerald-400">
                    <input id="training-center-image" type="file" name="image" accept="image/jpeg,image/png,image/gif" required class="sr-only">
                    <label for="training-center-image" class="flex cursor-pointer flex-col items-center justify-center rounded-lg px-4 py-5 text-center hover:bg-emerald-50">
                        <span class="flex h-11 w-11 items-center justify-center rounded-full bg-emerald-100 text-xl text-emerald-700">↑</span>
                        <span class="mt-2 text-sm font-bold text-slate-700">Seleccionar imagen</span>
                        <span id="training-center-image-name" class="mt-1 text-xs text-slate-500">JPG, PNG o GIF · máximo 5 MB</span>
                    </label>
                    <img id="training-center-image-preview" alt="Vista previa de la imagen seleccionada" class="mx-auto mt-3 hidden h-32 w-full rounded-lg border border-slate-200 object-contain">
                </div>
                @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="location" class="mb-1.5 block text-sm font-semibold text-slate-700">Ubicación</label>
                <input id="location" type="text" name="location" value="{{ old('location') }}" placeholder="Ej. Bloque B, Piso 2" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none placeholder:text-slate-400 focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                @error('location') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('trainingcenters.index') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 no-underline hover:bg-slate-100">Cancelar</a>
                <button type="submit" class="rounded-lg bg-[#159a75] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#087f5b]">Guardar centro</button>
            </div>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('training-center-image');
        const name = document.getElementById('training-center-image-name');
        const preview = document.getElementById('training-center-image-preview');

        input.addEventListener('change', function () {
            const file = input.files[0];
            if (!file) {
                name.textContent = 'JPG, PNG o GIF · máximo 5 MB';
                preview.classList.add('hidden');
                preview.removeAttribute('src');
                return;
            }

            name.textContent = file.name;
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        });
    });
</script>
@endsection
