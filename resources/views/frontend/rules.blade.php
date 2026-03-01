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
        <h2>Rules</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        </div>		
		<div class="col-lg-12">
		<ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> To apply for admission, parents need to collect the admission form along with the Prospectus from the school counter.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Parents must submit to the school office the photocopy of child's date of birth certificate, photocopy of parents' Aadhaar cards and child's two passport-sized photographs along with the filled-in admission form.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> A child who has attended a recognized school is eligible for admission with a School Leaving or Transfer Certificate from the school last attended.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> If a child comes from a school outside the state of West Bengal, the School Leaving or Transfer Certificate must be countersigned by the Inspector of schools of the state from which the child comes.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Parents of all students applying for admission in Nursery or L.K.G. or U.K.G. are subject to face an interview.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> All students applying for admission in Class I or above are subject to appear in an admission test.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> After the parent's interview or the admission test, if a child is finalized for admission, then his/her parent need to remit the admission fee.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> After the remittance of admission fee, the parents need to fill in some details in the school admission register and then only the procedure of admission will be completed.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Admissions are made on authorization by the Principal only. Admission made by others are liable to cancellation without any reason being ascribed. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Parents are warned that admissions are made strictly on the merit of the children.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> South End School does not accept any form of donation for the purpose of admission.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> In the interest of public you are informed that some unscrupulous persons make false representations, pose as the agents of school and approach prospective parents or guardians by providing false assurances to them and make payment of various sums in the name of admission.</li>
	   </ul>
	   <p><b> For your kind information, we do not have such protocols to complete the procedure of admission as our school is not connected with any outside individual or organization. Hence, you are warned not to fall in such traps. </b></p>
	    </div>
    </div>	
  </div>
</section>	
@endsection
