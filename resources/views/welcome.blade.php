@extends('layouts.app')

@section('title', 'Inicio | AdminSENA')

@section('content')
    <style>
        /* BANNER */
        .banner{ margin-top:25px; background:linear-gradient(135deg,#102a43,#1d4e6f); color:white; padding:35px; border-radius:15px; box-shadow:0 12px 30px rgba(16,42,67,.18); }
        .banner h1 { font-size: 26px; margin-bottom: 8px; }
        .banner p { font-size: 15px; opacity: 0.95; }

        /* SECCIÓN DE ANUNCIOS */
        .news-section { margin-top: 35px; }
        .news-title { font-size: 20px; color: #333; margin-bottom: 20px; font-weight: bold; }
        .news-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
        .news-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,.05); transition: .3s; display: flex; flex-direction: column; }
        .news-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,.1); }
        .news-header-bg { background: #1d4e6f; color: white; padding: 25px; text-align: center; font-size: 28px; }
        .news-body { padding: 20px; display: flex; flex-direction: column; flex-grow: 1; }
        .news-body h4 { font-size: 17px; color: #333; margin-bottom: 10px; }
        .news-body p { font-size: 13px; color: #666; margin-bottom: 20px; line-height: 1.4; flex-grow: 1; }
        
        .btn-ver-mas { align-self: flex-start; padding: 8px 16px; background: transparent; border: 2px solid #159a75; color: #087f5b; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 13px; cursor: pointer; transition: .3s; }
        .btn-ver-mas:hover { background: #159a75; color: white; }

        /* SECCIÓN CARRUSEL */
        .featured-news-section { margin-top: 35px; margin-bottom: 30px; position: relative; }
        .carousel-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .carousel-btns { display: flex; gap: 10px; }
        .carousel-btn { background: white; border: 1px solid #ccc; color: #333; width: 35px; height: 35px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: 0.2s; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .carousel-btn:hover { background: #159a75; color: white; border-color: #159a75; }

        .featured-carousel-container {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            padding-bottom: 10px;
            scrollbar-width: none;
        }
        .featured-carousel-container::-webkit-scrollbar { display: none; }

        .featured-card { 
            flex: 0 0 calc(33.333% - 14px); 
            min-width: 300px;
            background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,.05); transition: .3s; display: flex; flex-direction: column; border: 1px solid #eaeaea; scroll-snap-align: start; 
        }
        .featured-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,.1); }
        .featured-img-container { width: 100%; height: 160px; overflow: hidden; background: #e9ecef; position: relative; }
        .featured-img-container img { width: 100%; height: 100%; object-fit: cover; transition: 0.3s; }
        .featured-card:hover .featured-img-container img { transform: scale(1.05); }
        
        /* ETIQUETAS DE ESTADO DINÁMICAS */
        .featured-badge { position: absolute; top: 12px; left: 12px; color: white; font-size: 11px; font-weight: bold; padding: 4px 10px; border-radius: 20px; z-index: 2; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
        .badge-activa { background: #159a75; }
        .badge-proceso { background: #007bff; }
        .badge-finalizada { background: #6c757d; }
        .badge-inscripciones { background: #ffc107; color: #212529 !important; }

        .featured-content { padding: 20px; display: flex; flex-direction: column; flex-grow: 1; }
        .featured-content h4 { font-size: 16px; color: #333; margin-bottom: 8px; }
        .featured-content p { font-size: 13px; color: #666; margin-bottom: 15px; line-height: 1.4; flex-grow: 1; }
        
        .featured-footer { display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: #888; border-top: 1px solid #f1f1f1; padding-top: 12px; margin-top: auto; }
        
        /* BOTÓN DE ACCESO DIRECTO EN TARJETA */
        .featured-action { margin-top: 12px; display: flex; justify-content: flex-end; }
        .btn-card-action { background: #f8f9fa; border: 1px solid #dee2e6; color: #333; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer; transition: 0.2s; text-decoration: none; display: inline-flex; align-items: center; gap: 5px; }
        .btn-card-action:hover { background: #159a75; color: white; border-color: #159a75; }

        /* ESTILOS PARA LOS PUNTOS (DOTS) */
        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-top: 15px;
        }
        .carousel-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #ccc;
            border: none;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }
        .carousel-dot.active {
            background: #159a75;
            transform: scale(1.2);
        }

        /* BOTÓN FLOTANTE CIRCULAR "IR ARRIBA" */
        .btn-to-top {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: #39A900;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
        }
        .btn-to-top.show { opacity: 1; visibility: visible; }
        .btn-to-top:hover { background: #087f5b; transform: translateY(-4px); box-shadow: 0 6px 16px rgba(21,154,117,0.35); }

        /* MODAL */
        .modal { display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); align-items: center; justify-content: center; }
        .modal-content { background: white; padding: 30px; border-radius: 15px; width: 90%; max-width: 500px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); position: relative; animation: fadeIn 0.3s ease; }
        .close-modal { position: absolute; right: 20px; top: 15px; font-size: 24px; cursor: pointer; color: #aaa; }
        .close-modal:hover { color: #333; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 768px) {
            .featured-card { flex: 0 0 100%; }
        }
    </style>
        <!-- CONTENIDO PRINCIPAL -->
            <div class="banner" id="welcomeBanner">
                <h1 id="welcomeTitle">Bienvenido Invitado 👋</h1>
                <p>Desde este panel podrás administrar cursos, aprendices, instructores, centros de formación y equipos de manera eficiente.</p>
            </div>

            <section id="adminDashboardContent" class="hidden">
            <!-- TARJETAS DE CONTEO -->
            <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl border-t-4 border-[#159a75] bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-4 text-3xl text-[#159a75]"><i class="fas fa-user-graduate"></i></div>
                    <h3 class="text-sm font-semibold text-slate-500">Aprendices</h3>
                    <p class="mt-1 text-3xl font-bold text-[#087f5b]">{{ $totalAprendices }}</p>
                </div>
                <div class="rounded-2xl border-t-4 border-[#1d4e6f] bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-4 text-3xl text-[#159a75]"><i class="fas fa-chalkboard-user"></i></div>
                    <h3 class="text-sm font-semibold text-slate-500">Instructores</h3>
                    <p class="mt-1 text-3xl font-bold text-[#087f5b]">{{ $totalInstructores }}</p>
                </div>
                <div class="rounded-2xl border-t-4 border-[#159a75] bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-4 text-3xl text-[#159a75]"><i class="fas fa-book"></i></div>
                    <h3 class="text-sm font-semibold text-slate-500">Cursos</h3>
                    <p class="mt-1 text-3xl font-bold text-[#087f5b]">{{ $totalCursos }}</p>
                </div>
                <div class="rounded-2xl border-t-4 border-[#1d4e6f] bg-white p-6 shadow-sm ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-4 text-3xl text-[#159a75]"><i class="fas fa-computer"></i></div>
                    <h3 class="text-sm font-semibold text-slate-500">Equipos</h3>
                    <p class="mt-1 text-3xl font-bold text-[#087f5b]">{{ $totalEquipos }}</p>
                </div>
            </div>
            </section>

            <!-- SECCIÓN 1: ANUNCIOS GENERALES -->
            <div class="news-section">
                <h3 class="news-title">Anuncios y Nuevas Ofertas</h3>
                <div class="news-grid">
                    <div class="news-card">
                        <div class="news-header-bg"><i class="fas fa-bullhorn"></i></div>
                        <div class="news-body">
                            <h4>Convocatoria de Formación Titulada</h4>
                            <p>Entérate de las nuevas ofertas educativas disponibles para este trimestre y las inscripciones abiertas.</p>
                            <button class="btn-ver-mas" onclick="openModal('modal1')">Ver más</button>
                        </div>
                    </div>

                    <div class="news-card">
                        <div class="news-header-bg"><i class="fas fa-laptop-code"></i></div>
                        <div class="news-body">
                            <h4>Mantenimiento de Equipos</h4>
                            <p>Consulta el cronograma de revisión técnica y actualización de software para los computadores de las áreas.</p>
                            <button class="btn-ver-mas" onclick="openModal('modal2')">Ver más</button>
                        </div>
                    </div>

                    <div class="news-card">
                        <div class="news-header-bg"><i class="fas fa-calendar-alt"></i></div>
                        <div class="news-body">
                            <h4>Capacitaciones y Talleres</h4>
                            <p>Participa en las jornadas especiales de desarrollo web, control de versiones y bases de datos organizadas por la institución.</p>
                            <button class="btn-ver-mas" onclick="openModal('modal3')">Ver más</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SECCIÓN 2: CARRUSEL DE FICHAS Y EVENTOS DESTACADOS (CON ESTADOS Y BOTÓN DE ACCESO) -->
            <div class="featured-news-section">
                <div class="carousel-header">
                    <h3 class="news-title" style="margin-bottom:0;">Nuevas Fichas y Eventos Destacados</h3>
                    <div class="carousel-btns">
                        <button class="carousel-btn" onclick="scrollCarousel(-1)"><i class="fas fa-chevron-left"></i></button>
                        <button class="carousel-btn" onclick="scrollCarousel(1)"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
                
                <div class="featured-carousel-container" id="featuredCarousel">
                    <!-- Tarjeta 1 -->
                    <div class="featured-card">
                        <div class="featured-img-container">
                            <span class="featured-badge badge-activa">Activa</span>
                            <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=600&q=80" alt="Programación">
                        </div>
                        <div class="featured-content">
                            <h4>Ficha 2875310 - ADSO</h4>
                            <p>Inicio de trimestre para las nuevas tecnologías orientadas al diseño de arquitecturas web completas.</p>
                            <div class="featured-footer">
                                <span><i class="fas fa-calendar-day"></i> Agosto 2026</span>
                                <span style="color: #39A900; font-weight:600;">Mañana</span>
                            </div>
                            <div class="featured-action">
                                <button class="btn-card-action" onclick="openModal('modalFicha1')"><i class="fas fa-arrow-right"></i> Ver Ficha</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 2 -->
                    <div class="featured-card">
                        <div class="featured-img-container">
                            <span class="featured-badge badge-inscripciones">Inscripciones</span>
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80" alt="Laboratorios">
                        </div>
                        <div class="featured-content">
                            <h4>Nuevos Ambientes de Redes</h4>
                            <p>Habilitación de laboratorios optimizados con estaciones de trabajo de alto rendimiento para servidores.</p>
                            <div class="featured-footer">
                                <span><i class="fas fa-calendar-day"></i> Próximamente</span>
                                <span style="color: #39A900; font-weight:600;">Bloque C</span>
                            </div>
                            <div class="featured-action">
                                <button class="btn-card-action" onclick="openModal('modalFicha2')"><i class="fas fa-arrow-right"></i> Ver Ficha</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 3 -->
                    <div class="featured-card">
                        <div class="featured-img-container">
                            <span class="featured-badge badge-proceso">En Proceso</span>
                            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=600&q=80" alt="Multimedia">
                        </div>
                        <div class="featured-content">
                            <h4>Ficha 2901142 - Multimedia</h4>
                            <p>Diseño y montaje de interfaces gráficas interactivas orientadas a la experiencia de usuario móvil.</p>
                            <div class="featured-footer">
                                <span><i class="fas fa-calendar-day"></i> Septiembre 2026</span>
                                <span style="color: #39A900; font-weight:600;">Tarde</span>
                            </div>
                            <div class="featured-action">
                                <button class="btn-card-action" onclick="openModal('modalFicha3')"><i class="fas fa-arrow-right"></i> Ver Ficha</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 4 -->
                    <div class="featured-card">
                        <div class="featured-img-container">
                            <span class="featured-badge badge-finalizada">Finalizada</span>
                            <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=600&q=80" alt="Gestión">
                        </div>
                        <div class="featured-content">
                            <h4>Ficha 2915880 - Gestión</h4>
                            <p>Jornada académica enfocada en estrategias de liderazgo, selección de personal y clima organizacional.</p>
                            <div class="featured-footer">
                                <span><i class="fas fa-calendar-day"></i> Octubre 2026</span>
                                <span style="color: #39A900; font-weight:600;">Mixta</span>
                            </div>
                            <div class="featured-action">
                                <button class="btn-card-action" onclick="openModal('modalFicha4')"><i class="fas fa-arrow-right"></i> Ver Ficha</button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta 5 -->
                    <div class="featured-card">
                        <div class="featured-img-container">
                            <span class="featured-badge badge-activa">Evento</span>
                            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=600&q=80" alt="Feria">
                        </div>
                        <div class="featured-content">
                            <h4>Feria de Innovación SENA</h4>
                            <p>Exposición de proyectos finales desarrollados por aprendices de todas las especialidades tecnológicas.</p>
                            <div class="featured-footer">
                                <span><i class="fas fa-calendar-day"></i> Noviembre 2026</span>
                                <span style="color: #39A900; font-weight:600;">Auditorio</span>
                            </div>
                            <div class="featured-action">
                                <button class="btn-card-action" onclick="openModal('modalFicha5')"><i class="fas fa-arrow-right"></i> Ver Ficha</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CONTENEDOR DE PUNTOS INDICADORES -->
                <div class="carousel-dots" id="carouselDots"></div>
            </div>
    <!-- BOTÓN FLOTANTE CIRCULAR "IR ARRIBA" -->
    <a href="#" id="backToTopBtn" class="btn-to-top" title="Ir arriba">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- VENTANAS MODALES GENERALES -->
    <div id="modal1" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modal1')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:15px;">Convocatoria de Formación Titulada</h3>
            <p style="color:#555; line-height: 1.6;">Las inscripciones están abiertas para técnicos y tecnólogos. Acércate al centro de formación o revisa los requisitos académicos en la plataforma Sofia Plus del SENA.</p>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modal2')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:15px;">Cronograma de Mantenimiento</h3>
            <p style="color:#555; line-height: 1.6;">El soporte técnico preventivo de los equipos de cómputo se realizará por bloques de áreas. Asegúrate de respaldar tu información y apagar correctamente los terminales.</p>
        </div>
    </div>

    <div id="modal3" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modal3')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:15px;">Capacitaciones de Desarrollo</h3>
            <p style="color:#555; line-height: 1.6;">Talleres prácticos orientados al uso de herramientas modernas de desarrollo web (Laravel, PHP, React y control de versiones con Git). Cupos limitados.</p>
        </div>
    </div>

    <!-- VENTANAS MODALES PARA EL ACCESO DIRECTO DE CADA FICHA -->
    <div id="modalFicha1" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modalFicha1')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:10px;">Ficha 2875310 - ADSO</h3>
            <p style="font-size:12px; color:#007bff; font-weight:bold; margin-bottom:15px;">Estado: Activa</p>
            <p style="color:#555; line-height: 1.6;">Detalles de la ficha: Tecnólogo en Análisis y Desarrollo de Software. Jornada Mañana. Instructor líder asignado y control de ambientes habilitado en el sistema.</p>
        </div>
    </div>

    <div id="modalFicha2" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modalFicha2')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:10px;">Nuevos Ambientes de Redes</h3>
            <p style="font-size:12px; color:#ffc107; font-weight:bold; margin-bottom:15px;">Estado: Inscripciones Abiertas</p>
            <p style="color:#555; line-height: 1.6;">Espacio dedicado a la configuración de redes locales y servidores virtuales. Capacidad máxima para 30 aprendices por sesión en el Bloque C.</p>
        </div>
    </div>

    <div id="modalFicha3" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modalFicha3')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:10px;">Ficha 2901142 - Multimedia</h3>
            <p style="font-size:12px; color:#007bff; font-weight:bold; margin-bottom:15px;">Estado: En Proceso</p>
            <p style="color:#555; line-height: 1.6;">Módulos enfocados en diseño UI/UX, prototipado avanzado y optimización de recursos gráficos para plataformas digitales.</p>
        </div>
    </div>

    <div id="modalFicha4" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modalFicha4')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:10px;">Ficha 2915880 - Gestión</h3>
            <p style="font-size:12px; color:#6c757d; font-weight:bold; margin-bottom:15px;">Estado: Finalizada</p>
            <p style="color:#555; line-height: 1.6;">Ciclo formativo completado satisfactoriamente. Historial de notas, asistencias y entrega de proyectos almacenados en el archivo histórico.</p>
        </div>
    </div>

    <div id="modalFicha5" class="modal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('modalFicha5')">&times;</span>
            <h3 style="color:#39A900; margin-bottom:10px;">Feria de Innovación SENA</h3>
            <p style="font-size:12px; color:#39A900; font-weight:bold; margin-bottom:15px;">Estado: Evento Programado</p>
            <p style="color:#555; line-height: 1.6;">Encuentro anual donde se evalúan los prototipos tecnológicos creados por las diferentes fichas de formación en el Auditorio Principal.</p>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            updateWelcomeTitle();
            showAdminContent();
            initScrollToTop();
            initCarouselDots();
        });

        function showAdminContent() {
            const adminContent = document.getElementById('adminDashboardContent');
            const role = (localStorage.getItem('user_role') || '').toLowerCase();

            if (adminContent && role === 'administrador') {
                adminContent.classList.remove('hidden');
            }
        }

        function updateWelcomeTitle() {
            const welcomeTitle = document.getElementById('welcomeTitle');
            if (!welcomeTitle) return;

            let userSession = null;
            try {
                userSession = JSON.parse(localStorage.getItem('user_session'));
            } catch (error) {
                localStorage.removeItem('user_session');
            }

            const role = userSession && userSession.role
                ? userSession.role
                : 'Invitado';

            welcomeTitle.textContent = `Bienvenido ${role} 👋`;
        }

        function initScrollToTop() {
            const btn = document.getElementById('backToTopBtn');
            if (!btn) return;

            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    btn.classList.add('show');
                } else {
                    btn.classList.remove('show');
                }
            });

            btn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // LÓGICA DE PUNTOS INDICADORES Y CARRUSEL AJUSTADA
        function initCarouselDots() {
            const container = document.getElementById('featuredCarousel');
            const dotsContainer = document.getElementById('carouselDots');
            const cards = container.querySelectorAll('.featured-card');

            if (!container || !dotsContainer || cards.length === 0) return;

            dotsContainer.innerHTML = ''; // Limpiar puntos previos

            function getVisibleCount() {
                if (window.innerWidth <= 768) return 1;
                return 3;
            }

            const totalSlides = Math.max(1, cards.length - getVisibleCount() + 1);

            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('button');
                dot.classList.add('carousel-dot');
                if (i === 0) dot.classList.add('active');
                
                dot.addEventListener('click', () => {
                    const cardWidth = cards[0].offsetWidth + 20;
                    container.scrollTo({ left: cardWidth * i, behavior: 'smooth' });
                });

                dotsContainer.appendChild(dot);
            }

            container.addEventListener('scroll', () => {
                const cardWidth = cards[0].offsetWidth + 20;
                const index = Math.round(container.scrollLeft / cardWidth);
                const dots = dotsContainer.querySelectorAll('.carousel-dot');
                
                dots.forEach((dot, i) => {
                    if (i === index) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            });
        }

        window.addEventListener('resize', initCarouselDots);

        function scrollCarousel(direction) {
            const container = document.getElementById('featuredCarousel');
            const card = container.querySelector('.featured-card');
            
            if (!card) return;

            const scrollDistance = card.offsetWidth + 20; 
            const maxScrollLeft = container.scrollWidth - container.clientWidth;

            if (direction === 1) {
                if (container.scrollLeft >= maxScrollLeft - 10) {
                    container.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    container.scrollBy({ left: scrollDistance, behavior: 'smooth' });
                }
            } else {
                if (container.scrollLeft <= 10) {
                    container.scrollTo({ left: maxScrollLeft, behavior: 'smooth' });
                } else {
                    container.scrollBy({ left: -scrollDistance, behavior: 'smooth' });
                }
            }
        }

        function openModal(modalId) { document.getElementById(modalId).style.display = 'flex'; }
        function closeModal(modalId) { document.getElementById(modalId).style.display = 'none'; }

        window.addEventListener('click', function(event) {
            if (event.target.classList.contains('modal')) { event.target.style.display = "none"; }
        });
    </script>
@endsection