@extends('layouts.app')

@section('title', 'Iniciar sesión | AdminSENA')

@section('content')
<div class="mx-auto flex min-h-[calc(100vh-8rem)] max-w-md items-center justify-center">
    <div class="w-full overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="bg-[#39A900] px-6 py-6 text-center text-white">
            <div class="mx-auto mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-white/15 text-2xl">🔐</div>
            <h1 class="text-xl font-bold">Iniciar sesión</h1>
            <p class="mt-1 text-sm text-green-50">Ingresa tus datos para continuar</p>
        </div>

        <form id="loginPageForm" class="space-y-5 p-6" onsubmit="executeLogin(event)">
            <div>
                <label for="userName" class="mb-1.5 block text-sm font-semibold text-slate-700">Nombre completo</label>
                <input type="text" id="userName" autocomplete="name" required class="block w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-[#39A900] focus:ring-2 focus:ring-green-100" placeholder="Ej. Carlos Pérez">
            </div>
            <div>
                <label for="userEmail" class="mb-1.5 block text-sm font-semibold text-slate-700">Correo electrónico</label>
                <input type="email" id="userEmail" autocomplete="email" required class="block w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-[#39A900] focus:ring-2 focus:ring-green-100" placeholder="ejemplo@sena.edu.co">
            </div>
            <div>
                <label for="userPass" class="mb-1.5 block text-sm font-semibold text-slate-700">Contraseña</label>
                <input type="password" id="userPass" autocomplete="current-password" required minlength="4" class="block w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-[#39A900] focus:ring-2 focus:ring-green-100" placeholder="Mínimo 4 caracteres">
            </div>
            <p id="loginError" class="hidden rounded-lg bg-red-50 px-3 py-2 text-sm text-red-700"></p>
            <button type="submit" class="w-full rounded-lg bg-[#39A900] px-4 py-3 text-sm font-bold text-white hover:bg-green-700">Ingresar</button>
            <a href="{{ route('home') }}" class="block text-center text-sm font-semibold text-slate-500 no-underline hover:text-[#39A900]">Volver al inicio</a>
        </form>
    </div>
</div>

<script>
    function executeLogin(event) {
        event.preventDefault();

        const name = document.getElementById('userName').value.trim();
        const email = document.getElementById('userEmail').value.trim();
        const password = document.getElementById('userPass').value;
        const error = document.getElementById('loginError');
        const roleParam = new URLSearchParams(window.location.search).get('role');
        const role = roleParam === 'administrador' ? 'Administrador' : 'Aprendiz';

        if (password.length < 4) {
            error.textContent = 'La contraseña debe tener al menos 4 caracteres.';
            error.classList.remove('hidden');
            return;
        }

        const userSession = {
            name: name,
            email: email,
            role: role,
            avatar: `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=39A900&color=fff&bold=true`
        };

        localStorage.setItem('user_session', JSON.stringify(userSession));
        localStorage.setItem('user_role', role.toLowerCase());
        window.location.href = role === 'Administrador'
            ? "{{ route('home') }}"
            : "{{ route('dashboard.aprendiz') }}";
    }
</script>
@endsection
