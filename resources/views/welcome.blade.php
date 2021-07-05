<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>DisplayWBP-App</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style5.css') }}">

    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">

    <style>
        .margin-0 {
            margin: 0px;
        }

        .footer {
            height: 100px;
            background-color: #fafafa;
        }

        .img {
            margin: 0 50px;
            padding: 10px;
        }

    </style>

    <!-- Font Awesome JS -->
    <script src="{{ asset('js/solid.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
</head>

<body>

    <div class="wrapper" style="background-color: white;">
        <!-- Sidebar Holder -->
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <a href="{{ url('/') }}">
                    <h3>DisplayWBP-App</h3>
                </a>
            </div>

            <ul class="list-unstyled components">
                <p>Menus</p>
                <li>
                    <a href="{{ route('importExportView') }}">Import CSV</a>
                </li>
                <li>
                    <a href="#lantaiOnly" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">By
                        Blok</a>
                    <ul class="collapse list-unstyled" id="lantaiOnly">
                        @foreach ($blok as $key => $c)
                            <li>
                                <a
                                    href="{{ url('/') }}?blok={{ $key == 'Non Blok' ? '' : $key }}">{{ $key }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @foreach ($blok as $key => $b)
                    <li>
                        <a href="#homeSubmenu{{ str_replace('.', '', str_replace(' ', '', $key)) }}"
                            data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle">{{ $key }}</a>
                        @if ($b != null)
                            <ul class="collapse list-unstyled"
                                id="homeSubmenu{{ str_replace('.', '', str_replace(' ', '', $key)) }}">
                                @foreach ($lantai[$key] as $key1 => $child)
                                    @if (count($child) > 0)
                                        <li>
                                            <a class="dropdown-toggle"
                                                href="#homeSubSubMenu{{ str_replace('.', '', str_replace(' ', '', $key)) }}{{ str_replace('.', '', str_replace(' ', '', $key1)) }}"
                                                class="dropdown-toggle" data-toggle="collapse">{{ $key1 }}</a>
                                            <ul class="collapse list-unstyled"
                                                id="homeSubSubMenu{{ str_replace('.', '', str_replace(' ', '', $key)) }}{{ str_replace('.', '', str_replace(' ', '', $key1)) }}">
                                                @foreach ($child as $sub)
                                                    <li>
                                                        <a
                                                            href="{{ url('/') }}?blok={{ $key == 'Non Blok' ? '' : $key }}&sel={{ $sub['full'] }}">{{ $sub['gafull'] }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ url('/') }}?blok=&sel=">-</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
                {{-- <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content" style="margin-bottom: 100px;">
            <div class="text-center"
                style="margin-left: auto; margin-right: auto; display: block; margin-bottom: 10px;">
                <img width="50%;" src="{{ url('/img/logo.png') }}" alt="logo">
                {{-- <p style="margin: 0; float: right;">KEMENTRIAN HUKUM DAN HAK ASASI
                    MANUSIA RI <br> KANTOR WILAYAH DKI JAKARTA <br> LEMBAGA PEMASYARAKATAN KELAS IIA SALEMBA
                </p>
                <div class="clearfix"></div> --}}
            </div>
            {{-- <div class="clearfix"></div> --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0px; margin-bottom: 10px;">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div style="margin: auto; margin-left: 27%;" class="text-center">
                        {{-- <p class="text-center">{{ $blokname }}</p> --}}
                        {{-- <img style="margin: auto; display: block; float: left; margin-top: 5px;" width="70px;"
                            src="{{ url('/img/logo.png') }}" alt="logo">
                        <p style="margin: 0; float: left; margin-left: 5px;">KEMENTRIAN HUKUM DAN HAK ASASI
                            MANUSIA RI
                        </p>
                        <br>
                        <p style="margin: 0;float: left; margin-left: 5px;">KANTOR WILAYAH DKI JAKARTA</p>
                        <p style="margin: 0;float: left; margin-left: 5px;">LEMBAGA PEMASYARAKATAN KELAS IIA SALEMBA
                        </p> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <section class="slider">
                        @foreach ($dataDisplay as $item)
                            <div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card p-1 mb-2">
                                            <div>
                                                <p class="ml-2" style="float: left;margin: 0;">
                                                    {{ isset($item['part1'][0]['nama_blok']) ? $item['part1'][0]['nama_blok'] : ($item[0]['nama_blok'] == '' ? 'Non-Blok' : $item[0]['nama_blok']) }}
                                                </p>
                                                <p class="mr-2" style="float: right;margin: 0;">
                                                    {{ isset($item['part1'][0]['nama_lantai']) ? $item['part1'][0]['nama_lantai'] : ($item[0]['nama_lantai'] == '' ? 'Non-Sel' : $item[0]['nama_lantai']) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @if (isset($item['part1']))
                                        <div class="second-slider" style="width: 100%">
                                            <div class="row ini-sec" style="width: 100%;display: inline-flex;">
                                                @foreach ($item['part1'] as $key => $u)
                                                    <div class="col-md-3 mb-5 text-center">
                                                        <div class="card"
                                                            style="width: 18rem; margin: auto; border: 6px solid {{ $color[$u['data_wbp']->golongan_registrasi] }}">
                                                            <img class="card-img-top" style="height: 300px"
                                                                src="{{ url('img/img_error_backup/not-found.svg') }}">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    {{ $u['data_wbp']->nama != null ? $u['data_wbp']->nama : 'ini gada' }}
                                                                </h5>
                                                                <p class="margin-0">{{ $u['data_wbp']->agama }}
                                                                </p>
                                                                <p class="margin-0">
                                                                    {{ $u['data_wbp']->no_reg_instansi }}
                                                                </p>
                                                                <p class="margin-0">Pidana
                                                                    {{ $u['data_wbp']->total_hukuman }}</p>
                                                                <p class="margin-0">Eks.
                                                                    {{ $u['data_wbp']->tgl_ekspirasi }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="row ini-sec" style="width: 100%;display: inline-flex;">
                                                @foreach ($item['part2'] as $key => $u)
                                                    <div class="col-md-3">
                                                        <div class="col-md-3 mb-5 text-center">
                                                            <div class="card"
                                                                style="width: 18rem; margin: auto; border: 6px solid {{ $color[$u['data_wbp']->golongan_registrasi] }}">
                                                                <img class="card-img-top" style="height: 300px"
                                                                    src="{{ url('img/img_error_backup/not-found.svg') }}">
                                                                <div class="card-body">
                                                                    <h5 class="card-title">
                                                                        {{ $u['data_wbp']->nama != null ? $u['data_wbp']->nama : 'ini gada' }}
                                                                    </h5>
                                                                    <p class="margin-0">{{ $u['data_wbp']->agama }}
                                                                    </p>
                                                                    <p class="margin-0">
                                                                        {{ $u['data_wbp']->no_reg_instansi }}
                                                                    </p>
                                                                    <p class="margin-0">Pidana
                                                                        {{ $u['data_wbp']->total_hukuman }}</p>
                                                                    <p class="margin-0">Eks.
                                                                        {{ $u['data_wbp']->tgl_ekspirasi }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($item as $u)
                                            <div class="col-md-3 mb-2 text-center">
                                                <div class="card"
                                                    style="width: 18rem; margin: auto; border: 6px solid {{ $color[$u['data_wbp']->golongan_registrasi] }}">
                                                    <img class="card-img-top" style="height: 300px"
                                                        src="{{ url('img/wbp/contoh_foto.jpeg') }}">
                                                    <div class="card-body">
                                                        <h5 class="card-title">
                                                            {{ $u['data_wbp']->nama != null ? $u['data_wbp']->nama : 'ini gada' }}
                                                        </h5>
                                                        <p class="margin-0">{{ $u['data_wbp']->agama }}
                                                        </p>
                                                        <p class="margin-0">
                                                            {{ $u['data_wbp']->no_reg_instansi }}
                                                        </p>
                                                        <p class="margin-0">Pidana
                                                            {{ $u['data_wbp']->total_hukuman }}</p>
                                                        <p class="margin-0">Eks.
                                                            {{ $u['data_wbp']->tgl_ekspirasi }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </section>
                </div>
            </div>
        </div>
        <footer class="fixed-bottom footer mt-5 container-fluid">
            <div style="display: block; text-align: center;">
                <img class="img" src="{{ asset('img/logo1.png') }}" alt="logo1.png" width="10%">
                <img class="img" src="{{ asset('img/logo2.png') }}" alt="logo2.png" width="10%">
                <img class="img" src="{{ asset('img/logo3.png') }}" alt="logo3.png" width="8%">
                <img class="img" src="{{ asset('img/logo4.png') }}" alt="logo4.png" width="10%">
            </div>
        </footer>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
    <script src="{{ asset('js/jquery-2.2.4.js') }}"></script>
    <!-- Popper.JS -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script> --}}
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    {{-- <script src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}

    <script src="{{ asset('js/slick.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });

            $(".slider").on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {

                var $elSlide = $(slick.$slides[currentSlide]);

                var sliderObj = $elSlide.closest('.slick-slider');

                if (sliderObj.hasClass('second-slider')) {
                    return;
                }

                var pager = (currentSlide ? currentSlide : 0) + 1 + "/6";
                $('.page-nav').text("CURRENT SLIDE : " + pager);
            });

            $(".slider").slick({
                autoplay: true,
                dots: false,
                autoplaySpeed: 30000,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 500,
                    settings: {
                        dots: false,
                        arrows: false,
                        infinite: false,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }]
            });

            $(".second-slider").slick({
                autoplay: true,
                dots: false,
                adaptiveHeight: true,
                autoplaySpeed: 15000,
                responsive: [{
                    breakpoint: 500,
                    settings: {
                        dots: false,
                        arrows: false,
                        infinite: false,
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                }]
            });

            $('.second-slider').on('touchstart touchmove mousemove mouseenter', function(e) {
                $('.slider').slick('slickSetOption', 'swipe', false, false);
            });

            $('.second-slider').on('touchend mouseover mouseout', function(e) {
                $('.slider').slick('slickSetOption', 'swipe', true, false);
            });

            $('.slick-track').css('width', '100%');
            $('.slick-slide').css('width', '100%');
            $('.ini-sec').css('width', '100%');
            $('.ini-sec').css('display', 'inline-flex');
        });
    </script>
</body>

</html>
