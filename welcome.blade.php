@extends('layouts.app')

@section('body-class', 'welcome-page')

@section('content')
<style>
  .carousel-caption .btn-cta-green {
    display: inline-block;
    background: linear-gradient(180deg,#28b463 0%,#1e8449 100%);
    color: #fff !important;
    padding: 0.6rem 1.05rem;
    border-radius: 9999px;
    font-weight: 600;
    box-shadow: 0 6px 18px rgba(30,132,73,0.28);
    border: none;
    transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
    text-decoration: none;
  }
  .carousel-caption .btn-cta-green:hover{ transform: translateY(-3px); box-shadow: 0 10px 24px rgba(30,132,73,0.36); opacity: .98 }
  .carousel-caption .btn-cta-green:active{ transform: translateY(-1px); }
  .carousel-caption .btn-cta-green:focus{ outline: 3px solid rgba(40,180,99,0.18); outline-offset: 2px }
  /* Style any buttons injected into slide-buttons containers and other hero buttons */
  .carousel-caption #slide-buttons-0 .btn,
  .carousel-caption #slide-buttons-1 .btn,
  .carousel-caption a.btn,
  .carousel-caption .btn,
  .hero .btn { display:inline-block; margin-right:.5rem }

  /* Apply the green pill to any primary/cta buttons in the hero/carousel */
  .carousel-caption a.btn,
  .carousel-caption .btn,
  .hero .btn,
  .hero a.btn { background: linear-gradient(180deg,#28b463 0%,#1e8449 100%) !important; color: #fff !important; padding: 0.6rem 1.05rem; border-radius: 9999px; font-weight:600; box-shadow: 0 6px 18px rgba(30,132,73,0.28); border: none; text-decoration: none; }
  .carousel-caption a.btn:hover, .hero a.btn:hover, .carousel-caption .btn:hover, .hero .btn:hover { transform: translateY(-3px); box-shadow: 0 10px 24px rgba(30,132,73,0.36); }
  .carousel-control-prev-icon, .carousel-control-next-icon{ filter: invert(1) brightness(1.1); }

  /* Secondary button: white background with gray text (for less-emphasized actions) */
  .btn-secondary,
  .carousel-caption .btn-secondary,
  .hero .btn-secondary,
  .carousel-caption a.btn-secondary,
  .hero a.btn-secondary {
    background: #ffffff !important;
    color: #374151 !important; /* gray-700 */
    border: 1px solid #e5e7eb;
    padding: 0.5rem 0.95rem;
    border-radius: 9999px;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(15,23,42,0.06);
    text-decoration: none;
  }
  .btn-secondary:hover, .carousel-caption .btn-secondary:hover, .hero .btn-secondary:hover { background: #f8fafc !important; color: #111827 !important; transform: translateY(-2px); }
  .btn-secondary:active { transform: translateY(-1px); }
</style>

<section class="hero">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" role="region" aria-label="Homepage carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner slides" role="list">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://i.ibb.co/DDZ25Cf0/MG-0211.jpg" alt="Exam preparation scene">
        <div class="carousel-caption d-none d-md-block text-left" aria-live="polite">
          <h5 id="slide-maintext-0"></h5>
          <p id="slide-subtext-0"></p>
          <p id="slide-subsubtext-0" class="subsubtext"></p>
          <div id="slide-buttons-0"></div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://i.ibb.co/0j6vR3Nx/IMG-3415.jpg" alt="Attendance tracking">
        <div class="carousel-caption d-none d-md-block text-left" aria-live="polite">
          <h5 id="slide-maintext-1"></h5>
          <p id="slide-subtext-1"></p>
          <p id="slide-subsubtext-1" class="subsubtext"></p>
          <div id="slide-buttons-1"></div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://i.ibb.co/RpR6tVnt/IMG-20230423-163159.jpg" alt="FCEER history">
        <div class="carousel-caption d-none d-md-block text-left" aria-live="polite">
          <h5>FCEER Profile</h5>
          <p>Access your account details, personal records, and FCEER Profile</p>
          <p class="subsubtext">All in one place.</p>
          <div>
            <a href="{{ route('profile.show') }}" class="btn-cta-green">View Profile</a>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" aria-label="Previous slide">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" aria-label="Next slide">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
@endsection

@section('info-content')
<section class="info-section">
  <div class="info-content">
    <h2>About the FCEER Mock Exam</h2>
  </div>
</section>

<div class="info-slideshow-container">
  <!-- Left side: text -->
  <div class="info1">
    <p>
      Started in 2006, FCEER and its yearly review sessions and mock exams have been dedicated to helping students prepare for their College Entrance Tests (CETs). Our mission is to provide high-quality resources and practice materials that simulate the actual exam experience.
    </p>
  </div>

  <div class="slideshow">
    <div class="slideshow-container">
        <img src="https://i.ibb.co/hFL5J4P1/image.png" class="slide active" alt="Overview image" tabindex="0">
        <img src="https://i.ibb.co/8tbcVpm/image.png" class="slide" alt="Classroom image" tabindex="0">
        <img src="https://i.ibb.co/ym1F11NV/image.png" class="slide" alt="Students studying" tabindex="0">
        <img src="https://i.ibb.co/gFj3Pr1H/MG-0012.jpg" class="slide" alt="Group session" tabindex="0">
    </div>
  </div>
</div>

@endsection
