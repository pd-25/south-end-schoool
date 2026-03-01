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
        <h2>Laboratory</h2>
        <p>South End School provides the facility of Science labs (Physics, Chemistry and Biology) as well as Computer Science Lab.</p>
        </div>
    </div>	
	<hr>
	<div class="row mt-5 justify-content-center">
      <div class="col-lg-12 text-center mb-4">
        <h3>Science Labs</h3>
        <p>Physics, Chemistry and Biology labs are equipped with ergonomic furniture and all the apparatus, specimens and reagents as per ICSE curriculum so that the children are inspired to get engaged in learning through research and accumulate a precise and deep practical knowledge in Science-based subjects.</p>
        </div>
		 </div>
		<div class="row mb-5">
		<div class="col-lg-4 text-center">
       <img src="{{ asset('frontend-asset/images/lab1.jpg') }}" class="img-fluid w-100 border-radius mb-3">
	   <h4>Physics Lab</h4>
      </div>
	  <div class="col-lg-4 text-center">
       <img src="{{ asset('frontend-asset/images/lab2.jpg') }}" class="img-fluid w-100 border-radius mb-3">
	   <h4>Chemistry Lab</h4>
      </div>
	  <div class="col-lg-4 text-center">
       <img src="{{ asset('frontend-asset/images/lab3.jpg') }}" class="img-fluid w-100 border-radius mb-3">
	   <h4>Biology Lab</h4>
      </div>
    </div>
	
	
	
	<hr>
	<div class="row mt-5 justify-content-center">
      <div class="col-lg-12 text-center mb-4">
        <h3>Computer Science Lab</h3>
        <p>The Computer Science Lab, having the capacity of 40 computers is designed as per ICSE guidelines of computer lab so that every child has an access to one system at a time and is able to accumulate precise knowledge in the subject of Computer Lab. It is fully air-conditioned with ergonomically designed furniture. Latest operating system and all relevant application software are installed in every system to provide efficient learning to the children. Every system is LAN connected and has access to the Internet under the script supervision of corresponding teachers. The teachers are rendered to utilise the facility of Projector for the purpose of explaining miscellaneous lessons of Computer Lab so that the children get a wide view for the better understanding of the topic under discussion.</p>
        <p>For the children of Primary classes, the teachers are dedicated to provide knowledge in animation and application of basic software. On the other hand, emphasis is given more on programming for the students of Middle School as well as Senior School classes.</p>
        </div>
		 </div>
		<div class="row justify-content-center">
		<div class="col-lg-12 text-center">
       <img src="{{ asset('frontend-asset/images/lab4.jpg') }}" class="img-fluid w-100 border-radius mb-3">
      </div>
    </div>
	
  </div>
</section>	
@endsection
