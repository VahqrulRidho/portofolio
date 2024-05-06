@extends('layouts.app-tampilan')
@section('title', 'Frontend')
@section('content')

    <!-- ======= Hero Section ======= -->
    <div id="hero" class="hero route bg-image" style="background-image: url(assets/img/home2.jpg)">
        <div class="overlay-itro"></div>
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <!--<p class="display-6 color-d">Hello, world!</p>-->
                    <h1 class="hero-title mb-4">About Me </h1>
                    <p class="hero-subtitle"><span class="typed"
                            data-typed-items="{{ $profil->nama }}, Student at Padang State University"></span></p>
                    <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
                </div>
            </div>
        </div>
    </div><!-- End Hero Section -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="profile" class="about-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-5">
                                            <div class="about-img">
                                                <img src="{{ url('gambar/profile/' . $profil->foto) }}" width="160"
                                                    height="160" style="border-radius: 8%;" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-7">
                                            <div class="about-info">
                                                <p><span class="title-s">Name : </span> <span>{{ $profil->nama }}</span>
                                                </p>
                                                <p><span class="title-s">Tanggal Lahir : </span>
                                                    <span>{{ \Carbon\Carbon::parse($profil->tgl_lahir)->isoFormat('D MMMM YYYY') }}</span>

                                                </p>
                                                <p><span class="title-s">Usia : </span> <span>{{ $profil->usia }}</span>
                                                </p>
                                                <p><span class="title-s">Pekerjaan : </span>
                                                    <span>{{ $profil->pekerjaan }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-mf">
                                        <p class="title-s">Skill</p>
                                        @foreach ($skill as $keahlian)
                                            <span>{{ $keahlian->nama }}</span> <span
                                                class="pull-right">{{ $keahlian->keahlian }}%</span>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{ $keahlian->keahlian }}%;" aria-valuenow="85"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="about-me pt-4 pt-md-0">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                Profile
                                            </h5>
                                        </div>
                                        <p class="lead">
                                            {!! $profil->deskripsi !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services-mf pt-5 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Services
                            </h3>
                            <p class="subtitle-a">
                                {{-- Lorem ipsum, dolor sit amet consectetur adipisicing elit. --}}
                            </p>
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($services as $service)
                        <div class="col-md-4">
                            <div class="service-box">

                                <div class="service-ico">
                                    <span class="ico-circle">0{{ $loop->iteration }}</span>
                                </div>
                                <div class="service-content">
                                    <h2 class="s-title">{{ $service->nama }}</h2>
                                    <p class="s-description text-center">
                                        {{ $service->deskripsi }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Counter Section ======= -->
        <div class="section-counter paralax-mf bg-image" style="background-image: url(assets/img/counters-bg.jpg)">
            <div class="overlay-mf"></div>
            <div class="container position-relative">
                <div class="row justify-content-center">
                    @foreach ($skillUp as $skills)
                        <div class="col-sm-3 col-lg-3">
                            <div class="counter-box counter-box pt-4 pt-md-0">
                                <div class="counter-ico">
                                    <span class="ico-circle">0{{ $loop->iteration }}</span>
                                </div>
                                <div class="counter-num">
                                    <p data-purecounter-start="0" data-purecounter-end="{{ $skills->keahlian }}"
                                        data-purecounter-duration="1" class="counter purecounter"></p>
                                    <span class="counter-text">{{ $skills->nama }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div><!-- End Counter Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portofolio" class="portfolio-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Portfolio
                            </h3>
                            {{-- <p class="subtitle-a">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            </p> --}}
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($portofolios as $portofolio)
                        <div class="col-md-4">
                            <div class="work-box">
                                @php
                                    $foto = \App\Models\FotoPortofolio::where('id_portofolio', $portofolio->id)
                                        ->oldest()
                                        ->first();
                                @endphp
                                <a href="{{ url('gambar/portofolio/' . $foto->foto) }}" data-gallery="portfolioGallery"
                                    class="portfolio-lightbox">
                                    <div class="work-img">
                                        <img src="{{ url('gambar/portofolio/' . $foto->foto) }}" alt=""
                                            height="250px" width="430px">
                                    </div>
                                </a>
                                <div class="work-content">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <h2 class="w-title">{{ $portofolio->judul }}</h2>
                                            <div class="w-more">
                                                <span class="w-ctegory">{{ $portofolio->kategori }}</span> / <span
                                                    class="w-date">{{ \Carbon\Carbon::parse($portofolio->tgl_project)->isoFormat('MMMM YYYY') }}</span>
                                            </div>
                                        </div>
                                        @php
                                            $id = App\Helpers\EncryptionHelper::encrypt($portofolio->id);
                                        @endphp
                                        <div class="col-sm-4">
                                            <div class="w-like">
                                                <a href="{{ route('portofolio', $id) }}"> <span
                                                        class="bi bi-plus-circle"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Portfolio Section -->


        <!-- ======= Blog Section ======= -->
        <section id="resume" class="blog-mf sect-pt4 route">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title-box text-center">
                            <h3 class="title-a">
                                Resume
                            </h3>
                            {{-- <p class="subtitle-a">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                            </p> --}}
                            <div class="line-mf"></div>
                        </div>
                    </div>
                </div>


                <div class="row justify-content-center">
                    @foreach ($resumes as $resume)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3>{{ $resume->nama }}</h3>
                                </div>
                                @php
                                    $details = \App\Models\ResumeDetail::where('id_resume', $resume->id)
                                        ->orderBy('id', 'ASC')
                                        ->get();
                                @endphp

                                <div class="card-body">
                                    @foreach ($details as $detail)
                                        <h5>
                                            {{ $detail->judul }}
                                        </h5>
                                        <div class="mx-3">
                                            <p>{!! $detail->deskripsi !!}
                                            </p>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Blog Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="paralax-mf footer-paralax bg-image sect-mt4 route"
            style="background-image: url(assets/img/overlay-bg.jpg)">
            <div class="overlay-mf"></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="contact-mf">
                            <div id="contact" class="box-shadow-full">
                                <div class="col-md-12">
                                    @if (Session::has('success'))
                                        <div class="pt-0">
                                            <div class="alert alert-success alert-simple alert-inline show-code-action">
                                                {{ Session::get('success') }}
                                            </div>
                                        </div>
                                    @endif
                                    @if (Session::has('error'))
                                        <div class="pt-0">
                                            <div class="alert alert-danger alert-simple alert-inline show-code-action">
                                                {{ Session::get('error') }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="title-box-2">
                                            <h5 class="title-left">
                                                Send Message Us
                                            </h5>
                                        </div>
                                        <div>
                                            <form action="{{ route('kirim.pesan') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="text" name="nama" class="form-control"
                                                                id="nama" placeholder="Your Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" placeholder="Your Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="subject"
                                                                id="subject" placeholder="Subject" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="pesan" rows="5" placeholder="Message" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-center my-3">
                                                        <div class="loading">Loading</div>
                                                        <div class="error-message"></div>
                                                        <div class="sent-message">Your message has been sent. Thank
                                                            you!</div>
                                                    </div>
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit"
                                                            class="button button-a button-big button-rouded">Send
                                                            Message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-box-2 pt-4 pt-md-0">
                                            <h5 class="title-left">
                                                Get in Touch
                                            </h5>
                                        </div>
                                        <div class="more-info">
                                            <p class="lead">
                                                Dalam semangat menciptakan inovasi dan kreativitas, saya mengundang Anda
                                                untuk berbagi pesan dan kesan yang membangun. Mari kita bersama-sama
                                                merangkai langkah untuk mencapai kepuasan bersama. Bersama, kita mampu
                                                mengubah ide menjadi kenyataan dan membentuk masa depan yang lebih baik.
                                            </p>
                                            <p class="lead">
                                                Silahkan sampaikan kesan dan pesan anda melalui pesan di samping!!
                                            </p>
                                            <ul class="list-ico">
                                                <li><span class="bi bi-geo-alt"></span>{{ $contact->alamat }}</li>
                                                <li><span class="bi bi-phone"></span>
                                                    {{ substr($contact->no_hp, 0, 4) }}********</li>
                                                <li><span class="bi bi-envelope"></span> {{ $contact->email }}</li>
                                            </ul>
                                        </div>
                                        <div class="socials">
                                            <ul>

                                                @if ($contact->facebook)
                                                    <li><a href="{{ $contact->facebook }}" target="_blank"><span
                                                                class="ico-circle"><i
                                                                    class="bi bi-facebook"></i></span></a></li>
                                                @endif
                                                @if ($contact->instagram)
                                                    <li><a href="{{ $contact->instagram }}" target="_blank"><span
                                                                class="ico-circle"><i
                                                                    class="bi bi-instagram"></i></span></a></li>
                                                @endif
                                                @if ($contact->linkedin)
                                                    <li><a href="{{ $contact->linkedin }}" target="_blank"><span
                                                                class="ico-circle"><i
                                                                    class="bi bi-linkedin"></i></span></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

@endsection
