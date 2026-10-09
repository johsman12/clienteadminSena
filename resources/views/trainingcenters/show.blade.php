@extends('layouts.app')

@section('title', 'Detalle del centro | AdminSENA')

@section('content')
    <section class="mx-auto max-w-3xl">
        <a href="{{ route('trainingcenters.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 no-underline transition hover:text-emerald-800">
            <span aria-hidden="true">&larr;</span> Volver a centros
        </a>

        <div class="mb-6 mt-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Administración</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Detalle del centro de formación</h1>
            <p class="mt-2 text-slate-600">Información registrada para este centro.</p>
        </div>

        <dl class="divide-y divide-slate-100 rounded-2xl border border-slate-200 bg-white px-6 shadow-sm sm:px-8">
            <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">ID</dt>
                <dd class="text-sm font-semibold text-slate-900 sm:col-span-2">{{ $center['id'] ?? '—' }}</dd>
            </div>
            <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">Nombre</dt>
                <dd class="text-sm font-semibold text-slate-900 sm:col-span-2">{{ $center['name'] ?? 'Sin nombre' }}</dd>
            </div>
            <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">Ubicación</dt>
                <dd class="text-sm font-semibold text-slate-900 sm:col-span-2">{{ $center['location'] ?? 'No especificada' }}</dd>
            </div>
        </dl>

        <div class="mt-6">
            <a href="{{ route('trainingcenters.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 no-underline transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
                Volver al listado
            </a>
        </div>
    </section>
@endsection
