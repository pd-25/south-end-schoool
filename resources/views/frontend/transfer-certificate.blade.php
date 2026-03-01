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
        <h2>Transfer Certificate </h2>
        <p>Please go through the guidelines of Transfer Certificate for admission as well as issuing Transfer Certificate for withdrawal.</p>
        </div>
		<div class="col-lg-12">		
		 <h4 class="dark-head">Transfer Certificate Guidelines For Admission</h4>
	   <ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> A child who has attended a recognized school must have to submit a School Leaving or Transfer Certificate from the school last attended for the purpose of admission in South End School.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> If a child comes from a school outside the state of West Bengal, The School Leaving or Transfer Certificate must be countersigned by the Inspector of schools of the state from which the child comes.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> The transfer certificate must be on official school letterhead.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> The form must be signed by the Principal/HM and show an official school stamp.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> The form needs to be completed on pupil's last day of attendance.</li>
	   </ul>
	   
	   
	   <h4 class="dark-head">Transfer Certificate Guidelines For Withdrawal</h4>
	   <ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Application for issuing transfer certificate must be submitted one month before a child is withdrawn. Otherwise the month's fee in lieu of notice will be charged.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> No transfer certificate will be issued until all fees due to the school are remitted.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> All parents withdrawing their wards must download the application form to submit a prayer to obtain the transfer certificate.</li>
	   </ul>
	   <div class="syllabust-box">
<div class="media">
  <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
  <div class="media-body align-self-center">
   <h5 class="mt-0 mb-0"><a href="#">CLICK HERE TO DOWNLOAD APPLICATION FORM FOR TRANSFER CERTIFICATE</a></h5>
  </div>
</div>
</div>
	   <ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> The application form must be filled in with mandatory details and submitted at the school office.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Kindly note that, applications with incomplete details will be considered invalid requests and no action will be initiated.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Transfer certificate will be provided to the parents after 3 days of submitting the application. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Transfer certificate issued at any other time that completion of academic year will only state 'continuing' in the same grade.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> The Principal has the authority to suspend the withdrawal of a pupil without having to assign any reason provided, that she is satisfied that such step is necessary in the interest of the school and the pupil concerned.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> The guidelines are subject to change as per the decision of School Management Committee.</li>
	   </ul>
	    </div>
    </div>	
  </div>
</section>	
@endsection
