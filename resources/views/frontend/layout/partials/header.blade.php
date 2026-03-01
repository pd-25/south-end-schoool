      <header id="main-header" class="header">
          <div id="top-header">
              <div class="container">
                  <div class="row head-bg">
                      <div class="col-lg-1 col-3 logo-box pr-0">
                          <div class="logo">
                              <a href="{{ route('home') }}"><img src="{{ asset('frontend-asset/images/logo.png') }}" class="img-fluid"></a>
                          </div>
                      </div>
                      <!-- Section: Navbar Menu -->
                      <div class="col-lg-11 col-9 align-self-center">
                          <ul class="menuHead justify-content-between">
                              <li>
                                  <p>Affiliated to the Council for the Indian School Certificate Examinatioins, New Delhi
                                      (ICSE & ISC)</p>
                              </li>
                              <li class="hd-phone">
                                  <p class="mb-0"><span><i class="fa fa-phone" aria-hidden="true"></i> Helpline
                                          No.</span> <a href="tel:+917605010991">+91 76050 10991</a></p>
                              </li>
                              <li>
                                  <a href="" class="pay-btn">Pay Online Fees</a>
                              </li>
                          </ul>
                          <div class="overlay"></div>
                          <nav class="menu">
                              <div class="menu-mobile-header">
                                  <button type="button" class="menu-mobile-arrow"><i
                                          class="ion ion-ios-arrow-back"></i></button>
                                  <div class="menu-mobile-title"></div>
                                  <button type="button" class="menu-mobile-close"><i
                                          class="ion ion-ios-close"></i></button>
                              </div>
                              <ul class="menu-section text-right">
                                  <li><a href="{{ route('home') }}">Home</a></li>
                                  <li class="menu-item-has-children">
                                      <a href="#">About Us <i class="ion fa fa-caret-down"
                                              aria-hidden="true"></i></a>
                                      <div class="menu-subs menu-column-1">
                                          <ul>
                                              <li><a href="{{ route('about.introduction') }}">School Introduction</a></li>
                                              <li><a href="{{ route('about.mission_vision') }}">Mission & Vision</a></li>
                                              <li><a href="{{ route('about.affiliation') }}">Affiliation</a></li>
                                          </ul>
                                      </div>
                                  </li>
                                  <li class="menu-item-has-children">
                                      <a href="#">The Team <i class="ion fa fa-caret-down"
                                              aria-hidden="true"></i></a>
                                      <div class="menu-subs menu-column-1">
                                          <ul>
                                              <li><a href="{{ route('team.management_committee') }}">School Management
                                                      Committee</a></li>
                                              <li><a href="{{ route('team.principals_desk') }}">Principal’s Desk</a></li>
                                              <li><a href="{{ route('team.vice_principals_desk') }}">Vice-Principal’s Desk</a></li>
                                              <li><a href="{{ route('team.teachers') }}">Teachers</a></li>
                                              <li><a href="{{ route('team.librarian') }}">Librarian</a></li>
                                              <li><a href="{{ route('team.office_assistants') }}">Office Assistants</a></li>
                                              <li><a href="{{ route('team.students_council') }}">Students’ Council</a></li>
                                          </ul>
                                      </div>
                                  </li>
                                  <li class="menu-item-has-children">
                                      <a href="#">School Facilities <i class="ion fa fa-caret-down"
                                              aria-hidden="true"></i></a>
                                      <div class="menu-subs menu-column-1">
                                          <ul>
                                              <li><a href="{{ route('facilities.classrooms') }}">Classrooms</a></li>
                                              <li><a href="{{ route('facilities.labs') }}">School Labs</a></li>
                                              <li><a href="{{ route('facilities.library') }}">Library</a></li>
                                              <li><a href="{{ route('facilities.examination_hall') }}">Examination Hall</a></li>
                                              <li><a href="{{ route('facilities.infirmary_room') }}">Infirmary Room</a></li>
                                              <li><a href="{{ route('facilities.safety_measures') }}">Safety Measures</a></li>
                                          </ul>
                                      </div>
                                  </li>
                                  <li class="menu-item-has-children">
                                      <a href="#">Academics <i class="ion fa fa-caret-down"
                                              aria-hidden="true"></i></a>
                                      <div class="menu-subs menu-column-1">
                                          <ul>
                                              <li><a href="{{ route('academics.pre_primary') }}">Pre-primary Division</a></li>
                                              <li><a href="{{ route('academics.middle_school') }}">Middle School Division</a></li>
                                              <li><a href="{{ route('academics.senior_school') }}">Senior School Division
                                                      (ICSE)</a></li>
                                              <li><a href="{{ route('academics.senior_secondary') }}">Senior Secondary Division
                                                      (ISC)</a></li>
                                              <li><a href="{{ route('academics.guidelines') }}">Guidelines for Education</a>
                                              </li>
                                              <li><a href="{{ route('academics.code_of_conduct') }}">Code of Conduct</a></li>
                                              <li><a href="{{ route('academics.syllabus') }}">Syllabus</a></li>
                                              <li><a href="{{ route('academics.results') }}">Check Result</a></li>
                                          </ul>
                                      </div>
                                  </li>
                                  <li class="menu-item-has-children">
                                      <a href="#">Co-Curricular Activities <i class="ion fa fa-caret-down"
                                              aria-hidden="true"></i></a>
                                      <div class="menu-subs menu-column-1">
                                          <ul>
                                              <li><a href="{{ route('activities.house_system') }}">House System</a></li>
                                              <li><a href="{{ route('activities.competitions') }}">Inter-House Competitions</a>
                                              </li>
                                              <li><a href="{{ route('activities.sports') }}">Inter-House Sports</a></li>
                                              <li><a href="{{ route('activities.events') }}">School Events</a></li>
                                              <li><a href="{{ route('activities.gallery') }}">Picture Gallery</a></li>
                                          </ul>
                                      </div>
                                  </li>
                                  <li class="menu-item-has-children">
                                      <a href="#">Admission <i class="ion fa fa-caret-down"
                                              aria-hidden="true"></i></a>
                                      <div class="menu-subs menu-column-1">
                                          <ul>
                                              <li><a href="{{ route('admission.rules') }}">Rules</a></li>
                                              <li><a href="{{ route('admission.form') }}">Get Admission Form</a></li>
                                              <li><a href="{{ route('admission.uniform') }}">School Uniform</a></li>
                                              <li><a href="{{ route('admission.withdrawal') }}">Withdrawal</a></li>
                                              <li><a href="{{ route('admission.contact') }}">Contact for Admission</a></li>
                                              <li><a href="{{ route('admission.transfer_certificate') }}">Transfer Certificate</a></li>
                                          </ul>
                                      </div>
                                  </li>
                                  <li><a href="{{ route('career') }}">Career With Us</a></li>
                              </ul>
                          </nav>
                          <div class="header-item-right">
                              <button type="button" class="menu-mobile-trigger">
                                  <span></span>
                                  <span></span>
                                  <span></span>
                                  <span></span>
                              </button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>