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
        <h2>Guidelines For Education</h2>
		<h3>General Guidelines To The Parents/Guardians</h3>
        <p>1. Parents and Guardians are requested to watch that their wards are regular, punctual and obedient. Irregular attendance, idleness, disobedience, bad manners which may offend other pupils would justify dismissal.</p>
		<p>2. Students are not permitted to wear jewellery of any kind, wristwatches may be worn from Class 6 onwards.</p>
		<p>3. Students are not allowed to bring mobiles or any other object of objectionable nature.</p>
		<p>4. Students are not permitted to bring any diary or exercise books other than school diary and school exercise books. </p>
		<p>5. Any damage done to the school property should be made good by the student concerned. </p>
		<p>6. Parents and Guardians are not allowed to provide their wards with article, tiffin during the school hours. </p>
		<p>7. Parents and Guardians are not permitted to meet teachers during school hours.</p>
		<p>8. Parents and Guardians may be required to meet the Principal, or Vice-Principal or the teachers at any time during a session, if the situation demands. In such cases, prior notification will be sent to them.</p>
		<p>9. No escort without the child’s identity card will be allowed to take that particular ward back home.</p>
		<p>10. Parents and Guardians are requested to notify any change in their address or contact number to corresponding Class-Teachers. </p>
		<p>11. School gate is closed at 8 am sharp.</p>
		<p>12. Habitual late-comers will be sent back home.</p>
	   <h4 class="dark-head">Morning Assembly </h4>
	   <p>The Morning assembly begins at 7:50 am.</p>
	   <h4 class="dark-head">School Timing </h4>
	   <ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Nursery, LKG and UKG - 7:45 am to 11:10 am</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Class I and II - 7:45 am to 12:40 pm</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Class III to V - 7:45 am to 01:20 pm</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Class VI to X - 7:45 am to 02:00 pm</li>
	   </ul>
	   <p>Classes of all grades are conducted from Monday to Friday.</p>
	    <h4 class="dark-head">School Uniform</h4>
		<p>It is mandatory for all the students to wear proper school uniform in accord with the following instructions :</p>
		<p><b>A) Summer Uniform :</b></p>
		<p>1. Fawn coloured half-sleeved shirts with the school monogram on the pocket.</p>
		<p>2. Brown skirts for girls.</p>
		<p>3. Brown shorts for boys (up to Class V only).</p>
		<p>4. Brown trousers for boys (from Class VI to X only).</p>
		<p>5. School belt.</p>
		<p>6. Brown bordered socks with plain black shoes.</p>
		<p><b>B) Winter Uniform :</b></p>
		<p>1. Fawn coloured half-sleeved shirts with the school monogram on the pocket.</p>
		<p>2. Brown trousers for boys.</p>
		<p>3. Brown skirts with brown legging for girls.</p>
		<p>4. Machine knitted V-shaped brown pullover (from Nursery to Class IV only).</p>
		<p>5. Brown blazer with school tie (from Class V to X only).</p>
		<p>6. School belt.</p>
		<p>7. Brown bordered white socks with plain black shoes.</p>
		<p><b>C) Physical Education Uniform :</b></p>
		<p>1. White shorts for girls (from Nursery to UKG only).</p>
		<p>2. White shorts for boys (from Class I to V only).</p>
		<p>3. White divided skirt for girls (from Class I to X only).</p>
		<p>4. House-coloured collared T-shirts (from Class I to X only).</p>
		<p>5. White socks with house-coloured border and white canvas shoes (keds).</p>
		<p>6. Pink T-shirt and white shorts (from Nursery to UKG).</p>
		<h4 class="dark-head">Identity Card</h4>
		<p>1. At the start of every academic year, each of all the pupils are provided with an Identity card which he/she needs to bring to school every day.</p>
		<p>2. Students without Identity card will not be permitted to attend classes.</p>
		<h4 class="dark-head">Evaluation Methodology</h4>
		<p><b>A) Pre-Primary (Nursery, LKG and UKG):</b></p>
		<p>Students’ progress is determined cautiously through conversation, drawing, playing rhymes and other small fun-filled activities throughout the year.</p>
		<p><b>B) Primary (Class I to Class V):</b></p>
		<p>The students are assessed on a three-term format as per the latest ICSE curriculum. </p>
		<p><b>C) Middle School (Class VI to Class VIII):</b></p>
		<p>The students are assessed on a three-term format as per the latest ICSE curriculum. </p>
		<p><b>D) Senior School (Class IX & X) :</b></p>
		<p>The students are assessed on a three-term format as per the latest ICSE curriculum.</p>
		<p><b>Kindly note that -</b></p>
<ul class="grade-list">
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Evaluation Report is issued to the parents at the end of each assessment. Parents or Guardians are requested to sign and return the report within two days of their receipt. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> There should be no alteration of marks and remarks in the Evaluation Report.</li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Special arrangement cannot be made for the students absent for any test but absence owing to illness will be taken into consideration during promotion.  </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Parents and Guardians are advised not to send sick children merely to appear for an assessment. </li>
	   <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Pupils having attendance less than 75% in a Terminal will not be allowed to appear for the Terminal Examinations. </li>
	   </ul>
<h4 class="dark-head">Criteria For Promotion</h4>
<p>1. An average of 40% in all subjects in three Terminal examinations.</p>
<p>2. Attendance must be 75% or above.</p>
<p><b>Kindly note that -</b></p>
<p>1. Pupils failing to fulfill the aforementioned criteria of promotion for two consecutive years must be withdrawn from the school.</p>
<p>2. Annual promotion of a student to a higher class depends on the child’s performance throughout the academic year, not merely on marks obtained in the Final Examination.</p>
<h4 class="dark-head">Importance Of School Diary</h4>
<p>1. Each student is provided with a School Diary which they mandatorily need to bring to school every day.</p>
<p>2. Physical communication with Parents or Guardians are made through the school diary.</p>
<p>3. Parents or Guardians are informed to go through the diary regularly and sign the remarks or comments made by the Principal, or Class-Teacher or Subject-Teachers. They are also informed to put forward their opinion in the Parents’ remark column.</p>
<p>4. Losing the School Diary, making any alteration in it, tearing out pages etc. are regarded as serious offence and may lead to dismissal of the student.</p>
<h4 class="dark-head">Rules For Leave Of Absence</h4>
<p>1. Pupils who want to take leave for an occasion must submit a written application in school diary to the corresponding Class-Teacher. If the reason is justified then the leave of absence will granted.</p>
<p>2. Pupils who have been absent from school must submit a written note in the school diary explaining the reason to the corresponding Class-Teacher.</p>
<p>3. Pupils who have been absent from school for three days or above on medical ground must submit a written note in the school diary explaining the reason along with doctor’s prescription as well as fit certificate to the corresponding Class-Teacher.</p>
<h4 class="dark-head">Parent-Teacher Meeting (PTM) </h4>
<p><b>Nursery to Class X :</b></p>
<ul class="grade-list">
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 1 PTM in First Term </li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 1 PTM in Second Term </li>
<li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 1 PTM in Third Term </li>
</ul>
<p><b>Kindly note that</b> - Parents or Guardians should be accompanied by their wards to attend Parent-Teacher Meeting.</p>
<h4 class="dark-head">Office Hours</h4>
<p>9 am to 2 pm</p>
	   </div>	
	    </div>	
    </div>
	
</section>	
@endsection
