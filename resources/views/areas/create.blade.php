@extends('layouts.app')

@section('title', 'Registrar área | AdminSENA')

@section('content')
<div class="mx-auto max-w-xl">
    <div class="overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-200/60 ring-1 ring-slate-200">
        <div class="bg-[#102a43] px-6 py-6 text-white">
            <h1 class="text-xl font-bold">Registrar área</h1>
            <p class="mt-1 text-sm text-sky-100/80">Crea una nueva área de formación.</p>
        </div>
        <form action="{{ route('areas.store') }}" method="POST" class="space-y-5 bg-slate-50/60 p-6">
            @csrf
            <div>
                <label for="name" class="mb-1.5 block text-sm font-semibold text-slate-700">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Escribe el nombre aquí" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none transition placeholder:text-slate-400 focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('areas.index') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 no-underline hover:bg-slate-100">Cancelar</a>
                <button type="submit" class="rounded-lg bg-[#159a75] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#087f5b]">Guardar área</button>
            </div>
        </form>
    </div>
</div>
@endsection
