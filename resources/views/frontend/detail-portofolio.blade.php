@extends('layouts.app-tampilan')
@section('title', 'Portofolio')
@section('content')
    <div class="hero hero-single route bg-image" style="background-image: url(assets/img/overlay-bg.jpg)">
        <div class="overlay-mf"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <h2 class="hero-title mb-4">Detail Portfolio</h2>
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}#hero">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Detail Portfolio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <main id="main">

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                @foreach ($fotos as $foto)
                                    <div class="swiper-slide">
                                        <img src="{{ url('gambar/portofolio/' . $foto->foto) }}" width="550px"
                                            height="500px" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>Informasi Project</h3>
                            <ul>
                                <li><strong>Kategori</strong> : {{ $portofolio->kategori }}</li>
                                <li><strong>Klient</strong> : {{ $portofolio->klien }}</li>
                                <li><strong>Waktu Pengerjaan Project</strong> :
                                    {{ \Carbon\Carbon::parse($portofolio->tgl_project)->isoFormat(' MMMM YYYY') }}</li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Deskripsi Singkat</h2>
                            <p>
                                {{ $portofolio->deskripsi }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->

    </main><!-- End #main -->

@endsection
