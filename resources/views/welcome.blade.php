<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>DisplayWBP-App</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style5.css') }}">

    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}"> --}}

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="wrapper">
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
                            data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">{{ $key }}</a>
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
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <div style="margin: auto; margin-left: 27%;" class="text-center">
                        {{-- <p class="text-center">{{ $blokname }}</p> --}}
                        <img style="margin: auto; display: block; float: left; margin-top: 5px;" width="70px;"
                            src="{{ url('/img/logo.png') }}" alt="logo">
                        {{-- <div style="margin: auto;"> --}}
                        <p style="margin: 0; float: left; margin-left: 5px;">KEMENTRIAN HUKUM DAN HAK ASASI
                            MANUSIA RI
                        </p>
                        <br>
                        <p style="margin: 0;float: left; margin-left: 5px;">KANTOR WILAYAH DKI JAKARTA</p>
                        <p style="margin: 0;float: left; margin-left: 5px;">LEMBAGA PEMASYARAKATAN KELAS IIA SALEMBA
                        </p>
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
                                                @foreach ($item['part1'] as $key => $p)
                                                    <div class="col-md-3">
                                                        <div class="card" style="width: 18rem;">
                                                            <img class="card-img-top"
                                                                src="{{ url('img/img_error_backup/not-found.svg') }}">
                                                            <div class="card-body">
                                                                <h5 class="card-title" style="min-height: 70px;">
                                                                    {{ $p['data_wbp']->nama != null ? $p['data_wbp']->nama : 'ini gada' }}
                                                                </h5>
                                                                <p class="card-text">
                                                                    {{ $p['data_wbp']->agama }}
                                                                </p>
                                                                <p class="card-text">
                                                                    {{ $p['data_wbp']->no_reg_instansi }}
                                                                </p>
                                                                <p class="card-text">Pidana
                                                                    {{ $p['data_wbp']->total_hukuman }}
                                                                </p>
                                                                <p class="card-text">Eks.
                                                                    {{ $p['data_wbp']->tgl_ekspirasi }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="row ini-sec" style="width: 100%;display: inline-flex;">
                                                @foreach ($item['part2'] as $key => $p)
                                                    <div class="col-md-3">
                                                        <div class="card" style="width: 18rem;">
                                                            <img class="card-img-top"
                                                                src="{{ url('img/img_error_backup/not-found.svg') }}">
                                                            <div class="card-body">
                                                                <h5 class="card-title" style="min-height: 70px;">
                                                                    {{ $p['data_wbp']->nama != null ? $p['data_wbp']->nama : 'ini gada' }}
                                                                </h5>
                                                                <p class="card-text">
                                                                    {{ $p['data_wbp']->agama }}
                                                                </p>
                                                                <p class="card-text">
                                                                    {{ $p['data_wbp']->no_reg_instansi }}
                                                                </p>
                                                                <p class="card-text">Pidana
                                                                    {{ $p['data_wbp']->total_hukuman }}
                                                                </p>
                                                                <p class="card-text">Eks.
                                                                    {{ $p['data_wbp']->tgl_ekspirasi }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($item as $u)
                                            <div class="col-md-3 mb-5">
                                                <div class="card" style="width: 18rem;">
                                                    <img class="card-img-top"
                                                        src="{{ url('img/img_error_backup/not-found.svg') }}">
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="min-height: 70px;">
                                                            {{ $u['data_wbp']->nama != null ? $u['data_wbp']->nama : 'ini gada' }}
                                                        </h5>
                                                        <p class="card-text">{{ $u['data_wbp']->agama }}
                                                        </p>
                                                        <p class="card-text">
                                                            {{ $u['data_wbp']->no_reg_instansi }}
                                                        </p>
                                                        <p class="card-text">Pidana
                                                            {{ $u['data_wbp']->total_hukuman }}</p>
                                                        <p class="card-text">Eks.
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

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
