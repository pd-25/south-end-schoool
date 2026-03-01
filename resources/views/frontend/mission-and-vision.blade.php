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
  <div class="row mb-3">
      <div class="col-lg-12 text-center">
        <h2>Our Mission & Vision</h2>
		</div>
    </div>		
    <div class="row">
	<div class="col-lg-6 pr-0">
       <img src="{{ asset('frontend-asset/images/mission-image.jpg') }}" class="img-fluid w-100">
      </div>
      <div class="col-lg-6 align-self-center pl-lg-5">
		<h3>Our Mission</h3>
        <p>South End School is determined to provide high-quality education, a holistic student-centric environment to its pupils for multifaceted development where children are given equity to bring forth their abilities and are encouraged as well as empowered to channelize their potential in the pursuit of distinction.</p>
		<p>Our mission is to educate our students to realize, contribute to and succeed in a rapidly changing society.</p>
        </div>		
    </div>
<div class="row">
      <div class="col-lg-6 align-self-center pr-lg-5">
		<h3>Our Vision</h3>
        <p>Our vision is to encourage our students in developing both practical and theoretical knowledge that will enable them to better understand the World and inspire them to be compassionate, responsible and innovative citizens committed to contribute for the sake of our nation. </p>
        </div>
		<div class="col-lg-6 pl-0">
       <img src="{{ asset('frontend-asset/images/vision-images.jpg') }}" class="img-fluid w-100">
      </div>		
    </div>	
	<div class="row mt-5">
      <div class="col-lg-12 text-center">
	  <div class="motto-box">
		<h2>Our Motto</h2>
        <p><i class="fa fa-quote-left" aria-hidden="true"></i> Achieve excellence together and present the nation with young minds having the calibre of driving this country towards distinction.<i class="fa fa-quote-right" aria-hidden="true"></i></p>
        </div>	
		</div>	
    </div>
  </div>
</section>	
@endsection
