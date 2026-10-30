<footer class="mt-auto border-t-4 border-emerald-400 bg-[#102a43] text-slate-300">
    <div class="mx-auto grid max-w-7xl gap-8 px-6 py-10 sm:grid-cols-2 lg:grid-cols-3 lg:px-8">
        <div>
            <h2 class="text-base font-bold text-white">Servicio Nacional de Aprendizaje (SENA)</h2>
            <p class="mt-3 max-w-md text-sm leading-6 text-sky-100/70">
                Admin-SENA es una plataforma para gestionar la información académica y los recursos institucionales.
            </p>
        </div>

        <div>
            <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Contacto</h3>
            <ul class="mt-3 space-y-2 text-sm text-sky-100/70">
                <li>Dirección institucional SENA</li>
                <li>Teléfono de contacto</li>
                <li>njohsman@gmail.com</li>
            </ul>
        </div>

        <div>
            <h3 class="text-sm font-semibold uppercase tracking-wider text-white">Enlaces útiles</h3>
            <ul class="mt-3 space-y-2 text-sm">
                <li><a href="{{ route('about') }}" class="text-sky-100/70 no-underline transition hover:text-emerald-300">Quiénes Somos</a></li>
                <li><a href="https://oferta.senasofiaplus.edu.co/" target="_blank" rel="noopener noreferrer" class="text-sky-100/70 no-underline transition hover:text-emerald-300">Sofia Plus</a></li>
                <li><a href="{{ route('home') }}" class="text-sky-100/70 no-underline transition hover:text-emerald-300">Inicio</a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-sky-100/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-4 text-xs text-sky-100/50 sm:flex-row sm:items-center sm:justify-between lg:px-8">
            <span>© {{ date('Y') }} Admin-SENA. Todos los derechos reservados.</span>
            <span>Gestión académica y administrativa</span>
        </div>
    </div>
</footer>
