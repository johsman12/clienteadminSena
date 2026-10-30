@extends('layouts.app')

@section('title', 'Editar aprendiz | AdminSENA')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-200/60 ring-1 ring-slate-200">
        <div class="bg-[#102a43] px-6 py-6 text-white">
            <h1 class="text-xl font-bold">Editar aprendiz</h1>
            <p class="mt-1 text-sm text-sky-100/80">Actualiza la información del aprendiz.</p>
        </div>

        <form action="{{ route('apprentices.update', $apprentice['id']) }}" method="POST" class="space-y-5 bg-slate-50/60 p-6">
            @csrf
            @method('PUT')

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="name" class="mb-1.5 block text-sm font-semibold text-slate-700">Nombre</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $apprentice['name'] ?? '') }}" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                </div>
                <div>
                    <label for="email" class="mb-1.5 block text-sm font-semibold text-slate-700">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $apprentice['email'] ?? '') }}" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                </div>
            </div>

            <div>
                <label for="cell_number" class="mb-1.5 block text-sm font-semibold text-slate-700">Celular</label>
                <input id="cell_number" type="tel" name="cell_number" value="{{ old('cell_number', $apprentice['cell_number'] ?? $apprentice['cell_phone'] ?? '') }}" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="course_id" class="mb-1.5 block text-sm font-semibold text-slate-700">Curso</label>
                    <select id="course_id" name="course_id" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                        @foreach ($courses as $course)
                            <option value="{{ $course['id'] }}" {{ ($apprentice['course_id'] ?? null) == $course['id'] ? 'selected' : '' }}>{{ $course['course_number'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="computer_id" class="mb-1.5 block text-sm font-semibold text-slate-700">Computador</label>
                    <select id="computer_id" name="computer_id" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                        @foreach ($computers as $computer)
                            <option value="{{ $computer['id'] }}" {{ ($apprentice['computer_id'] ?? null) == $computer['id'] ? 'selected' : '' }}>{{ $computer['brand'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                <a href="{{ route('apprentices.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 no-underline transition hover:bg-slate-100">Cancelar</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-[#159a75] px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#087f5b]">Actualizar información</button>
            </div>
        </form>
    </div>
</div>
@endsection
