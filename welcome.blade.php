@extends('layouts.app')

@section('body-class', 'welcome-page')

@section('content')
<style>
  /* Modern Hero Carousel Styles */
  .hero {
    position: relative;
    height: 70vh;
    min-height: 500px;
    overflow: hidden;
    background: #f8fafc;
  }

  .hero::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(220, 38, 38, 0.4) 0%, rgba(127, 29, 29, 0.6) 100%);
    pointer-events: none;
    z-index: 1;
  }

  .carousel-inner img {
    width: 100%;
    height: 70vh;
    min-height: 500px;
    object-fit: cover;
    filter: brightness(0.85) contrast(1.05);
  }

  .carousel-caption {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: 5%;
    right: 5%;
    text-align: left;
    z-index: 10;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
  }

  .carousel-caption h5 {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
    color: #ffffff;
    letter-spacing: -0.02em;
    line-height: 1.1;
    max-width: 800px;
  }

  .carousel-caption p {
    font-size: 1.25rem;
    font-weight: 400;
    color: #f9fafb;
    margin-bottom: 0.5rem;
    max-width: 700px;
  }

  .carousel-caption p.subsubtext {
    font-size: 1.1rem;
    font-style: italic;
    color: #e5e7eb;
    margin-bottom: 2rem;
    font-weight: 300;
  }

  /* Modern Button Styles */
  .carousel-caption .btn,
  .hero .btn {
    display: inline-block;
    padding: 0.875rem 2rem;
    border-radius: 0.5rem;
    font-weight: 600;
    font-size: 1rem;
    text-decoration: none;
    transition: all 0.2s ease;
    margin-right: 1rem;
    margin-bottom: 0.5rem;
    border: none;
    cursor: pointer;
  }

  .carousel-caption .btn-primary,
  .hero .btn-primary {
    background: #dc2626;
    color: #ffffff;
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
  }

  .carousel-caption .btn-primary:hover,
  .hero .btn-primary:hover {
    background: #b91c1c;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
  }

  .carousel-caption .btn-outline,
  .hero .btn-outline {
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff;
    border: 2px solid rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(10px);
  }

  .carousel-caption .btn-outline:hover,
  .hero .btn-outline:hover {
    background: rgba(255, 255, 255, 0.25);
    border-color: #ffffff;
    transform: translateY(-2px);
  }

  .carousel-indicators {
    bottom: 30px;
    z-index: 2;
  }

  .carousel-indicators li {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.5);
    border: 2px solid transparent;
    transition: all 0.3s ease;
  }

  .carousel-indicators .active {
    background-color: #dc2626;
    border-color: #ffffff;
    width: 14px;
    height: 14px;
  }

  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    width: 50px;
    height: 50px;
    background-color: rgba(220, 38, 38, 0.8);
    border-radius: 50%;
    backdrop-filter: blur(10px);
  }

  .carousel-control-prev,
  .carousel-control-next {
    width: 8%;
    z-index: 2;
  }

  /* Info Section - Modern Light Design */
  .info-section {
    background: #ffffff;
    padding: 5rem 2rem 3rem;
    text-align: center;
  }

  .info-section h2 {
    font-size: 2.5rem;
    font-weight: 800;
    color: #1f2937;
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
  }

  .info-slideshow-container {
    display: flex;
    align-items: center;
    gap: 4rem;
    max-width: 1200px;
    margin: 0 auto;
    padding: 3rem 2rem;
    background: #f9fafb;
  }

  .info1 {
    flex: 1;
    max-width: 550px;
    padding: 2rem;
  }

  .info1 p {
    font-size: 1.125rem;
    font-weight: 400;
    color: #4b5563;
    line-height: 1.8;
    text-align: left;
  }

  .slideshow {
    flex: 1;
    position: relative;
    height: 400px;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  }

  .slideshow .slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0;
    transition: opacity 1s ease-in-out;
  }

  .slideshow .slide.active {
    opacity: 1;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .carousel-caption h5 {
      font-size: 2rem;
    }

    .carousel-caption p {
      font-size: 1rem;
    }

    .carousel-caption .btn {
      padding: 0.75rem 1.5rem;
      font-size: 0.95rem;
    }

    .info-slideshow-container {
      flex-direction: column;
      gap: 2rem;
      padding: 2rem 1rem;
    }

    .info1 {
      padding: 1rem;
    }

    .slideshow {
      height: 300px;
      width: 100%;
    }

    .info-section h2 {
      font-size: 2rem;
    }
  }

  /* Animation for caption elements */
  .carousel-caption > * {
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.6s ease-out;
  }

  .carousel-item.active .carousel-caption > * {
    opacity: 1;
    transform: translateY(0);
  }

  .carousel-item.active .carousel-caption h5 {
    transition-delay: 0.1s;
  }

  .carousel-item.active .carousel-caption p:first-of-type {
    transition-delay: 0.2s;
  }

  .carousel-item.active .carousel-caption p.subsubtext {
    transition-delay: 0.3s;
  }

  .carousel-item.active .carousel-caption > div {
    transition-delay: 0.4s;
  }
</style>

<section class="hero">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="6000" role="region" aria-label="Homepage carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="list">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://i.ibb.co/DDZ25Cf0/MG-0211.jpg" alt="Exam preparation scene">
        <div class="carousel-caption d-none d-md-block">
          <h5 id="slide-maintext-0">FCEER 2025 Mock Exam Portal</h5>
          <p id="slide-subtext-0">Manage your exams, schedules, and results easily in one secure platform for students and administrators.</p>
          <p id="slide-subsubtext-0" class="subsubtext">Ready ka na, future Isko?</p>
          <div id="slide-buttons-0">
            <a href="/register" class="btn btn-outline">Wait, Pano Yan?</a>
            <a href="/login" class="btn btn-primary">Oo, Tara!</a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://i.ibb.co/0j6vR3Nx/IMG-3415.jpg" alt="Attendance tracking">
        <div class="carousel-caption d-none d-md-block">
          <h5 id="slide-maintext-1">FCEER Attendance Tracker Portal</h5>
          <p id="slide-subtext-1">Track student attendance efficiently and keep your records up to date.</p>
          <p id="slide-subsubtext-1" class="subsubtext">Access your records anytime, anywhere.</p>
          <div id="slide-buttons-1">
            <a href="/login" class="btn btn-primary">Access Tracker</a>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://i.ibb.co/RpR6tVnt/IMG-20230423-163159.jpg" alt="FCEER history">
        <div class="carousel-caption d-none d-md-block">
          <h5>FCEER Profile</h5>
          <p>Access your account details, personal records, and FCEER Profile</p>
          <p class="subsubtext">All in one place.</p>
          <div>
            <a href="{{ route('profile.show') }}" class="btn btn-primary">View Profile</a>
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

<script>
  // Initialize info slideshow
  document.addEventListener('DOMContentLoaded', function() {
    const INFO_SLIDE_DELAY = 5000;
    const infoSlides = document.querySelectorAll('.slideshow .slide');
    let infoSlideIndex = 0;

    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (infoSlides.length > 0 && !prefersReduced) {
      let intervalId = setInterval(() => {
        infoSlides[infoSlideIndex].classList.remove('active');
        infoSlideIndex = (infoSlideIndex + 1) % infoSlides.length;
        infoSlides[infoSlideIndex].classList.add('active');
      }, INFO_SLIDE_DELAY);

      infoSlides.forEach(slide => {
        slide.addEventListener('mouseenter', () => clearInterval(intervalId));
        slide.addEventListener('focusin', () => clearInterval(intervalId));
        slide.addEventListener('mouseleave', () => {
          intervalId = setInterval(() => {
            infoSlides[infoSlideIndex].classList.remove('active');
            infoSlideIndex = (infoSlideIndex + 1) % infoSlides.length;
            infoSlides[infoSlideIndex].classList.add('active');
          }, INFO_SLIDE_DELAY);
        });
      });
    }
  });
</script>
@endsection
