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
                <h3>DisplayWBP-App</h3>
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div style="width: 100%">
                        <p class="text-center">{{ $blokname }}</p>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <p>{{ $selname }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">
                        <div class="carousel-inner">
                            <?php $index = 0; ?>
                            @foreach ($dataDisplay as $item)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach ($item as $i)
                                            <div class="col-md-3 mb-5">
                                                <div class="card" style="width: 18rem;">
                                                    <img class="card-img-top"
                                                        src="{{ url('img/img_error_backup/not-found.svg') }}">
                                                    {{-- src="{{ url('img/wbp') }}/{{ $i->foto }}"> --}}
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="min-height: 70px;">
                                                            {{ $i->nama }}</h5>
                                                        <p class="card-text">{{ $i->no_reg_instansi }}
                                                        </p>
                                                        <p class="card-text">{{ $i->agama }}</p>
                                                        <p class="card-text">Pidana
                                                            {{ $i->total_hukuman }}</p>
                                                        <p class="card-text">Eks.
                                                            {{ $i->tgl_ekspirasi }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @php
                                    $index++;
                                @endphp
                            @endforeach
                            {{-- <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('img/wbp/not-found.svg') }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title
                                                    and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('img/wbp/not-found.svg') }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title
                                                    and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('img/wbp/not-found.svg') }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title
                                                    and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('img/wbp/not-found.svg') }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title
                                                    and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('img/wbp/not-found.svg') }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title
                                                    and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('img/wbp/not-found.svg') }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title
                                                    and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('img/wbp/not-found.svg') }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title
                                                    and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card" style="width: 18rem;">
                                            <img class="card-img-top" src="{{ url('img/wbp/not-found.svg') }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Card title</h5>
                                                <p class="card-text">Some quick example text to build on the card title
                                                    and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <a class="carousel-control-prev color-btn" href="#carouselExampleControls" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next color-btn" href="#carouselExampleControls" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>
