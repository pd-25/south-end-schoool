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
			<div class="col-lg-12 text-center mb-3">
				<h2>Students' Council Ay 2024-25</h2>
				<p>My endeavour has always been strengthen the tri-polar bonding between the school, the students and the Parents, so that we can share in the collaborative effort to bring about spiritual nurturing and effective and successful learning.</p>
			</div>
		</div>
		<hr>

@foreach ($categories as $category)
    @if ($category->councils->count())
    {{-- Category Heading --}}
    <div class="row mt-5">
        <div class="col-lg-12 text-center mb-4">
            <h3>{{ $category->name }}</h3>
        </div>
    </div>

    {{-- Council Members --}}
    <div class="row">
        @foreach ($category->councils as $council)
        <div class="col-lg-3 mb-4">
            <div class="teacher-box">
                <img src="{{ asset('storage/' . $council->image) }}" class="img-fluid w-100 mb-3" alt="{{ $council->heading }}">
                <h4>{{ $council->designation }}</h4>
                <p class="c_name mb-2"><span>{{ $council->heading }}</span></p>
            </div>
        </div>
        @endforeach
    </div>
    @endif
@endforeach

	</div>
	</div>
</section>
@endsection