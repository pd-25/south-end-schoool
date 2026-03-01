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
        <h2>Senior School (Grade Ix And X) </h2>
        <p> As per the ICSE guidelines, an efficient but more subject-oriented curriculum is set and it is implemented through continuous assessments, doubt - solving activities, mock tests as well as the practice of scientific and Mathematical applications. Our highly qualified and experienced teachers pioneer the students towards the academic excellence. </p>
		<p> Students are also inspired to participate in various competitions related to Science, Program Coding and Technology that eventually assist them to accumulate deep concept and precise knowledge in all subjects. </p>
		<p> In this way the students become well prepared for the ICSE board examinations. </p>
       <h3 class="mt-4">EVALUATION METHODOLOGY </h3>
	   <p> The students are assessed on a three-term format as per the latest ICSE curriculum. </p>
	   <h4 class="dark-head"> <i class="fa fa-book" aria-hidden="true"></i> SUBJECTS </h4>
	   </div>	
	    </div>	
	    <div class="row justify-content-center">
	   <div class="col-lg-5">
	   <div class="grade-box">
	   <h5><i class="fa fa-graduation-cap" aria-hidden="true"></i> Grade VI</h5>
	   <ul class="grade-list">
	   <li><i class="fa fa-check" aria-hidden="true"></i> English Language </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Literature in English </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Second Language (Bengali/Hindi) </li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Mathematics</li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Physics</li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Chemistry</li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Biology</li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> History & Civics</li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Geography</li>
	   <li><i class="fa fa-check" aria-hidden="true"></i> Computer Applications/Physical Education</li>
	   </ul>
	   </div>
		</div>	      
      </div>
    </div>
</section>	
@endsection
