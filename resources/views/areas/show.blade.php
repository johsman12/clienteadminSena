@extends('layouts.app')

@section('title', 'Detalle del área | AdminSENA')

@section('content')
    <section class="mx-auto max-w-3xl">
        <a href="{{ route('areas.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 no-underline transition hover:text-emerald-800">
            <span aria-hidden="true">&larr;</span> Volver a áreas
        </a>

        <div class="mb-6 mt-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Administración</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Detalle del área</h1>
        </div>

        <dl class="divide-y divide-slate-100 rounded-2xl border border-slate-200 bg-white px-6 shadow-sm sm:px-8">
            <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">ID</dt>
                <dd class="text-sm font-semibold text-slate-900 sm:col-span-2">{{ $area['id'] ?? '—' }}</dd>
            </div>
            <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-slate-500">Nombre</dt>
                <dd class="text-sm font-semibold text-slate-900 sm:col-span-2">{{ $area['name'] ?? 'Sin nombre' }}</dd>
            </div>
            @if (!empty($area['slug']))
                <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-slate-500">Slug</dt>
                    <dd class="text-sm font-semibold text-slate-900 sm:col-span-2">{{ $area['slug'] }}</dd>
                </div>
            @endif
        </dl>
    </section>
@endsection
