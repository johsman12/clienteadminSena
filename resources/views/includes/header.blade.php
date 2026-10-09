<header class="border-b border-slate-200 bg-white">
    <nav class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8" aria-label="Navegación principal">
        <a href="{{ url('/') }}" class="flex items-center gap-3 text-slate-900 no-underline">
            <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-600 text-lg font-bold text-white shadow-sm">A</span>
            <span>
                <span class="block text-lg font-bold leading-tight">AdminSENA</span>
                <span class="block text-xs font-medium text-slate-500">Panel de administración</span>
            </span>
        </a>

        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('areas.index') }}"
               @class([
                   'rounded-lg px-4 py-2 text-sm font-semibold no-underline transition',
                   'bg-emerald-50 text-emerald-700' => request()->routeIs('areas.*'),
                   'text-slate-600 hover:bg-slate-100 hover:text-slate-900' => !request()->routeIs('areas.*'),
               ])>
                Áreas
            </a>
            
        </div>
    </nav>
</header>