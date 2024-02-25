<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agencia de Tlaltinango</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <style>
            .icono-blanco {
            color: white;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('style.css') }}">
    </head>
    <body>
        <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="#"><img src="img/core-img/logo.png" alt=""></a>
                            </div>
                            <div class="login-content">
                            @if (Route::has('login'))
                <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Iniciar sesión</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Regístrate</a>
                        @endif
                    @endauth
                <!-- </div> -->
            @endif
                            <!-- <div class="login-content">
                                <a href="#">Register / Login</a>  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="#">Teléfono de contacto</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                            <div class="call-center">
                                <a href="#"><i class="fas fa-phone"></i> <span>(+52) 951 171 2033</span></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" width="50%" style="background-image: url(img/bg-img/iglesia3.jpeg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h4 style="color: rgb(29, 203, 218); text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;" data-animation="fadeInUp" data-delay="100ms">Cuenta con una iglesia</h4>
                                <h2 style="color: rgb(29, 203, 218); text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;" data-animation="fadeInUp" data-delay="400ms">Católica para los habitantes <br>de nuestra comunidad</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" width="50%" style="background-image: url(img/bg-img/festividad.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h4 style="color: rgb(29, 203, 218); text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;" data-animation="fadeInUp" data-delay="100ms">Santo Domingo Tlaltinango</h4>
                                <h2 style="color: rgb(29, 203, 218); text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;" data-animation="fadeInUp" data-delay="400ms">Comunidad Llena <br>De Tradiciones</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" width="50%" style="background-image: url(img/bg-img/agencia.jpeg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h4 style="color: rgb(29, 203, 218); text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;" data-animation="fadeInUp" data-delay="100ms">Agencia Municipal</h4>
                                <h2 style="color: rgb(29, 203, 218); text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;" data-animation="fadeInUp" data-delay="400ms">Para el progreso de <br>Nuestra Comunidad</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Top Feature Area Start ##### -->
    <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="features-content">
                        <div class="row no-gutters">
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="fas fa-book"></i>
                                    <h5>Centros Religiosos</h5>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="fas fa-graduation-cap"></i>
                                    <h5>Centros Educativos</h5>
                                </div>
                            </div>
                            <!-- Single Top Features -->
                            <div class="col-12 col-md-4">
                                <div class="single-top-features d-flex align-items-center justify-content-center">
                                    <i class="fas fa-users"></i>
                                    <h5>Diversidad Cultural</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Feature Area End ##### -->

    <!-- ##### Course Area Start ##### -->
    <div class="academy-courses-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <div class="course-icon">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <div class="course-content">
                            <h4>Casa de salud</h4>
                            <p>Es utilizada para aplicar vacunas a nuestros ciudadanos.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                        <div class="course-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <div class="course-content">
                            <h4>Día de las madres</h4>
                            <p>Festejamos a las mamás en su día.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Course Area -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                        <div class="course-icon">
                            <i class="fas fa-child"></i>
                        </div>
                        <div class="course-content">
                            <h4>Día del niño</h4>
                            <p>Porque los pequeños son el futuro, celebramos juntos su día.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Course Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    <div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(img/bg-img/iglesia3.jpeg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                        <span>Nuestra población</span>
                        <h3>Adéntrate en Santo Domingo Tlaltinango</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="400ms">
                        <div class="testimonial-thumb">
                            <img src="img/bg-img/preescolarImg.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5>Preescolar</h5>
                            <p>Contamos con un jardín de niños dentro de la población para el desarrollo de nuestros niños, en el cual laboran maestros de una excelente calidad para un mejor desarrollo de la población.</p>
                            <h6>Jardín de Niños<span> Carmen Ramos del Río</span></h6>
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="500ms">
                        <div class="testimonial-thumb">
                            <img src="img/bg-img/primariaImg.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5>Escuela primaria</h5>
                            <p>Dentro de nuestra comunidad se encuentra una escuela primaria, en la cual los niños de nuestra comunidad reciben el aprendizaje necesario para que se puedan superar y desarrollar mejor en el hámbito escolar para la siguiente etapa de su educación.</p>
                            <h6>Escuela Primaria <span>Abraham Castellanos</span></h6>
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="600ms">
                        <div class="testimonial-thumb">
                            <img src="img/bg-img/panteonImg.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5>Panteón de la comunidad</h5>
                            <p>Contamos con un panteón dentro de la comunidad al servicio de los ciudadanos, esto con el fin de que se le brinden los servicios a sus familiares tras su fallecimiento y poder tenerlos cerca aún después de muertos.</p>
                            <h6>Panteón de <span>Santo Domingo Tlaltinango</span></h6>
                        </div>
                    </div>
                </div>
                <!-- Single Testimonials Area -->
                <div class="col-12 col-md-6">
                    <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="700ms">
                        <div class="testimonial-thumb">
                            <img src="img/bg-img/santoImg.jpg" alt="">
                        </div>
                        <div class="testimonial-content">
                            <h5>Santo patrón</h5>
                            <p>La fiesta patronal que se festeja en esta comunidad es en honor a Santo Domingo de Guzmán, debido a la historia que se tiene desde sus orígenes en nuestra comunidad.</p>
                            <h6> Santo Patrón <span>Santo Domingo de Guzmán </span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Testimonials Area End ##### -->

    

    <!-- ##### Partner Area Start ##### -->
    <div class="partner-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partners-logo d-flex align-items-center justify-content-between flex-wrap">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Partner Area End ##### -->

    <!-- ##### CTA Area Start ##### -->
    <div class="call-to-action-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                        <h3>¿Qué esperar para visitar nuestra comunidad?</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                            </div>
                            <p>Conoce Santo Domingo Tlaltinango y disfruta de sus tradiciones.</p>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Agunas tradiciones</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="#">Fiesta patronal</a></li>
                                    <li><a href="#">Festividad del día de muertos</a></li>
                                    <li><a href="#">Día de las madres</a></li>
                                    <li><a href="#">Día del niño</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Imágenes</h6>
                            </div>
                            <div class="gallery-list d-flex justify-content-between flex-wrap">
                                <a href="img/bg-img/primaria2.jpeg" class="gallery-img" title="Primaria"><img src="img/bg-img/primaria.jpg" alt=""></a>
                                <a href="img/bg-img/santo1.jpg" class="gallery-img" title="Santo Domingo"><img src="img/bg-img/santo1.jpg" alt=""></a>
                                <a href="img/bg-img/santo2.jpg" class="gallery-img" title="Santo Domingo"><img src="img/bg-img/santo2.jpg" alt=""></a>
                                <a href="img/bg-img/templo.jpg" class="gallery-img" title="Iglesia"><img src="img/bg-img/templo.jpg" alt=""></a>
                                <a href="img/bg-img/templo2.jpg" class="gallery-img" title="Iglesia"><img src="img/bg-img/templo2.jpg" alt=""></a>
                                <a href="img/bg-img/templo3.jpg" class="gallery-img" title="Iglesia"><img src="img/bg-img/templo3.jpg" alt=""></a>
                                <a href="img/bg-img/panteon.jpeg" class="gallery-img" title="Panteón"><img src="img/bg-img/panteonImg.jpg" alt=""></a>
                                <a href="img/bg-img/jardin-de-ninos.jpeg" class="gallery-img" title="Jardín de niños"><img src="img/bg-img/preescolarImg.jpg" alt=""></a>
                                <a href="img/bg-img/logo1.jpeg" class="gallery-img" title="Logo"><img src="img/bg-img/logo1.jpeg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contacto</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="fab fa-google icono-blanco"></i>
                                <p>agenciamunicipaltlaltinago@gmail.com</p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="fas fa-mobile icono-blanco"></i>
                                <p>Celular: (+52) 951 171 2033</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados a la Agencia de Santo Domingo Tlaltinango
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }} "></script>
    <!-- Popper js -->
    <script src="{{ asset('js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('js/active.js') }}"></script>
    </body>
</html>
