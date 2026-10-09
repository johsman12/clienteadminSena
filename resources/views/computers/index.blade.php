@extends('layouts.app')

@section('title', 'Computadores | AdminSENA')

@section('content')
    @php
        $computerRows = is_array($computers) ? $computers : [];
        $firstComputer = reset($computerRows);
        $columns = is_array($firstComputer)
            ? array_values(array_diff(array_keys($firstComputer), ['created_at', 'updated_at']))
            : [];
    @endphp

    <section>
        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Administración</p>
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Computadores</h1>
            <p class="mt-2 max-w-2xl text-slate-600">Consulta los computadores registrados en el sistema.</p>
        </div>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left">
                    <thead class="bg-slate-50">
                        <tr>
                            @foreach ($columns as $column)
                                <th scope="col" class="whitespace-nowrap px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                    {{ str($column)->replace('_', ' ')->headline() }}
                                </th>
                            @endforeach
                            @if (count($columns) > 0)
                                <th scope="col" class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Acciones</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($computerRows as $computer)
                            <tr class="transition hover:bg-slate-50">
                                @foreach ($columns as $column)
                                    @php($value = $computer[$column] ?? null)
                                    <td class="max-w-xs px-6 py-4 text-sm text-slate-700">
                                        @if (is_array($value) || is_object($value))
                                            <span class="block max-w-xs truncate" title="{{ json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}">
                                                {{ json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}
                                            </span>
                                        @else
                                            {{ $value ?? '—' }}
                                        @endif
                                    </td>
                                @endforeach
                                @if (count($columns) > 0)
                                    <td class="whitespace-nowrap px-6 py-4 text-sm">
                                        @if (isset($computer['id']))
                                            <a href="{{ route('computers.show', $computer['id']) }}" class="font-semibold text-emerald-700 no-underline transition hover:text-emerald-800">
                                                Ver detalle
                                            </a>
                                        @else
                                            <span class="text-slate-400">Sin detalle</span>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ max(count($columns) + 1, 1) }}" class="px-6 py-12 text-center">
                                    <p class="font-semibold text-slate-800">No hay computadores para mostrar</p>
                                    <p class="mt-1 text-sm text-slate-500">Cuando haya computadores disponibles, aparecerán en esta lista.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection