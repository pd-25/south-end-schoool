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
      <div class="col-lg-12 mb-4">
        <h2>School Uniform</h2>
        <p>It is mandatory for all the students to wear proper school uniform in accord with the following instructions :</p>
        </div>
		<div class="col-lg-12">
       <h4 class="dark-head">Summer Uniform</h4>
	   <ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Fawn coloured half-sleeved shirts with the school monogram on the pocket.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Brown skirts for girls. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Brown shorts for boys (up to Class 5 only). </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Brown trousers for boys (from Class 6 to 10 only). </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> School belt.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Brown bordered socks with plain black shoes.</li>
	   </ul>
	   <h4 class="dark-head">Winter Uniform</h4>
	   <ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Fawn coloured half-sleeved shirts with the school monogram on the pocket.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Brown trousers for boys. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Brown skirts with brown legging for girls.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Machine knitted V-shaped brown pullover (from Nursery to Class 4 only).</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Brown blazer with school tie (from Class 5 to 10 only).</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> School belt.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Brown bordered white socks with plain black shoes.</li>
	   </ul>
	   <h4 class="dark-head">Physical Education Uniform</h4>
	   <ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> White shorts for girls (from Nursery to U.K.G. only).</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> White shorts for boys (from Class 1 to 5 only).</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> White divided skirt for girls (from Class 1 to 10 only).</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> House-coloured collared T-shirts (from Class 1 to 10 only).</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> White socks with house-coloured border and white canvas shoes (keds).</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Pink T-shirt and white shorts (from Nursery to U.K.G.).</li>
	   </ul>
      </div>
    </div>	
  </div>
</section>	
@endsection
