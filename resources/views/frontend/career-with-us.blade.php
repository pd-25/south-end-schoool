@extends('frontend.layout.main')

@section('content')
    <section id="inner-banner-slider" class="banner-slider main-banner">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active"
                    style="background-image: url('{{ asset('frontend-asset/images/inner-banner.jpg') }}');">
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
                    <h2>Career With Us</h2>
                    <p>South End School does not compromise on getting the service of eligible candidates as Asst. Teacher
                        having the attributes as follows : </p>
                    <p>1. Proficiency in spoken English and IT skills </p>
                    <p>2. Strong work ethic </p>
                    <p>3. Willingness to learn</p>
                    <p>4. Self-motivation </p>
                    <p>5. Benignant qualities of being student mentors</p>
                    <p>6. Good personality</p>
                    <p>7. Professional Attitude</p>
                    <p>8. Adaptability</p>
                    <div class="syllabust-box">
                        <div class="media">
                            <img src="{{ asset('frontend-asset/images/pdf-icon.png') }}" class="mr-3" alt="...">
                            <div class="media-body align-self-center">
                                <h5 class="mt-0 mb-0"><a href="#">CLICK HERE TO DOWNLOAD JOB APPLICATION FORM</a></h5>
                            </div>
                        </div>
                    </div>
                    <h4 class="dark-head">How To Apply</h4>
                    <p>1. Download the job application form.</p>
                    <p>2. Fill in the form with necessary details.</p>
                    <p>3. Attach a covering letter, an updated CV and photocopy of all documents of academic qualification
                        with the filled-in job application form.</p>
                    <p>4. Submit at the school office <b>OR</b> the softcopy of the aforementioned documents can be mailed
                        to us through the E-mail ID <a
                            href="mailto:southendschoolnalhati@gmail.com"><b>southendschoolnalhati@gmail.com</b></a>.</p>
                    <h4 class="dark-head">Vacancies For The Post Of Asst. Teachers</h4>

                    <table class="table table-bordered text-center career-table">
                        <thead class="thead-red">
                            <tr>
                                <th scope="col"> POST </th>
                                <th scope="col">NO. OF VACANCIES </th>
                                <th scope="col">REQUIRED QUALIFICATION </th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($careers as $career)
                            <tr>
                                <td> {{ $career->post_name }} </td>
                                <td>{{ $career->openings }}</td>
                                <td>{{ $career->qualifications }}</td>
                            </tr>
                            
                          @empty
                            <tr>
                                <td> -</td>
                                <td>No job available.</td>
                                <td>-</td>
                            </tr>
                          @endforelse
                            
                            {{-- <tr>
                                <td> PGT-Mathematics </td>
                                <td>0</td>
                                <td>M.Sc. (Mathematics), B.Ed. </td>
                            </tr>
                            <tr>
                                <td> PGT-Physics </td>
                                <td>0</td>
                                <td>M.Sc. (Physics), B.Ed. </td>
                            </tr>
                            <tr>
                                <td> PGT-Chemistry </td>
                                <td>0</td>
                                <td>M.Sc. (Chemistry), B.Ed. </td>
                            </tr>
                            <tr>
                                <td> PGT-Biology </td>
                                <td>0</td>
                                <td>M.Sc. (Biology), B.Ed. </td>
                            </tr>
                            <tr>
                                <td> PGT-History </td>
                                <td>0</td>
                                <td>M.A. (History), B.Ed. </td>
                            </tr>
                            <tr>
                                <td> PGT-Geography </td>
                                <td>0</td>
                                <td>M.A. (Geography), B.Ed. </td>
                            </tr>
                            <tr>
                                <td> PGT-Computer Science </td>
                                <td>0</td>
                                <td>B.E/ B. Tech in Computer Science/ Information Technology<br><b>OR</b><br>MCA/M.Sc. in
                                    Computer Science/ Information Technology. </td>
                            </tr>
                            <tr>
                                <td> PGT-Bengali </td>
                                <td>0</td>
                                <td>M.A. (Bengali), B.Ed. </td>
                            </tr>
                            <tr>
                                <td> PGT-Hindi </td>
                                <td>0</td>
                                <td>M.A. (Hindi), B.Ed. </td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <h5><b>N.B. – Candidates without any professional training are not eligible.</b></h5>
                </div>
            </div>
        </div>
    </section>
@endsection
