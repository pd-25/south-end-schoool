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
      <div class="col-lg-12 mb-3">
        <h2>House System</h2>	
<p>All students from class I to IX of South End School are divided into four houses namely</p>	
<h5><b class="col-red">Phoenix</b>, <b class="col-green">Wyvern</b>, <b class="col-blue">Pegasus</b> and <b class="col-yellow">Griffin.</b></h5>		
	   </div>	
	   </div>	
	   
	   <div class="row">
	   <div class="col-lg-12">
	   <div class="syllabust-box">
<div class="media">
  <img src="{{ asset('frontend-asset/images/hs1.png') }}" class="mr-3" alt="...">
  <div class="media-body align-self-center">
   <h5 class="mt-0 mb-0">It symbolizes <b class="col-red">OBSTINACY</b>. It edifies the students to develop a never-give-up attitude to achieve their ambitions.</h5>
  </div>
</div>
</div>
</div>
<div class="col-lg-12">
	   <div class="syllabust-box">
<div class="media">
  <img src="{{ asset('frontend-asset/images/hs2.png') }}" class="mr-3" alt="...">
  <div class="media-body align-self-center">
   <h5 class="mt-0 mb-0">It symbolizes <b class="col-green">ATHLETICISM</b>. It inculcates the students to be physically strong and fit and build a sense of discipline, etiquettes, competitiveness, friendship and spirit.</h5>
  </div>
</div>
</div>
</div>
<div class="col-lg-12">
	   <div class="syllabust-box">
<div class="media">
  <img src="{{ asset('frontend-asset/images/hs3.png') }}" class="mr-3" alt="...">
  <div class="media-body align-self-center">
   <h5 class="mt-0 mb-0">It symbolizes <b class="col-blue">FREEDOM</b>. It enlightens the students to work with liberty and leads themselves towards their goals.</h5>
  </div>
</div>
</div>
</div>
<div class="col-lg-12">
	   <div class="syllabust-box">
<div class="media">
  <img src="{{ asset('frontend-asset/images/hs4.png') }}" class="mr-3" alt="...">
  <div class="media-body align-self-center">
   <h5 class="mt-0 mb-0">It symbolizes <b class="col-yellow">BRAVERY</b>. It motivates the students to be determined to face new challenges with utmost valour and conquer those in strenuous situations of life.</h5>
  </div>
</div>
</div>
</div>

	    </div>	
    </div>
	
</section>	
@endsection
