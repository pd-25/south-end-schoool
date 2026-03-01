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
    <div class="row mb-lg-2">
      <div class="col-lg-6 align-self-center">
        <h2>About The School</h2>
        <p> Welcome to <b>South End School</b>, an academic institution that has redefined education in the heart of the town at <b>Nalhati</b>.</p>
		<p>Our wonderful deeply missed <b>late Justice Nure Alam Chowdhury</b> sir to propagate his vision for <b>‘English Medium Education’</b> established <b>South End School</b> in the year of 2010 at Nalhati in the district of <b>Birbhum</b>. It is a co-educational school and is now affiliated to the <b>COUNCIL FOR THE INDIAN SCHOOL CERTIFICATE EXAMINATIONS, New Delhi (ICSE)</b>.</p>
		<p>The school started with <b>65 students</b> and won the trust of parents significantly by continuous hard work with dedication. Our institution has at present <b>815 students</b>.</p>
        </div>
		<div class="col-lg-6">
       <img src="{{ asset('frontend-asset/images/school-pic.jpg') }}" class="img-fluid">
      </div>
    </div>
	<div class="row">
       <div class="col-lg-12">
        <p>Our founder always spoke about building a better society by the grace of holistic education and obeying his philosophy, the members of South End School as a united family are always focused on enhancing the skills of academics, communication, Physical fitness and socio-cultural activities as well as the ability of Critical thinking and Problem solving with scientific practices of our students to prepare them as better citizens of this nation.</p>
		<p><b>South End School</b> believes in unifying ancient values with modern learning tools that helps to develop formative and summative assessment of students learning in a challenging but enjoyable environment. This school is run by <b>‘Peoples Social Service Society’</b>, a charitable organization. </p>
        </div>
    </div>
	
  </div>
</section>	
@endsection