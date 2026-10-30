@extends('layouts.app')

@section('title', 'Quiénes Somos | AdminSENA')

@section('content')
    <div class="space-y-8">
        <section class="relative isolate overflow-hidden rounded-3xl bg-[#102a43] px-6 py-12 text-white shadow-xl sm:px-10 lg:px-14 lg:py-16">
            <div class="absolute -right-20 -top-24 -z-10 h-72 w-72 rounded-full bg-emerald-400/20 blur-3xl"></div>
            <div class="absolute -bottom-28 left-1/3 -z-10 h-64 w-64 rounded-full bg-sky-400/20 blur-3xl"></div>

            <div class="grid items-center gap-10 lg:grid-cols-[1.15fr_0.85fr]">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full border border-emerald-300/30 bg-emerald-400/10 px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-emerald-200">
                        <span class="h-2 w-2 rounded-full bg-emerald-300"></span>
                        Conoce AdminSENA
                    </span>
                    <h1 class="mt-6 max-w-3xl text-4xl font-black leading-tight tracking-tight sm:text-5xl">
                        Tecnología que impulsa el talento y la formación
                    </h1>
                    <p class="mt-5 max-w-2xl text-base leading-7 text-sky-100/80 sm:text-lg">
                        Somos una plataforma creada para organizar, simplificar y fortalecer la gestión académica y administrativa del SENA.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-xl bg-emerald-400 px-5 py-3 text-sm font-bold text-[#102a43] no-underline shadow-lg shadow-emerald-950/20 transition hover:bg-emerald-300">
                            Explorar plataforma
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                        <a href="#nuestra-propuesta" class="inline-flex items-center gap-2 rounded-xl border border-white/25 px-5 py-3 text-sm font-bold text-white no-underline transition hover:bg-white/10">
                            Conocer más
                            <i class="fa-solid fa-chevron-down text-xs"></i>
                        </a>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-sm">
                    <div class="absolute inset-3 rounded-[2rem] bg-emerald-300/20 blur-2xl"></div>
                    <div class="relative rounded-[2rem] border border-white/15 bg-white/10 p-6 shadow-2xl backdrop-blur-sm">
                        <div class="flex items-center justify-between">
                            <span class="rounded-xl bg-emerald-400 p-3 text-xl text-[#102a43]">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </span>
                            <span class="text-xs font-semibold uppercase tracking-widest text-emerald-200">Nuestro propósito</span>
                        </div>
                        <p class="mt-8 text-2xl font-bold leading-snug">Formación integral para transformar vidas.</p>
                        <div class="mt-8 grid grid-cols-2 gap-3">
                            <div class="rounded-xl bg-black/10 p-4">
                                <p class="text-2xl font-black text-emerald-300">01</p>
                                <p class="mt-1 text-xs text-sky-100/70">Gestión clara</p>
                            </div>
                            <div class="rounded-xl bg-black/10 p-4">
                                <p class="text-2xl font-black text-emerald-300">02</p>
                                <p class="mt-1 text-xs text-sky-100/70">Acceso simple</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="nuestra-propuesta" class="grid gap-6 lg:grid-cols-[0.85fr_1.15fr]">
            <div class="rounded-3xl bg-white p-7 shadow-sm ring-1 ring-slate-200 sm:p-9">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-emerald-100 text-xl text-[#087f5b]">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <p class="mt-6 text-xs font-bold uppercase tracking-[0.18em] text-emerald-700">Nuestra institución</p>
                <h2 class="mt-3 text-2xl font-black tracking-tight text-[#102a43]">SENA: educación que abre oportunidades</h2>
                <p class="mt-4 text-sm leading-7 text-slate-600">
                    El Servicio Nacional de Aprendizaje cumple la misión de invertir en el desarrollo social y técnico de los trabajadores colombianos, ofreciendo formación profesional integral y oportunidades para construir un mejor futuro.
                </p>
            </div>

            <div class="rounded-3xl bg-slate-100 p-7 sm:p-9">
                <div class="flex items-start justify-between gap-5">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-700">Nuestra propuesta</p>
                        <h2 class="mt-3 text-2xl font-black tracking-tight text-[#102a43]">Todo lo que necesitas, en un solo lugar</h2>
                    </div>
                    <span class="hidden rounded-2xl bg-white p-3 text-xl text-[#1d4e6f] shadow-sm sm:block">
                        <i class="fa-solid fa-layer-group"></i>
                    </span>
                </div>
                <div class="mt-7 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl bg-white p-5 shadow-sm">
                        <i class="fa-solid fa-database text-lg text-emerald-600"></i>
                        <h3 class="mt-4 text-sm font-bold text-[#102a43]">Información organizada</h3>
                        <p class="mt-2 text-xs leading-5 text-slate-500">Administra registros académicos y recursos con mayor claridad.</p>
                    </div>
                    <div class="rounded-2xl bg-white p-5 shadow-sm">
                        <i class="fa-solid fa-bolt text-lg text-amber-500"></i>
                        <h3 class="mt-4 text-sm font-bold text-[#102a43]">Procesos ágiles</h3>
                        <p class="mt-2 text-xs leading-5 text-slate-500">Reduce pasos y encuentra lo importante de forma rápida.</p>
                    </div>
                    <div class="rounded-2xl bg-white p-5 shadow-sm">
                        <i class="fa-solid fa-users text-lg text-sky-600"></i>
                        <h3 class="mt-4 text-sm font-bold text-[#102a43]">Comunidad conectada</h3>
                        <p class="mt-2 text-xs leading-5 text-slate-500">Facilita el trabajo de administradores, instructores y aprendices.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-6 md:grid-cols-2">
            <article class="group rounded-3xl bg-white p-7 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg sm:p-9">
                <div class="flex items-center gap-4">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#102a43] text-lg text-emerald-300">
                        <i class="fa-solid fa-compass"></i>
                    </span>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-700">Nuestro norte</p>
                        <h2 class="mt-1 text-2xl font-black text-[#102a43]">Misión</h2>
                    </div>
                </div>
                <p class="mt-6 text-sm leading-7 text-slate-600">
                    Brindar formación profesional integral incorporando nuevas tecnologías para el desarrollo productivo, social y humano del país.
                </p>
            </article>

            <article class="group rounded-3xl bg-[#1d4e6f] p-7 text-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg sm:p-9">
                <div class="flex items-center gap-4">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-lg text-emerald-300">
                        <i class="fa-solid fa-eye"></i>
                    </span>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-200">Hacia dónde vamos</p>
                        <h2 class="mt-1 text-2xl font-black">Visión</h2>
                    </div>
                </div>
                <p class="mt-6 text-sm leading-7 text-sky-100/80">
                    Consolidarnos como una solución confiable y cercana que impulse la innovación tecnológica, la educación y el talento humano.
                </p>
            </article>
        </section>

        <section class="overflow-hidden rounded-3xl border border-emerald-100 bg-gradient-to-br from-emerald-50 via-white to-sky-50 px-6 py-9 sm:px-10">
            <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-center">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-emerald-700">Construyamos juntos</p>
                    <h2 class="mt-2 text-2xl font-black tracking-tight text-[#102a43] sm:text-3xl">La formación transforma. La tecnología la potencia.</h2>
                    <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-600">Conoce las herramientas de AdminSENA y participa en una gestión más eficiente, accesible y preparada para el futuro.</p>
                </div>
                <a href="{{ route('home') }}" class="shrink-0 inline-flex items-center gap-2 rounded-xl bg-[#102a43] px-5 py-3 text-sm font-bold text-white no-underline transition hover:bg-[#1d4e6f]">
                    Ir al inicio
                    <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                </a>
            </div>
        </section>
    </div>
@endsection
