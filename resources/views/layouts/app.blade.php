<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="O 30 Semanas é um ministério cristão de cura e transformação emocional, baseado em princípios terapêuticos e fundamentado integralmente na Bíblia. Seu objetivo é restaurar relacionamentos com Deus, consigo mesmo e com o próximo, ajudando pessoas a superarem traumas, vícios, hábitos nocivos e feridas emocionais profundas.">
    <meta name="keywords"
        content="Áreas de recuperação que são tratadas: Orfandade, Rejeição, Compulsão, Perfeccionismo, Sexualidade, Codependência, Ira, Baixa Autoestima, Dependência Química, Procrastinação, Ansiedade, Religiosidade, Luto/Perdas, Pânico/Medo/Depressão."
    <meta name="Igreja da Cidade" content="30 Semanas">
    <title>30 Semanas | Igreja da Cidade - São José dos Campos - SP</title>
    <link rel="shortcut icon" href="{{ asset('assets/30semanas/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/30semanas/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/30semanas/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/30semanas/css/colors/orange.css') }}">
    <link rel="preload" href="{{ asset('assets/30semanas/css/fonts/urbanist.css') }}" as="style"
        onload="this.rel='stylesheet'">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>




    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- <meta name="api-username" content="{{ config('api.username') }}"> --}}
    {{-- <meta name="api-token" content="{{ config('api.token') }}"> --}}




</head>

<body style="background-color: #f0ead9">

    @if (session('error'))
        <div class="bg-primary text-white fw-bold fs-15 mb-0">
            <div class="container py-2 text-center">
                <div class="d-inline-flex align-items-center gap-2">
                    <i class="uil uil-exclamation-circle fs-22"></i>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        </div>
    @endif

    {{-- <div class="page-frame "> --}}
    {{-- <div class="content-wrapper"> --}}

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    {{-- </div> --}}

    @include('partials.footer')

    {{-- </div> --}}

    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <script src="{{ asset('assets/30semanas/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/30semanas/js/theme.js') }}"></script>



    <style>
        .mobile-text {
            display: none;
        }

        @media (max-width: 768px) {
            .desktop-text {
                display: none;
            }

            .mobile-text {
                display: inline;
            }
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00', {
                reverse: true
            });
        });

        $(document).ready(function() {
            $('#cep').mask('99.999-999', {
                reverse: true
            });
        });

        $(document).ready(function() {
            var options = {
                onKeyPress: function(celular, e, field, options) {
                    var masks = ['(00) 0000-00009', '(00) 00000-0000'];
                    var mask = (celular.length > 14) ? masks[1] : masks[0];
                    $('#whatsapp').mask(mask, options);
                }
            };
            $('#whatsapp').mask('(00) 00000-0000', options);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener("click", function(event) {
                    event.preventDefault();
                    const target = document.querySelector(this.getAttribute("href"));
                    if (target) {
                        window.scrollTo({
                            top: target.offsetTop - 100, // Ajuste se o menu for fixo
                            behavior: "smooth"
                        });
                    }
                });
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

    <script>
        setTimeout(() => {
            const alertBar = document.querySelector('.bg-primary.text-white.fw-bold');
            if (alertBar) {
                alertBar.style.transition = 'opacity 0.5s ease';
                alertBar.style.opacity = '0';
                setTimeout(() => alertBar.remove(), 500);
            }
        }, 4000); // 4 segundos
    </script>


</body>

</html>
