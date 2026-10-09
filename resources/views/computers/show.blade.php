@extends('layouts.app')

@section('title', 'Detalle del computador | AdminSENA')

@section('content')
    <section class="mx-auto max-w-3xl">
        <a href="{{ route('computers.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 no-underline transition hover:text-emerald-800">
            <span aria-hidden="true">&larr;</span> Volver a computadores
        </a>

        <div class="mb-6 mt-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Administración</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">Detalle del computador</h1>
            <p class="mt-2 text-slate-600">Información registrada para este computador.</p>
        </div>

        @if (is_array($computer) && count($computer) > 0)
            <dl class="divide-y divide-slate-100 rounded-2xl border border-slate-200 bg-white px-6 shadow-sm sm:px-8">
                @foreach ($computer as $field => $value)
                    @unless (in_array($field, ['created_at', 'updated_at'], true))
                        <div class="grid gap-1 py-5 sm:grid-cols-3 sm:gap-4">
                            <dt class="text-sm font-medium text-slate-500">{{ str($field)->replace('_', ' ')->headline() }}</dt>
                            <dd class="break-words text-sm font-semibold text-slate-900 sm:col-span-2">
                                @if (is_array($value) || is_object($value))
                                    {{ json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}
                                @else
                                    {{ $value ?? '—' }}
                                @endif
                            </dd>
                        </div>
                    @endunless
                @endforeach
            </dl>
        @else
            <div role="status" class="rounded-2xl border border-amber-200 bg-amber-50 px-6 py-5 text-sm text-amber-900">
                No hay información disponible para este computador.
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('computers.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-5 py-3 text-sm font-semibold text-slate-700 no-underline transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
                Volver al listado
            </a>
        </div>
    </section>
@endsection