@extends('layouts.app')

@section('title', 'Registrar instructor | AdminSENA')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-200/60 ring-1 ring-slate-200">
        <div class="bg-[#102a43] px-6 py-6 text-white">
            <h1 class="text-xl font-bold">Registrar instructor</h1>
            <p class="mt-1 text-sm text-sky-100/80">Ingresa los datos del instructor.</p>
        </div>
        <form action="{{ route('teachers.store') }}" method="POST" class="space-y-5 bg-slate-50/60 p-6">
            @csrf
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-1.5 block text-sm font-semibold text-slate-700">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                </div>
                <div>
                    <label for="email" class="mb-1.5 block text-sm font-semibold text-slate-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                </div>
            </div>
            <div>
                <label for="cell_number" class="mb-1.5 block text-sm font-semibold text-slate-700">Número de celular</label>
                <input id="cell_number" type="tel" name="cell_number" value="{{ old('cell_number') }}" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="area_id" class="mb-1.5 block text-sm font-semibold text-slate-700">Área</label>
                    <select id="area_id" name="area_id" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                        <option value="">Seleccione un área</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area['id'] }}" {{ old('area_id') == $area['id'] ? 'selected' : '' }}>{{ $area['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="training_center_id" class="mb-1.5 block text-sm font-semibold text-slate-700">Centro de formación</label>
                    <select id="training_center_id" name="training_center_id" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                        <option value="">Seleccione un centro</option>
                        @foreach ($training_centers as $center)
                            <option value="{{ $center['id'] }}" {{ old('training_center_id') == $center['id'] ? 'selected' : '' }}>{{ $center['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('teachers.index') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 no-underline hover:bg-slate-100">Cancelar</a>
                <button type="submit" class="rounded-lg bg-[#159a75] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#087f5b]">Guardar instructor</button>
            </div>
        </form>
    </div>
</div>
@endsection
