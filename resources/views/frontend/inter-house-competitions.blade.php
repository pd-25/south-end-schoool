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
			<div class="col-lg-12 mb-3">
				<h2>Inter-House Competitions </h2>
				<p> School level competitions are about more than just participation and winning prizes. They can play a major role in unleashing natural talents of the students beyond academics. The objective of these competitions is to provide the students with platforms to exhibit their creative abilities that can have a life-changing effect.</p>
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
	</div>
</section>
@endsection