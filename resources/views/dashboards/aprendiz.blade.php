@extends('layouts.app')

@section('title', 'Panel del aprendiz | AdminSENA')

@section('content')
<div class="mx-auto max-w-4xl">
    <div class="rounded-2xl bg-gradient-to-r from-[#39A900] to-green-500 p-6 text-white shadow-sm">
        <p class="text-sm text-green-50">Panel de aprendiz</p>
        <h1 id="apprenticeWelcome" class="mt-1 text-2xl font-bold">Bienvenido</h1>
        <p class="mt-2 text-sm text-green-50">Consulta la información asociada a tu formación.</p>
    </div>

    <div class="mt-6 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
        <h2 class="text-lg font-bold text-slate-900">Detalles de inscripción</h2>
        <div class="mt-4 grid gap-4 sm:grid-cols-2">
            <div class="rounded-lg bg-slate-50 p-4">
                <p class="text-xs font-semibold uppercase text-slate-500">Ficha / Curso</p>
                <p id="apprenticeCourse" class="mt-1 text-sm text-slate-800">
                    {{ data_get($infoAprendiz ?? null, 'curso.nombre', data_get($infoAprendiz ?? null, 'course.course_number', 'No asignado')) }}
                </p>
            </div>
            <div class="rounded-lg bg-slate-50 p-4">
                <p class="text-xs font-semibold uppercase text-slate-500">Centro de Formación</p>
                <p id="apprenticeCenter" class="mt-1 text-sm text-slate-800">
                    {{ data_get($infoAprendiz ?? null, 'curso.centro.nombre', data_get($infoAprendiz ?? null, 'training_center.name', 'No asignado')) }}
                </p>
            </div>
            <div class="rounded-lg bg-slate-50 p-4">
                <p class="text-xs font-semibold uppercase text-slate-500">Computador Asignado</p>
                <p id="apprenticeComputer" class="mt-1 text-sm text-slate-800">
                    {{ data_get($infoAprendiz ?? null, 'computador.serial', data_get($infoAprendiz ?? null, 'computer.number', 'Ninguno')) }}
                </p>
            </div>
            <div class="rounded-lg bg-slate-50 p-4">
                <p class="text-xs font-semibold uppercase text-slate-500">Área</p>
                <p id="apprenticeArea" class="mt-1 text-sm text-slate-800">
                    {{ data_get($infoAprendiz ?? null, 'area.nombre', data_get($infoAprendiz ?? null, 'area.name', 'No asignada')) }}
                </p>
            </div>
        </div>
        <div class="mt-5 border-t border-slate-100 pt-4">
            <p class="text-xs font-semibold uppercase text-slate-500">Correo electrónico</p>
            <p id="apprenticeEmail" class="mt-1 text-sm text-slate-800">No disponible</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const session = JSON.parse(localStorage.getItem('user_session'));
        const role = (localStorage.getItem('user_role') || '').toLowerCase();

        if (!session || role !== 'aprendiz') {
            window.location.href = "{{ route('login', ['role' => 'aprendiz']) }}";
            return;
        }

        document.getElementById('apprenticeWelcome').textContent = `Bienvenido, ${session.name}`;
        document.getElementById('apprenticeEmail').textContent = session.email;

        const info = session.infoAprendiz || session.apprentice || {};
        const course = info.curso || info.course || {};
        const center = course.centro || info.training_center || info.trainingCenter || {};
        const computer = info.computador || info.computer || {};
        const area = info.area || {};

        document.getElementById('apprenticeCourse').textContent =
            course.nombre || course.name || course.course_number || info.course_number || 'No asignado';
        document.getElementById('apprenticeCenter').textContent =
            center.nombre || center.name || 'No asignado';
        document.getElementById('apprenticeComputer').textContent =
            computer.serial || computer.number || computer.brand || 'Ninguno';
        document.getElementById('apprenticeArea').textContent =
            area.nombre || area.name || 'No asignada';
    });
</script>
@endsection
