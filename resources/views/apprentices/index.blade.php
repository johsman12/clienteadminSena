@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-7xl">
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <h1 class="text-2xl font-bold text-[#39A900]">Listado de Aprendices</h1>
        <a href="{{ route('apprentices.create') }}" class="inline-flex w-fit items-center rounded-lg bg-[#39A900] px-4 py-2.5 text-sm font-semibold text-white no-underline transition hover:bg-green-700">
            + Nuevo Aprendiz
        </a>
    </div>

    <div class="overflow-x-auto rounded-2xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-[1100px] w-full table-fixed border-collapse text-left">
            <thead class="bg-slate-50">
                <tr>
                    <th scope="col" class="w-[18%] border-b border-slate-200 px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Nombre</th>
                    <th scope="col" class="w-[24%] border-b border-slate-200 px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Email</th>
                    <th scope="col" class="w-[14%] border-b border-slate-200 px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Celular</th>
                    <th scope="col" class="w-[12%] border-b border-slate-200 px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Curso</th>
                    <th scope="col" class="w-[12%] border-b border-slate-200 px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Computador</th>
                    <th scope="col" class="w-[20%] border-b border-slate-200 px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-600">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($apprentices as $apprentice)
                    <tr class="align-middle transition hover:bg-slate-50">
                        <td class="break-words px-5 py-4 text-sm font-semibold text-slate-800">{{ $apprentice['name'] ?? 'N/A' }}</td>
                        <td class="break-words px-5 py-4 text-sm text-slate-600">{{ $apprentice['email'] ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">{{ $apprentice['cell_number'] ?? $apprentice['cell_phone'] ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">{{ $apprentice['course_id'] ?? 'Sin curso' }}</td>
                        <td class="whitespace-nowrap px-5 py-4 text-sm text-slate-600">{{ $apprentice['computer_id'] ?? 'Sin equipo' }}</td>
                        <td class="px-5 py-4 align-middle">
                            <div class="flex flex-wrap items-center gap-2">
                                <a href="{{ route('apprentices.show', $apprentice['id']) }}" class="inline-flex min-w-[92px] items-center justify-center rounded-lg bg-indigo-600 px-3 py-2 text-xs font-bold text-white no-underline shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">Ver detalle</a>
                                <a href="{{ route('apprentices.edit', $apprentice['id']) }}" class="inline-flex min-w-[68px] items-center justify-center rounded-lg bg-amber-400 px-3 py-2 text-xs font-bold text-amber-950 no-underline shadow-sm transition hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2">Editar</a>
                                <form action="{{ route('apprentices.destroy', $apprentice['id']) }}" method="POST" class="inline-flex" onsubmit="return confirm('¿Estás seguro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex min-w-[68px] items-center justify-center rounded-lg bg-rose-600 px-3 py-2 text-xs font-bold text-white shadow-sm transition hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:ring-offset-2">Borrar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-12 text-center text-sm text-slate-500">No hay aprendices registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
