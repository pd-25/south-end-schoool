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
    <div class="row mb-4 justify-content-center">
      <div class="col-lg-12 text-center">
        <h2>Library</h2>
        <p>The library at South End School is a "Resource Centre" which boasts of a vast collection of story books, reference books, encyclopedias, knowledge books, periodicals, magazines and daily newspaper. After issuing books, the children browse through the collection of encyclopedias and magazines during and after school hours.</p>
        </div>
    </div>	
		<div class="row">
		<div class="col-lg-6">
       <img src="{{ asset('frontend-asset/images/lib1.jpg') }}" class="img-fluid w-100 border-radius">
      </div>
	  <div class="col-lg-6">
       <img src="{{ asset('frontend-asset/images/lib2.jpg') }}" class="img-fluid w-100 border-radius">
      </div>
    </div>
	
  </div>
</section>	
@endsection
