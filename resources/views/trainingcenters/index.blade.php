@extends('layouts.app')

@section('title', 'Centros de formación | AdminSENA')

@section('content')
    <section>
        <div class="mb-8 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wider text-emerald-700">Administración</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Centros de formación</h1>
                <p class="mt-2 max-w-2xl text-slate-600">Gestiona los centros de formación registrados en el sistema.</p>
            </div>
            <a href="{{ route('trainingcenters.create') }}" class="inline-flex items-center justify-center rounded-lg bg-emerald-600 px-5 py-3 text-sm font-semibold text-white no-underline shadow-sm transition hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                Registrar centro
            </a>
        </div>

        @if(session('success'))
            <div role="status" class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-left">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">ID</th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Nombre</th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Código</th>
                            <th scope="col" class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($trainingcenters as $trainingcenter)
                            <tr class="transition hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-500">{{ $trainingcenter['id'] ?? '—' }}</td>
                                <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ $trainingcenter['name'] ?? 'Sin nombre' }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">{{ $trainingcenter['location'] ?? '—' }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex items-center gap-3">
                                        <!-- Botón Ver detalle -->
                                        <a href="{{ route('trainingcenters.show', $trainingcenter['id']) }}" class="font-semibold text-emerald-700 no-underline transition hover:text-emerald-800">
                                            Ver detalle
                                        </a>

                                        <!-- Botón Editar con estilo armónico -->
                                        <a href="{{ route('trainingcenters.edit', $trainingcenter['id']) }}" class="inline-flex items-center rounded-lg bg-emerald-700 px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition hover:bg-emerald-800">
                                            Editar
                                        </a>

                                        <!-- Botón Borrar -->
                                        <form action="{{ route('trainingcenters.destroy', $trainingcenter['id']) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este centro?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center rounded-lg bg-rose-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm transition hover:bg-rose-700">
                                                Borrar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center">
                                    <p class="font-semibold text-slate-800">Aún no hay centros registrados</p>
                                    <p class="mt-1 text-sm text-slate-500">Registra el primer centro de formación para verlo aquí.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection