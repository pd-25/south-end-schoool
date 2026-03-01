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
      <div class="col-lg-12 mb-3 text-center">
        <h2>School Management Committee</h2>
        </div>
		 </div>		
		<div class="row mb-5 justify-content-center">
		<div class="col-lg-4">
		<div class="committee-box">
       <img src="{{ asset('frontend-asset/images/late-asleha-khatun.jpg') }}" class="img-fluid w-100 mb-3">
	   <h3>Pioneer of Education</h3>
	   <p class="c_name">Late Asleha Khatun</p>
      </div>
	  </div>
	  <div class="col-lg-4">
		<div class="committee-box">
       <img src="{{ asset('frontend-asset/images/late-justice-nure-alam-chowdhury.jpg') }}" class="img-fluid w-100 mb-3">
	   <h3>Founder of School</h3>
	   <p class="c_name">Late Justice Nure Alam Chowdhury</p>
      </div>
	  </div>
    </div>	
	<div class="row justify-content-center">
		<div class="col-lg-4">
		<div class="committee-box com-box-height">
       <img src="{{ asset('frontend-asset/images/president1.jpg') }}" class="img-fluid w-100 mb-3">
	   <h3>President of School</h3>
	   <p class="c_name mb-2">Prof. (Dr.) MAMTAZ SANGHAMITA</p>
	   <p class="mb-0">Former M.P. (Lok Sabha)</p>
	   <p class="mb-0"> Former Vice-President, ISOPARB</p>
	   <p class="mb-0">Former H.O.D., Eden Hospital, Dept. of O & G</p>
	   <p class="mb-0">Medical College, Calcutta</p>
	   <p class="mb-0">Former Prof. & H.O.D. SIMS, Gaziabad, Uttar Pradesh</p>
      </div>
	  </div>
	  <div class="col-lg-4">
		<div class="committee-box com-box-height">
       <img src="{{ asset('frontend-asset/images/secretary1.jpg') }}" class="img-fluid w-100 mb-3">
<h3>Secretary of School</h3>
<p class="c_name mb-2">Mr. IMRAN KARIM</p>
	   <p> Lawyer, Calcutta High Court </p>
      </div>
	  </div>
	  <div class="col-lg-4">
		<div class="committee-box com-box-height">
       <img src="{{ asset('frontend-asset/images/treasurer1.jpg') }}" class="img-fluid w-100 mb-3">
	   <h3>Treasurer of School</h3>
	   <p class="c_name mb-2">Dr. SHABANA ROZE CHOWDHURY</p>
	   <p class="mb-0">MBBS, DMCW, MPH, Ph.D., MIPHA, FRSPH</p>
	   <p class="mb-0">Public Health Specialist</p>
      </div>
	  </div>
    </div>
  </div>
</section>	
@endsection
