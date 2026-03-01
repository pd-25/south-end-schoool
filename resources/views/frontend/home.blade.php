@extends('frontend.layout.main')
@section('content')
    <section id="banner-slider" class="banner-slider">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

             <div class="carousel-inner" role="listbox">
                 <!-- Slide One - Set the background image for this slide in the line below -->
                 <div class="carousel-item active" style="background-image: url('{{ asset('frontend-asset/images/banner1.jpg') }}');">
                     <canvas id="canvas"></canvas>
                     <div class="carousel-caption">
                     </div>
                 </div>
                 <div class="carousel-item" style="background-image: url('{{ asset('frontend-asset/images/banner2.jpg') }}')">
                     <div class="carousel-caption">
                     </div>
                 </div>
                 <div class="carousel-item" style="background-image: url('{{ asset('frontend-asset/images/banner3.jpg') }}')">
                     <div class="carousel-caption">
                     </div>
                 </div>
                 <div class="carousel-item" style="background-image: url('{{ asset('frontend-asset/images/banner4.jpg') }}')">
                     <div class="carousel-caption">
                     </div>
                 </div>
                 <div class="carousel-item" style="background-image: url('{{ asset('frontend-asset/images/banner5.jpg') }}')">
                     <div class="carousel-caption">
                     </div>
                 </div>
                 <div class="carousel-item" style="background-image: url('{{ asset('frontend-asset/images/banner6.jpg') }}')">
                     <div class="carousel-caption">
                     </div>
                 </div>

             </div>
             <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"><img src="{{ asset('frontend-asset/images/ban-left-btn.png') }}"
                         class="img-fluid"></span>
                 <span class="sr-only">Previous</span>
             </a>
             <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"><img src="{{ asset('frontend-asset/images/ban-right-btn.png') }}"
                         class="img-fluid"></span>
                 <span class="sr-only">Next</span>
             </a>
         </div>
     </section>
     <!-- Page Content -->
     <section id="banner-bottom-section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-3 text-center">
                     <p><span><img src="{{ asset('frontend-asset/images/hs1.png') }}" class="img-fluid"></span> <span class="col-red">OBSTINACY</span>
                     </p>
                 </div>
                 <div class="col-lg-3 text-center">
                     <p><span><img src="{{ asset('frontend-asset/images/hs2.png') }}" class="img-fluid"></span> <span
                             class="col-green">ATHLETICISM</span></p>
                 </div>
                 <div class="col-lg-3 text-center">
                     <p><span><img src="{{ asset('frontend-asset/images/hs3.png') }}" class="img-fluid"></span> <span class="col-blue">FREEDOM</span>
                     </p>
                 </div>
                 <div class="col-lg-3 border-0 text-center">
                     <p class="border-0"><span><img src="{{ asset('frontend-asset/images/hs4.png') }}" class="img-fluid"></span> <span
                             class="col-yellow">BRAVERY</span></p>
                 </div>
             </div>
         </div>
     </section>


     <section id="welcome-section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6 align-self-center">
                     <h1>About The School</h1>
                     <p>Welcome to South End School, an academic institution that has redefined education in the heart
                         of the town at Nalhati.</p>
                     <p>Our wonderful deeply missed late Justice Nure Alam Chowdhury sir to propagate his vision for
                         ‘English Medium Education’ established South End School in the year of 2010 at Nalhati in the
                         district of Birbhum. It is a co-educational school and is now affiliated to the COUNCIL FOR THE
                         INDIAN SCHOOL CERTIFICATE EXAMINATIONS, New Delhi (ICSE).</p>
                     <a href="" class="rmBtn">Read More</a>
                 </div>
                 <div class="col-lg-6">
                     <img src="{{ asset('frontend-asset/images/about-image.jpg') }}" class="img-fluid border-radius">
                 </div>
             </div>
             <div class="row mt-5">
                 <div class="col-lg-12 text-center mb-4">
                     <h2>Our Toppers</h2>
                 </div>
                 @forelse($toppers as $topper)
                 <div class="col-lg-3">
                     <img src="{{ asset('storage/' . $topper->image) }}" class="img-fluid border-radius" alt="{{ $topper->name }}">
                     <p class="text-center mt-2 fw-bold">{{ $topper->name }}</p>
                 </div>
                 @empty
                 <div class="col-lg-12 text-center">
                     <p class="text-muted">No toppers added yet.</p>
                 </div>
                 @endforelse
             </div>
         </div>
     </section>


     <section id="academics-section">
         <h2>South End Academics</h2>
         <div class="container">
             <div class="row">
                 <div class="col-lg-3">
                     <div class="academic-box">
                         <img src="{{ asset('frontend-asset/images/logo.png') }}" class="img-fluid m-auto">
                         <h4>Pre-primary Division</h4>
                         <p class="box-head">(NURSERY, LKG & UKG)</p>
                         <hr>
                         <p class="mb-0">The PRE-PRIMARY section comprise classes of Nursery, L.K.G. and U.K.G. With
                             age group ranging from 3 years to 5 years.</p>
                     </div>
                 </div>
                 <div class="col-lg-3">
                     <div class="academic-box">
                         <img src="{{ asset('frontend-asset/images/logo.png') }}" class="img-fluid m-auto">
                         <h4>Middle School Division</h4>
                         <p class="box-head">(Grade VI to Grade VIII)</p>
                         <hr>
                         <p class="mb-0">The Middle programme of SES is structured to meet children's varied
                             intellectual and developmental needs.</p>
                     </div>
                 </div>
                 <div class="col-lg-3">
                     <div class="academic-box">
                         <img src="{{ asset('frontend-asset/images/logo.png') }}" class="img-fluid m-auto">
                         <h4>Senior School Division (ICSE)</h4>
                         <p class="box-head">(Grade IX and X)</p>
                         <hr>
                         <p class="mb-0">As per the ICSE guidelines, an efficient but more subject-oriented
                             curriculum is set and it is implemented through continuous assessments...</p>
                     </div>
                 </div>
                 <div class="col-lg-3">
                     <div class="academic-box">
                         <img src="{{ asset('frontend-asset/images/logo.png') }}" class="img-fluid m-auto">
                         <h4>Senior Secondary Division (ISC)</h4>
                         <p class="box-head">(Grade XI and XII)</p>
                         <hr>
                         <p class="mb-0">Our highly qualified and experienced teachers pioneer the students towards
                             the academic excellence.</p>
                     </div>
                 </div>
             </div>

         </div>
     </section>

     <section id="event-section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-6">
                     <div class="event-box">
                         <div class="event-box-head">
                             <h3><span><img src="{{ asset('frontend-asset/images/event-icon.png') }}"
                                         class="img-fluid dispaly-inline"></span><span>Notice Board</span></h3>
                         </div>
                         <div class="event-box-ctn">
                             @forelse($notices as $notice)
                             @if(!$loop->first)<hr>@endif
                             <div class="row">
                                 <div class="col-lg-3 pr-0">
                                     <ul class="event_date">
                                         <li class="event_month">{{ \Carbon\Carbon::parse($notice->date)->format('F Y') }}</li>
                                         <li class="event_day">{{ \Carbon\Carbon::parse($notice->date)->format('d') }}</li>
                                     </ul>
                                 </div>
                                 <div class="col-lg-9">
                                     <h4>{{ $notice->title }}</h4>
                                     <p class="mb-2">{{ Str::limit($notice->small_desc, 80) }}</p>
                                     @if($notice->pdf)
                                     <a href="{{ asset('storage/' . $notice->pdf) }}" target="_blank" class="txtBtn"><i class="fa fa-file-pdf-o"
                                             aria-hidden="true"></i> Download PDF</a>
                                     @endif
                                 </div>
                             </div>
                             @empty
                             <div class="text-center py-4">
                                 <p class="text-muted">No notices available at the moment.</p>
                             </div>
                             @endforelse
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3">
                     <div class="sng-event-box">
                         <img src="{{ asset('frontend-asset/images/ev-img1.jpg') }}" class="img-fluid dispaly-inline">
                         <h4>Principle Desk</h4>
                         <p class="mb-0">Welcome to South End School, Nalhati with a rich legacy, heritage and a
                             remarkable contribution to the humanity. <a href="">[...]</a></p>
                     </div>
                 </div>
                 <div class="col-lg-3">
                     <div class="sng-event-box">
                         <img src="{{ asset('frontend-asset/images/ev-img2.jpg') }}" class="img-fluid dispaly-inline">
                         <h4>Vice-Principal’s Desk</h4>
                         <p class="mb-0">South End School is determined to provide high-quality education, a holistic
                             student-centric environment <a href="">[...]</a></p>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section id="teacher-section">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-10 text-center mb-4">
                     <h2>Our Teachers</h2>
                     <p>My endeavour has always been strengthen the tri-polar bonding between the school, the students
                         and the Parents, so that we can share in the collaborative effort to bring about spiritual
                         nurturing and effective and successful learning.</p>
                 </div>

                 <div class="col-lg-12">
                     <div id="demo-pranab">
                         <div id="owl-teacher" class="owl-carousel owl-theme">
                             @forelse($teachers as $teacher)
                             <div class="item">
                                 <img src="{{ asset('storage/' . $teacher->photo) }}" class="img-fluid w-auto m-auto" alt="{{ $teacher->name }}">
                                 <h4>{{ $teacher->name }}</h4>
                                 <p><span>Designation: </span>{{ $teacher->designation }}</p>
                                 <p><span>Qualification: </span>{{ $teacher->qualification }}</p>
                                 <p><span>Experience: </span>{{ $teacher->experience }}</p>
                             </div>
                             @empty
                             <div class="item text-center">
                                 <p class="text-muted">No teachers added yet.</p>
                             </div>
                             @endforelse
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-12 text-center my-lg-4 my-xl-4">
                     <a href="{{route('team.teachers')}}" class="rmBtn">View All Teachers</a>
                 </div>

             </div>
         </div>
     </section>

     <section id="video-section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-8">
                     <iframe width="100%" height="620" src="https://www.youtube.com/embed/LLD3qZ-e7DE"
                         title="Annual Sports Meet 2025-26 | South End School | Nalhati" frameborder="0"
                         allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                         referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                 </div>
                 <div class="col-lg-4">
                     <h2 class="mb-3">Why South End School, Nalhati?</h2>
                     <div class="media m_box1 wcu-box mb-3">
                         <img src="{{ asset('frontend-asset/images/wcu-icon1.png') }}" class="mr-3" alt="...">
                         <div class="media-body align-self-center">
                             <p>Safety & Security</p>
                         </div>
                     </div>

                     <div class="media m_box2 wcu-box mb-3">
                         <img src="{{ asset('frontend-asset/images/wcu-icon2.png') }}" class="mr-3" alt="...">
                         <div class="media-body align-self-center">
                             <p>Eco-Friendly Campus</p>
                         </div>
                     </div>


                     <div class="media m_box3 wcu-box mb-3">
                         <img src="{{ asset('frontend-asset/images/wcu-icon3.png') }}" class="mr-3" alt="...">
                         <div class="media-body align-self-center">
                             <p>Focus On Skill Development</p>
                         </div>
                     </div>


                     <div class="media m_box4 wcu-box mb-3">
                         <img src="{{ asset('frontend-asset/images/wcu-icon4.png') }}" class="mr-3" alt="...">
                         <div class="media-body align-self-center">
                             <p>Practical-Oriented Studies</p>
                         </div>
                     </div>


                     <div class="media m_box5 wcu-box mb-3">
                         <img src="{{ asset('frontend-asset/images/wcu-icon5.png') }}" class="mr-3" alt="...">
                         <div class="media-body align-self-center">
                             <p>Spacious & Airy Classrooms</p>
                         </div>
                     </div>

                     <div class="media m_box6 wcu-box mb-3">
                         <img src="{{ asset('frontend-asset/images/wcu-icon6.png') }}" class="mr-3" alt="...">
                         <div class="media-body align-self-center">
                             <p>Technology Integration</p>
                         </div>
                     </div>

                     <div class="media m_box7 wcu-box mb-3">
                         <img src="{{ asset('frontend-asset/images/wcu-icon7.png') }}" class="mr-3" alt="...">
                         <div class="media-body align-self-center">
                             <p>Social Initiatives</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>




     <section id="guideline-section">
         <div class="container-fluid p-0">
             <div class="row">
                 <div class="col-lg-12 text-center mb-4">
                     <h2>SES Guidelines For Education</h2>
                 </div>
                 <div class="col-lg-6 p-0">
                     <img src="{{ asset('frontend-asset/images/guideline-pic1.jpg') }}" class="img-fluid w-100">
                 </div>
                 <div class="col-lg-3 p-0">
                     <div class="guideline-box1">
                         <div class="guideline-box-img">
                             <img src="{{ asset('frontend-asset/images/guideline-pic2.jpg') }}" class="img-fluid w-100">
                         </div>
                         <div class="guideline-box-ctn">
                             <h4>General Guidelines ToThe Parents/ Guardians</h4>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-3 p-0">
                     <div class="guideline-box2 text-right">
                         <div class="guideline-box-ctn">
                             <h4>Code For Conduct:</h4>
                             <p>Students are always expected to maintain the highest standards of discipline</p>
                         </div>
                         <div class="guideline-box-img">
                             <img src="{{ asset('frontend-asset/images/guideline-pic3.jpg') }}" class="img-fluid w-100">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>


     <section id="co-curricular-section">
         <div class="container">
             <div class="row">
                 <div class="col-lg-12 text-center mb-3">
                     <h2>Major Events Of SES</h2>
                 </div>
             </div>
             <div class="row">
                 @forelse($events as $event)
                 <div class="col-lg-4">
                     <div class="curricular-box">
                         <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid" alt="{{ $event->title }}">
                         <h4>{{ $event->title }}</h4>
                         <p>{{ Str::limit($event->description, 120) }}</p>
                     </div>
                 </div>
                 @empty
                 <div class="col-lg-12 text-center">
                     <p class="text-muted">No events added yet.</p>
                 </div>
                 @endforelse
             </div>

         </div>
     </section>

     <section id="affiliation-section">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-12 text-center mb-3">
                     <h2>Our Affiliation</h2>
                 </div>
             </div>

             <div class="row justify-content-center">
                 <div class="col-lg-10 text-center mb-3">
                     <img src="{{ asset('frontend-asset/images/affiliation-image.jpg') }}" class="img-fluid m-auto">
                     <p>South End School, Nalhati is affiliated to the COUNCIL FOR THE INDIAN SCHOOL CERTIFICATE
                         EXAMINATIONS, New Delhi (ICSE). Our CISCE Affiliation No. WB420</p>
                 </div>
             </div>
         </div>
     </section>
     <section id="marqe-section">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-2 redCol mb-0">
                     <p>Latest News</p>
                 </div>
                 <div class="col-lg-10">
                     <div class="marquee-box">
                         <marquee direction="left">
                             <ul>
                                @forelse ($latestNews as $latestNew)
                                    <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> {{$latestNew->title}}</li>
                                @empty
                                    
                                @endforelse
                                 {{-- <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li> --}}
                                 {{-- <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li>
                                 <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li>
                                 <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li>
                                 <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li>
                                 <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li>
                                 <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li>
                                 <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li>
                                 <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Praesent sollicitudin dui
                                     ut erat tincidunt pellentesque.</li> --}}
                             </ul>

                         </marquee>
                     </div>
                 </div>

             </div>

         </div>
     </section>
@endsection