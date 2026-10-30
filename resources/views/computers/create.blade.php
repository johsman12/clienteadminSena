@extends('layouts.app')

@section('title', 'Registrar computador | AdminSENA')

@section('content')
    <div class="mx-auto max-w-xl">
        <div class="overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-200/60 ring-1 ring-slate-200">
            <div class="bg-[#102a43] px-6 py-6 text-white">
                <h1 class="text-xl font-bold">Registrar computador</h1>
                <p class="mt-1 text-sm text-sky-100/80">Registra los datos del <equipo class=""></equipo></p>
            </div>
            <form action="{{ route('computers.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-5 bg-slate-50/60 p-6">
                @csrf
                <div>
                    <label for="number" class="mb-1.5 block text-sm font-semibold text-slate-700">Número de serie</label>
                    <input id="number" type="text" name="number" value="{{ old('number') }}" placeholder="Ej. 1024"
                        required
                        class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none placeholder:text-slate-400 focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                    @error('number')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="computer-image" class="mb-1.5 block text-sm font-semibold text-slate-700">Imagen del
                        computador</label>
                    <label class="form-label">Imagen</label>
                    <input type="file" name="imagen" class="form-control" accept="image/*">
                    @error('image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="brand" class="mb-1.5 block text-sm font-semibold text-slate-700">Marca</label>
                    <input id="brand" type="text" name="brand" value="{{ old('brand') }}"
                        placeholder="Ej. Dell, Lenovo, HP" required
                        class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none placeholder:text-slate-400 focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                    @error('brand')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('computers.index') }}"
                        class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 no-underline hover:bg-slate-100">Cancelar</a>
                    <button type="submit"
                        class="rounded-lg bg-[#159a75] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#087f5b]">Guardar
                        computador</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('computer-image');
            const name = document.getElementById('computer-image-name');
            const preview = document.getElementById('computer-image-preview');

            input.addEventListener('change', function() {
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
