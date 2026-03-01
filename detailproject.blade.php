<title>Ahan's Portfolio | Detail Project</title>

@extends('frontend')
@section('content')

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Ahan's Portfolio</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}#hero">Home</a></li>
                    <li><a href="{{ url('/') }}#about">About</a></li>
                    <li><a href="{{ url('/') }}#portfolio" class="active">Portfolio</a></li>
                    <li><a href="{{ url('/') }}#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main project-header-section pt-2">
        <div class="container" data-aos="fade-up">

            <div class="d-flex align-items-center gap-3 mb-4">
                <a href="{{ url('/') }}#portfolio" class="back-btn"><i class="bi bi-arrow-left"></i> Back</a>
                <nav class="breadcrumbs m-0">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $project->nama_project }}</li>
                    </ol>
                </nav>
            </div>

            <div class="row gy-5 align-items-start">

                <div class="col-lg-7">
                    <h1 class="project-title">{{ $project->nama_project }}</h1>
                    <div class="title-line"></div>

                    <p class="description-text mb-4">
                        {{ $project->detail }}
                    </p>
                    <div class="tech-used">
                        <h5 class="fw-bold mb-4"><i class="bi bi-code-slash text-primary"></i> Technologies Used</h5>
                        <span class="badge bg-light text-dark p-3 px-4 border rounded-pill" style="font-size: large;">{{ $project->tech_using }}</span>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="media-card mb-4 shadow">
                        <div class="portfolio-details-slider swiper init-swiper">
                            <script type="application/json" class="swiper-config">
                                {
                                    "loop": true,
                                    "speed": 600,
                                    "autoplay": {
                                        "delay": 5000
                                    },
                                    "slidesPerView": "auto",
                                    "pagination": {
                                        "el": ".swiper-pagination",
                                        "type": "bullets",
                                        "clickable": true
                                    }
                                }
                            </script>
                            <div class="swiper-wrapper align-items-center">
                                @for($i=1; $i<=3; $i++)
                                    @php $img='gambar' .$i; @endphp
                                    @if($project->$img)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/' . $project->$img) }}" class="img-fluid" alt="">
                                    </div>
                                    @endif
                                    @endfor
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="feature-card shadow-sm">
                        <h5 class="fw-bold mb-4"><i class="bi bi-star-fill text-warning"></i> Project Information</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3 d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Client :</span>
                                <span class="fw-bold text-dark">{{ $project->client }}</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Date :</span>
                                <span class="fw-bold text-dark">{{ \Carbon\Carbon::parse($project->tanggal)->format('d M, Y') }}</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Category :</span>
                                <span class="fw-bold text-dark">Web Application</span>
                            </li>
                            <li class="mb-3 d-flex justify-content-between border-bottom pb-2">
                                <span class="text-muted">Link :</span>
                                <span class="fw-bold text-dark">
                                    @if($project->link)
                                    <a href="{{ $project->link }}" target="_blank" class="text-primary text-decoration-none">
                                        Visit Link <i class="bi bi-box-arrow-up-right small"></i>
                                    </a>
                                    @else
                                    <span class="fw-bold text-dark">Local Used</span>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </main>

    @endsection