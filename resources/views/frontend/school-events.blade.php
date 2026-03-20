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
            <div class="col-lg-12 mb-3">
                <h2>School Events</h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. </p>
            </div>
        </div>
        @foreach($events as $event)
		<div class="row mb-4">
			<div class="col-lg-6">
				<div class="syllabust-box-img">
					<img src="{{ asset('storage/' . $event->image) }}" class="img-fluid border-radius" alt="{{ $event->title }}">
				</div>
			</div>
			<div class="col-lg-6 align-self-center">
				<div class="syllabust-box sb_min_height mb-0">
					<h3>{{ $event->title }}</h3>
					<p class="mb-0"><b>Scheduled in : </b>{{ $event->event_date ? \Carbon\Carbon::parse($event->event_date)->format('d M Y') : 'No Date Set' }}</p>
					<p><b>Participation allowed :</b> {{ $event->allowed}} </p>
					<p>{{ $event->description }}</p>
				</div>
			</div>
		</div>
		@endforeach
        {{-- <div class="row mb-4">
                <div class="col-lg-6">
                    <div class="syllabust-box-img">
                        <img src="{{ asset('frontend-asset/images/event-pic1.jpg') }}" class="img-fluid border-radius"
        alt="...">
    </div>
    </div>
    <div class="col-lg-6 align-self-center">
        <div class="syllabust-box sb_min_height mb-0">
            <h3>{{Investiture Ceremony}} </h3>
            <p class="mb-0"><b>Scheduled in : </b>April</p>
            <p> Investiture Ceremony witnesses the proud coronation of young leaders as the members of the
                Students' council. The take oath to endeavour for the sake of upholding the dignity, honour and
                excellence of South End School and accomplish their allegiance faithfully and profoundly to
                pioneer an illustration of supreme leadership spirit within the school with their heads held
                high.</p>
        </div>
    </div>
    </div> --}}
    {{-- <div class="row mb-4">
                <div class="col-lg-6">
                    <div class="syllabust-box-img">
                        <img src="{{ asset('frontend-asset/images/event-pic1.jpg') }}" class="img-fluid border-radius"
    alt="...">
    </div>
    </div>
    <div class="col-lg-6 align-self-center">
        <div class="syllabust-box sb_min_height mb-0">
            <h3>Investiture Ceremony </h3>
            <p class="mb-0"><b>Scheduled in : </b>April</p>
            <p> Investiture Ceremony witnesses the proud coronation of young leaders as the members of the
                Students' council. The take oath to endeavour for the sake of upholding the dignity, honour and
                excellence of South End School and accomplish their allegiance faithfully and profoundly to
                pioneer an illustration of supreme leadership spirit within the school with their heads held
                high.</p>
        </div>
    </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="syllabust-box-img">
                <img src="{{ asset('frontend-asset/images/event-pic1.jpg') }}" class="img-fluid border-radius"
                    alt="...">
            </div>
        </div>
        <div class="col-lg-6 align-self-center">
            <div class="syllabust-box sb_min_height mb-0">
                <h3>Investiture Ceremony </h3>
                <p class="mb-0"><b>Scheduled in : </b>April</p>
                <p> Investiture Ceremony witnesses the proud coronation of young leaders as the members of the
                    Students' council. The take oath to endeavour for the sake of upholding the dignity, honour and
                    excellence of South End School and accomplish their allegiance faithfully and profoundly to
                    pioneer an illustration of supreme leadership spirit within the school with their heads held
                    high.</p>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="syllabust-box-img">
                <img src="{{ asset('frontend-asset/images/event-pic1.jpg') }}" class="img-fluid border-radius"
                    alt="...">
            </div>
        </div>
        <div class="col-lg-6 align-self-center">
            <div class="syllabust-box sb_min_height mb-0">
                <h3>Investiture Ceremony </h3>
                <p class="mb-0"><b>Scheduled in : </b>April</p>
                <p> Investiture Ceremony witnesses the proud coronation of young leaders as the members of the
                    Students' council. The take oath to endeavour for the sake of upholding the dignity, honour and
                    excellence of South End School and accomplish their allegiance faithfully and profoundly to
                    pioneer an illustration of supreme leadership spirit within the school with their heads held
                    high.</p>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="syllabust-box-img">
                <img src="{{ asset('frontend-asset/images/event-pic1.jpg') }}" class="img-fluid border-radius"
                    alt="...">
            </div>
        </div>
        <div class="col-lg-6 align-self-center">
            <div class="syllabust-box sb_min_height mb-0">
                <h3>Investiture Ceremony </h3>
                <p class="mb-0"><b>Scheduled in : </b>April</p>
                <p> Investiture Ceremony witnesses the proud coronation of young leaders as the members of the
                    Students' council. The take oath to endeavour for the sake of upholding the dignity, honour and
                    excellence of South End School and accomplish their allegiance faithfully and profoundly to
                    pioneer an illustration of supreme leadership spirit within the school with their heads held
                    high.</p>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="syllabust-box-img">
                <img src="{{ asset('frontend-asset/images/event-pic1.jpg') }}" class="img-fluid border-radius"
                    alt="...">
            </div>
        </div>
        <div class="col-lg-6 align-self-center">
            <div class="syllabust-box sb_min_height mb-0">
                <h3>Investiture Ceremony </h3>
                <p class="mb-0"><b>Scheduled in : </b>April</p>
                <p> Investiture Ceremony witnesses the proud coronation of young leaders as the members of the
                    Students' council. The take oath to endeavour for the sake of upholding the dignity, honour and
                    excellence of South End School and accomplish their allegiance faithfully and profoundly to
                    pioneer an illustration of supreme leadership spirit within the school with their heads held
                    high.</p>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="syllabust-box-img">
                <img src="{{ asset('frontend-asset/images/event-pic1.jpg') }}" class="img-fluid border-radius"
                    alt="...">
            </div>
        </div>
        <div class="col-lg-6 align-self-center">
            <div class="syllabust-box sb_min_height mb-0">
                <h3>Investiture Ceremony </h3>
                <p class="mb-0"><b>Scheduled in : </b>April</p>
                <p> Investiture Ceremony witnesses the proud coronation of young leaders as the members of the
                    Students' council. The take oath to endeavour for the sake of upholding the dignity, honour and
                    excellence of South End School and accomplish their allegiance faithfully and profoundly to
                    pioneer an illustration of supreme leadership spirit within the school with their heads held
                    high.</p>
            </div>
        </div>
    </div> --}}
    </div>
</section>
@endsection