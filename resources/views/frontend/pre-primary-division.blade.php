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
    <div class="row mb-4">
      <div class="col-lg-12 text-center">
        <h2>Pre-primary Division</h2>
        <p>The PRE-PRIMARY section comprise classes of Nursery, L.K.G. and U.K.G. With age group ranging from 3 years to 5 years.</p>
		<p>Knowing that no two children are alike, the school provides for training where the different needs of the children are dealt with individually, scientifically and with utmost care.</p>
		<p>The Nursery, L.K.G. and U.K G. classes are under close guidance of a team of highly qualified and experienced professionals who look after the children with utmost care and love to ensure healthy development of the children from a very young age. Emphasis is given on Listening, Speaking, Reading and Writing.</p>
		<h4>EVALUATION METHODOLOGY</h4>
		<p>Students’ progress is determined cautiously through conversation, drawing, playing rhymes and other small fun-filled activities.</p>
        </div>
    </div>	
		<div class="row justify-content-center">
		<div class="col-lg-10">
       <img src="{{ asset('frontend-asset/images/demo.jpg') }}" class="img-fluid w-100 border-radius">
      </div>
    </div>
	
  </div>
</section>	
@endsection
