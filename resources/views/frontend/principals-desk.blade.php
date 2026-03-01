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
        <h2>Principal's Desk</h2>
		</div>		
      <div class="col-lg-9 align-self-center">
        <p>Welcome to SOUTH END SCHOOL, Nalhati with a rich legacy, heritage and a remarkable contribution to the humanity. </p>
		<p>Established in the year of 2010, our academic institution has been imparting academic excellence as well as ensuring holistic development so that every pupil passing through its portals faces the outside world with integrity and sound character. </p>
		<p>Owing to strong academics, varied extra and co-curricular activities, and the exemplary performance of our students, both inside and outside school, we treasure the reputation of being rated as one of the best schools in this district. </p>
		<p>Our students give us plenty of reasons to be proud of. This is achieved under the close guidance of learned, caring and deeply communicated Faculty, who help me in providing new challenges, opportunities and balanced education for our pupils and supportive management. </p>
		
        </div>
		<div class="col-lg-3">
       <img src="{{ asset('frontend-asset/images/principal-img.jpg') }}" class="img-fluid w-100">
      </div>
	  <div class="col-lg-12">
	  <p>My endeavour has always been strengthen the tri-polar bonding between the school, the students and the Parents, so that we can share in the collaborative effort to bring about spiritual nurturing and effective and successful learning. It is a source of satisfaction to see that our pupils are prepared not just to earn a living but have also learnt how to live as a responsible citizen. </p>
	  <p>I use this platform to acknowledge with gratification, the dedication and sustained efforts of all those people who have played an integral part in the growth and development of this great institution. </p>
		<p>Wishing everyone a remarkable and triumphant journey in school and always! </p>
		<h4 class="mt-4 mb-0"><b>Ms. ARCHITA RAY CHOUDHURY</b></h4>
		<p class="mb-0 c_name">Principal</p>
		<p class="mb-0"><i>South End School</i></p>
		 </div>
    </div>	
  </div>
</section>	
@endsection
