@extends('frontend.layout.main')

@section('content')
<section id="inner-banner-slider" class="banner-slider main-banner">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
    <div class="carousel-inner" role="listbox"> 
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('{{ asset('frontend-asset/images/inner-banner.jpg') }}');">
        <canvas id="canvas"></canvas>
        <div class="carousel-caption">
          </div>
      </div>
    </div>
  </div>
</section>
    <!-- Page Content -->
	<section id="inn-pg-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>Class Rooms</h2>
        <p>South End School provides a neat and hygienic environment inside the bright and spacious classrooms of all grades.</p>
        </div>
    </div>	
	<div class="row">
      <div class="col-lg-6 align-self-center pr-lg-5 pr-xl-5">
        <h3>Pre- Primary Classrooms (Nursery, Lkg & Ukg)</h3>
        <p>The Pre-Primary classrooms are colourful and spacious and equipped with child-friendly furniture like low tables and low chairs. LED TVs in Nursery, L.K.G. and U.K.G. classrooms are utilised by the teachers to deliver digital lessons to the children. Each of the Pre-Primary classrooms has a capacity of 40 students to apply a significant teaching - learning process for the sake of our children.</p>
        </div>
		<div class="col-lg-6 pl-lg-0 pl-xl-0">
       <img src="{{ asset('frontend-asset/images/classroom1.jpg') }}" class="img-fluid w-100">
      </div>
    </div>
	<div class="row">
	<div class="col-lg-6 pr-lg-0 pr-xl-0">
       <img src="{{ asset('frontend-asset/images/classroom2.jpg') }}" class="img-fluid w-100">
      </div>
      <div class="col-lg-6 align-self-center pl-lg-5 pl-xl-5">
        <h3>Primary, Middle School & Senior School Classrooms (Grade I – X)</h3>
        <p>These classrooms are well decorated with aesthetically pleasing colours. Each of these classrooms are airy, spacious and have an optimum balance of natural as well as artificial light. Presence of teaching-aids, ergonomically designed furniture ensuring physical comfort of the students are provided inside these classrooms. Each of these classrooms has a capacity 40 students to apply a significant teaching-learning process for the sake of our children.</p>
        </div>
    </div>
  </div>
</section>	
@endsection
