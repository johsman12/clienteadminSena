@extends('layouts.app')

@section('title', 'Computadores | AdminSENA')

@section('content')
    <style>
        .computers-table {
            table-layout: fixed;
        }

        .computers-table .computer-image-cell {
            width: 150px;
        }

        .computers-table .computer-actions-cell {
            width: 270px;
        }

        .computers-table .computer-thumbnail {
            display: block;
            width: 112px !important;
            height: 68px !important;
            object-fit: cover;
        }

        .computers-table tbody tr {
            height: 96px;
        }

        .computer-actions {
            white-space: nowrap;
        }

        @media (max-width: 900px) {
            .computers-table {
                table-layout: auto;
            }

            .computers-table .computer-image-cell,
            .computers-table .computer-actions-cell {
                width: auto;
            }
        }
    </style>

    @php
        $computerRows = is_array($computers) ? $computers : [];
    @endphp

    <section class="space-y-6">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.18em] text-emerald-700">Inventario tecnológico</p>
                <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Computadores</h1>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600">
                    Administra los equipos registrados y consulta su información.
                </p>
            </div>

            <a href="{{ route('computers.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-emerald-600 px-5 py-3 text-sm font-bold text-white no-underline shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                <span class="text-lg leading-none">+</span>
                Nuevo computador
            </a>
        </div>

        @if (session('success'))
            <div role="status" class="rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-slate-200 bg-slate-50 px-5 py-4 sm:px-6">
                <div>
                    <h2 class="text-base font-bold text-slate-900">Listado de equipos</h2>
                    <p class="mt-1 text-xs text-slate-500">{{ count($computerRows) }} equipo(s) registrado(s)</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="computers-table min-w-[760px] w-full text-left">
                    <thead class="bg-[#102a43] text-xs uppercase tracking-wider text-white">
                        <tr>
                            <th scope="col" class="px-5 py-4 font-bold sm:px-6">ID</th>
                            <th scope="col" class="px-5 py-4 font-bold">Número de equipo</th>
                            <th scope="col" class="px-5 py-4 font-bold">Marca</th>
                            <th scope="col" class="computer-image-cell px-5 py-4 font-bold">Imagen</th>
                            <th scope="col" class="computer-actions-cell px-5 py-4 text-right font-bold sm:px-6">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($computerRows as $computer)
                            @php
                                $imageUrl = $computer['image_url'] ?? $computer['imagen_url'] ?? null;
                            @endphp
                            <tr class="transition hover:bg-slate-50">
                                <td class="whitespace-nowrap px-5 py-4 text-sm font-bold text-slate-500 sm:px-6">
                                    #{{ $computer['id'] ?? '—' }}
                                </td>
                                <td class="whitespace-nowrap px-5 py-4 text-sm font-semibold text-slate-900">
                                    {{ $computer['number'] ?? $computer['serial_number'] ?? '—' }}
                                </td>
                                <td class="px-5 py-4 text-sm text-slate-700">
                                    <span class="inline-flex rounded-full border border-slate-200 bg-slate-100 px-3 py-1 font-semibold text-slate-700">
                                        {{ $computer['brand'] ?? 'Sin marca' }}
                                    </span>
                                </td>
                                <td class="computer-image-cell px-5 py-3">
                                    @if ($imageUrl)
                                        <img src="{{ $imageUrl }}"
                                            alt="Imagen del computador {{ $computer['number'] ?? '' }}"
                                            class="computer-thumbnail rounded-lg border border-slate-200 bg-slate-50 object-cover">
                                    @else
                                        <span class="text-sm text-slate-400">Sin imagen</span>
                                    @endif
                                </td>
                                <td class="computer-actions-cell px-5 py-3 sm:px-6">
                                    @if (isset($computer['id']))
                                        <div class="computer-actions flex justify-end gap-2">
                                            <a href="{{ route('computers.show', $computer['id']) }}"
                                                class="inline-flex items-center rounded-lg border border-slate-300 px-3 py-2 text-xs font-bold text-slate-700 no-underline transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-400">
                                                Ver
                                            </a>
                                            <a href="{{ route('computers.edit', $computer['id']) }}"
                                                class="inline-flex items-center rounded-lg bg-emerald-600 px-3 py-2 text-xs font-bold text-white no-underline transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                                Editar
                                            </a>
                                            <form action="{{ route('computers.destroy', $computer['id']) }}" method="POST"
                                                onsubmit="return confirm('¿Está seguro de eliminar este computador del inventario?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center rounded-lg bg-rose-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        <span class="text-sm text-slate-400">Sin acciones</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-14 text-center">
                                    <div class="mx-auto flex max-w-sm flex-col items-center">
                                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-2xl text-slate-400">⌘</div>
                                        <p class="mt-4 font-bold text-slate-800">No hay computadores registrados</p>
                                        <p class="mt-1 text-sm text-slate-500">Agrega el primer equipo para verlo en este listado.</p>
                                        <a href="{{ route('computers.create') }}"
                                            class="mt-5 inline-flex rounded-lg bg-emerald-600 px-4 py-2.5 text-sm font-bold text-white no-underline hover:bg-emerald-700">
                                            Registrar computador
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
