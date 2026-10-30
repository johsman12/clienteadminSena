@extends('layouts.app')

@section('title', 'Registrar aprendiz | AdminSENA')

@section('content')
<div class="mx-auto max-w-2xl">
    <div class="overflow-hidden rounded-2xl bg-white shadow-lg shadow-slate-200/60 ring-1 ring-slate-200">
        <div class="bg-[#102a43] px-6 py-6 text-white">
            <h1 class="text-xl font-bold">Registrar aprendiz</h1>
            <p class="mt-1 text-sm text-sky-100/80">Ingresa la información del aprendiz.</p>
        </div>
        <form action="{{ route('apprentices.store') }}" method="POST" class="space-y-5 bg-slate-50/60 p-6">
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
                <label for="cell_number" class="mb-1.5 block text-sm font-semibold text-slate-700">Celular</label>
                <input id="cell_number" type="tel" name="cell_number" value="{{ old('cell_number') }}" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <label for="course_id" class="mb-1.5 block text-sm font-semibold text-slate-700">Curso</label>
                    <select id="course_id" name="course_id" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                        <option value="">Seleccione un curso</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course['id'] }}" {{ old('course_id') == $course['id'] ? 'selected' : '' }}>{{ $course['course_number'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="computer_id" class="mb-1.5 block text-sm font-semibold text-slate-700">Computador</label>
                    <select id="computer_id" name="computer_id" required class="block w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-[#159a75] focus:ring-2 focus:ring-emerald-100">
                        <option value="">Seleccione un computador</option>
                        @foreach ($computers as $computer)
                            <option value="{{ $computer['id'] }}" {{ old('computer_id') == $computer['id'] ? 'selected' : '' }}>{{ $computer['brand'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-3">
                <a href="{{ route('apprentices.index') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 no-underline hover:bg-slate-100">Cancelar</a>
                <button type="submit" class="rounded-lg bg-[#159a75] px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#087f5b]">Guardar aprendiz</button>
            </div>
        </form>
    </div>
</div>
@endsection
