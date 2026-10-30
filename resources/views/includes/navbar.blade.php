<aside id="app-navbar" class="fixed inset-y-0 left-0 z-50 flex w-64 -translate-x-full flex-col bg-[#102a43] px-4 py-6 text-white shadow-xl transition-transform lg:translate-x-0">
    <div class="flex items-center justify-between border-b border-sky-200/20 pb-5">
        <a href="/" class="flex items-center gap-3 text-xl font-bold text-white no-underline">
            <img src="{{ asset('images/logo-sena..jpg') }}" alt="Logo del SENA" class="h-12 w-12 rounded-lg bg-white object-contain p-1">
            <span>Admin-SENA</span>
        </a>
        <button id="navbarClose" type="button" class="rounded-md p-2 text-white hover:bg-[#1d4e6f] lg:hidden" aria-label="Cerrar menú">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" /></svg>
        </button>
    </div>

    <nav class="mt-6 flex-1">
        <p class="px-3 text-xs font-semibold uppercase tracking-wider text-sky-200">Navegación</p>
        <ul class="mt-3 space-y-1">
            <li><a href="/" class="block rounded-lg border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-slate-100 no-underline hover:border-emerald-400 hover:bg-[#1d4e6f]">Inicio</a></li>
            <li><a href="{{ route('about') }}" class="block rounded-lg border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-slate-100 no-underline hover:border-emerald-400 hover:bg-[#1d4e6f]">Quiénes Somos</a></li>
        </ul>

        <p class="mt-8 px-3 text-xs font-semibold uppercase tracking-wider text-sky-200">Registrar</p>
        <ul class="mt-3 space-y-1">
            <li><a href="{{ route('areas.create') }}" class="block rounded-lg border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-slate-100 no-underline hover:border-emerald-400 hover:bg-[#1d4e6f]">Áreas</a></li>
            <li><a href="{{ route('trainingcenters.create') }}" class="block rounded-lg border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-slate-100 no-underline hover:border-emerald-400 hover:bg-[#1d4e6f]">Centros de Formación</a></li>
            <li><a href="{{ route('computers.create') }}" class="block rounded-lg border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-slate-100 no-underline hover:border-emerald-400 hover:bg-[#1d4e6f]">Computadores</a></li>
            <li><a href="{{ route('courses.create') }}" class="block rounded-lg border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-slate-100 no-underline hover:border-emerald-400 hover:bg-[#1d4e6f]">Cursos</a></li>
            <li><a href="{{ route('teachers.create') }}" class="block rounded-lg border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-slate-100 no-underline hover:border-emerald-400 hover:bg-[#1d4e6f]">Instructores</a></li>
            <li><a href="{{ route('apprentices.create') }}" class="block rounded-lg border-l-2 border-transparent px-3 py-2.5 text-sm font-medium text-slate-100 no-underline hover:border-emerald-400 hover:bg-[#1d4e6f]">Aprendices</a></li>
        </ul>
    </nav>

    <div id="authContainer" class="border-t border-sky-200/20 pt-4"></div>
</aside>

<button id="navbarToggle" type="button" class="fixed left-4 top-4 z-40 rounded-lg bg-[#102a43] p-2 text-white shadow-lg lg:hidden" aria-label="Abrir menú" aria-expanded="false">
    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
</button>
<div id="navbarOverlay" class="fixed inset-0 z-40 hidden bg-slate-900/50 lg:hidden"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const navbar = document.getElementById('app-navbar');
        const toggle = document.getElementById('navbarToggle');
        const close = document.getElementById('navbarClose');
        const overlay = document.getElementById('navbarOverlay');
        const authContainer = document.getElementById('authContainer');

        function setMenu(open) {
            navbar.classList.toggle('-translate-x-full', !open);
            overlay.classList.toggle('hidden', !open);
            toggle.setAttribute('aria-expanded', String(open));
        }

        toggle.addEventListener('click', function () { setMenu(true); });
        close.addEventListener('click', function () { setMenu(false); });
        overlay.addEventListener('click', function () { setMenu(false); });

        const userSession = JSON.parse(localStorage.getItem('user_session'));
        if (userSession) {
            authContainer.innerHTML = `
                <div class="flex items-center gap-2">
                    <img src="${userSession.avatar}" alt="${userSession.name}" class="h-9 w-9 rounded-full border-2 border-white object-cover">
                    <div class="min-w-0">
                        <span class="block truncate text-xs font-bold">${userSession.name}</span>
                        <span class="block truncate text-[11px] text-green-100">${userSession.role}</span>
                    </div>
                </div>
                <button onclick="logout()" class="mt-3 w-full rounded-lg bg-white/10 px-3 py-2 text-left text-sm font-semibold hover:bg-white/20">Cerrar Sesión</button>
            `;
        } else {
            authContainer.innerHTML = `
                <p class="mb-3 text-xs text-green-100">Acceso al sistema</p>
                <div class="space-y-2">
                    <a href="{{ route('login', ['role' => 'aprendiz']) }}" class="block rounded-lg bg-emerald-400 px-3 py-2 text-center text-sm font-bold text-[#102a43] no-underline hover:bg-emerald-300">Iniciar como Aprendiz</a>
                    <a href="{{ route('login', ['role' => 'administrador']) }}" class="block rounded-lg border border-sky-200/30 px-3 py-2 text-center text-sm font-bold text-white no-underline hover:bg-[#1d4e6f]">Iniciar como Administrador</a>
                </div>
            `;
        }
    });

    function logout() {
        localStorage.removeItem('user_session');
        localStorage.removeItem('user_role');
        window.location.href = "{{ url('/') }}";
    }
</script>
