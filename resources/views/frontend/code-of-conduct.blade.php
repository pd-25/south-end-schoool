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
        <h2>Code Of Conduct </h2>		
	   <ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Students are always expected to maintain the highest standards of discipline, etiquette and dignified manner of behaviour inside as well as outside the School campus.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They shall abide by the rules and regulations of the School and should act in accord with a way that highlights the discipline and esteem of the School.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should be present in the School well within time and must attend the Morning assembly every day. Habitual late-comers will be sent back home.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should arrive at the school with proper and clean School Uniform. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should always take pride in putting on the school uniform. They must not wear the school uniform in any public place outside school, without prior permission.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They must not make any alteration to the School uniform without permission and any violation of this act could result in suspension from the School.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should keep themselves physically fit and strong. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should bring the School Diary every day.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> The school identity card must be brought to school everyday. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They must rise from their seats when the teacher enters the class room and remain standing till the teacher permits them to sit. Silence and Discipline is to be observed during class hours.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should greet with modesty when the teacher enters the class room as well as leaves the class room.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should always gently accept the work assigned them and must try to complete and submit on time.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should never be cruel to each other and always assist their friends in hard times.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should not damage any School property. If any damage is observed, they must report it to the teachers.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They must take care of the Lab equipments that are used to provide them with precise conception and practical knowledge in various subjects.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They must abide by all the rules and regulations of Library as well as Laboratory.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should participate in all Co-curricular events/competitions organized in the school or specified by the School.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should not shout in or around the school premises.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should not run in the corridors of the school premises.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> It is obligatory for all the students to be groomed with a proper haircut.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should always face new challenges confidently with determination.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should always learn how to improvise while facing new challenges.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Blazer is mandatory as a part of uniform in the season of winter.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They should not waste time in idle gossip. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> They must keep their class rooms free from any kind of dirt.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Every pupil should learn to encourage himself or herself to be an ideal human being who, in future will be committed to contribute for the sake of our nation.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Depending on the gravity of mischievous behaviour punishment will be given as per CISCE guidelines.</li>
	   </ul>
	   
	   </div>	
	    </div>	
    </div>
	
</section>	
@endsection
