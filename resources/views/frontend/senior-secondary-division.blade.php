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
        <h2>Senior Secondary Division (ISC)</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
       <h3 class="mt-4">EVALUATION METHODOLOGY </h3>
	   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
	   <h4 class="dark-head"> <i class="fa fa-book" aria-hidden="true"></i> SUBJECTS </h4>
	   </div>	
	    </div>	
	    <div class="row justify-content-center">
	   <div class="col-lg-5">
	   <div class="grade-box">
	   <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> Grade XII</h5>
	   <ul class="grade-list">
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Lorem Ipsum is simply dummy text </li>
	   </ul>
	   </div>
		</div>	      
      </div>
    </div>
	
</section>	
@endsection
