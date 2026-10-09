@extends('layouts.app')

@section('title', 'Inicio | AdminSENA')

@section('content')
    <section class="overflow-hidden rounded-3xl bg-slate-900 px-6 py-12 text-white shadow-xl sm:px-10 sm:py-16 lg:px-14">
        <div class="max-w-3xl">
            <span class="inline-flex items-center rounded-full border border-emerald-400/30 bg-emerald-400/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-emerald-300">
                Plataforma administrativa
            </span>
            <h1 class="mt-6 text-4xl font-bold tracking-tight sm:text-5xl">Bienvenido a AdminSENA</h1>
            <p class="mt-5 max-w-2xl text-base leading-7 text-slate-300 sm:text-lg">
                Administra de forma sencilla las áreas y los centros de formación desde un solo lugar.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('areas.index') }}" class="inline-flex items-center justify-center rounded-lg bg-emerald-500 px-5 py-3 text-sm font-semibold text-slate-950 no-underline transition hover:bg-emerald-400 focus:outline-none focus:ring-2 focus:ring-emerald-300 focus:ring-offset-2 focus:ring-offset-slate-900">
                    Explorar áreas
                </a>
                <a href="{{ route('trainingcenters.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-600 px-5 py-3 text-sm font-semibold text-white no-underline transition hover:border-slate-400 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 focus:ring-offset-slate-900">
                    Ver centros de formación
                </a>
            </div>
        </div>
    </section>

    <section class="mt-8 grid gap-5 sm:grid-cols-2">
        <a href="{{ route('areas.index') }}" class="group rounded-2xl border border-slate-200 bg-white p-6 text-inherit no-underline shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md sm:p-8">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-xl font-bold text-emerald-700">01</span>
            <h2 class="mt-5 text-xl font-bold text-slate-900 group-hover:text-emerald-700">Áreas</h2>
            <p class="mt-2 leading-6 text-slate-600">Consulta las áreas disponibles y revisa su información.</p>
            <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-emerald-700">Ir a áreas <span aria-hidden="true">&rarr;</span></span>
        </a>

        <a href="{{ route('trainingcenters.index') }}" class="group rounded-2xl border border-slate-200 bg-white p-6 text-inherit no-underline shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-md sm:p-8">
            <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-xl font-bold text-emerald-700">02</span>
            <h2 class="mt-5 text-xl font-bold text-slate-900 group-hover:text-emerald-700">Centros de formación</h2>
            <p class="mt-2 leading-6 text-slate-600">Consulta los centros registrados o agrega uno nuevo.</p>
            <span class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-emerald-700">Ir a centros <span aria-hidden="true">&rarr;</span></span>
        </a>
    </section>
@endsection
