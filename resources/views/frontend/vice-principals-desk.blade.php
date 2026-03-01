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
	<div class="col-lg-12">
        <h2>Vice-Principal’s Desk</h2>
	</div>		
      <div class="col-lg-9 align-self-center">
        <p>At the very beginning, being the Vice-Principal of this renowned institution, I convey my sincere gratitude to the supportive management committee, all teaching and non-teaching staff, co-operative guardians and my beloved students.</p>
		<p> In the past 10 years, South End School has grown not only in strength and size but also in levels of excellence. </p>
		<p> Today’s world is changing at such an accelerated rate and as educators we need to pause and reflect on the entire system of education. We have to think deeply what the present society demands and we have to change ourselves accordingly. </p>
		<p> Children are the Future of a Nation. So, we at SES work at implementing a well-balanced curriculum to ensure that the children who walk into the portal of our school will truly be prepared to face challenges of life. Committed and dedicated teachers, co-operative and caring parents, supportive management blend harmoniously to create SES a child-centric school.</p>
        </div>
		<div class="col-lg-3">
       <img src="{{ asset('frontend-asset/images/vice-principal-img.jpg') }}" class="img-fluid w-100 mb-2">
      </div>
	  <div class="col-lg-12">
	  <p>Team work is the hallmark of SES. I am very sure that through the collaborative effort, we can achieve more to benefit our students who are the future leaders of tomorrow. </p>
		<h4 class="mt-4 mb-0"><b>Mr. TANMOY PAL</b></h4>
		<p class="mb-0 c_name">Vice-Principal</p>
		<p class="mb-0"><i>South End School</i></p>
		</div>
    </div>	
  </div>
</section>	
@endsection
