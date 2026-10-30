@extends('layouts.app')

@section('title', 'Detalle del aprendiz | AdminSENA')

@section('content')
<section class="mx-auto max-w-3xl">
    <a href="{{ route('apprentices.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 no-underline transition hover:text-emerald-800">
        <span aria-hidden="true">&larr;</span> Volver a aprendices
    </a>

    <div class="mb-6 mt-8">
        <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Administración</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Detalle del aprendiz</h1>
        <p class="mt-2 text-slate-600">Información registrada del aprendiz.</p>
    </div>

    <dl class="divide-y divide-slate-100 rounded-2xl border border-slate-200 bg-white px-6 shadow-sm sm:px-8">
        <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-medium text-slate-500">ID</dt>
            <dd class="break-words text-sm font-semibold text-slate-900 sm:col-span-2">{{ $apprentice['id'] ?? '—' }}</dd>
        </div>
        <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-medium text-slate-500">Nombre</dt>
            <dd class="break-words text-sm font-semibold text-slate-900 sm:col-span-2">{{ $apprentice['name'] ?? 'Sin nombre' }}</dd>
        </div>
        <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-medium text-slate-500">Email</dt>
            <dd class="break-words text-sm font-semibold text-slate-900 sm:col-span-2">{{ $apprentice['email'] ?? 'No disponible' }}</dd>
        </div>
        <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-medium text-slate-500">Celular</dt>
            <dd class="break-words text-sm font-semibold text-slate-900 sm:col-span-2">{{ $apprentice['cell_number'] ?? $apprentice['cell_phone'] ?? 'No disponible' }}</dd>
        </div>
        <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-medium text-slate-500">Curso</dt>
            <dd class="break-words text-sm font-semibold text-slate-900 sm:col-span-2">{{ $apprentice['course_id'] ?? 'Sin curso' }}</dd>
        </div>
        <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
            <dt class="text-sm font-medium text-slate-500">Computador</dt>
            <dd class="break-words text-sm font-semibold text-slate-900 sm:col-span-2">{{ $apprentice['computer_id'] ?? 'Sin computador' }}</dd>
        </div>
    </dl>

    <div class="mt-6">
        <a href="{{ route('apprentices.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 no-underline transition hover:bg-slate-50">
            Volver al listado
        </a>
    </div>
</section>
@endsection
