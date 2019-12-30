<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		@for ($i = 0; $i < count($banner); $i++)
		<li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i==0?'active':'' }}"></li>
		@endfor
	</ol>
	<div class="carousel-inner">
		@foreach ($banner as $item)
		<div class="carousel-item {{ $loop->first?'active':'' }}" style="background-image: url({{ asset(Storage::url($item->imagen))}});">
			<div style="padding-bottom: 45%;width: 100%;background-color: rgba(0,0,0,0.3);">
			</div>
			<div class="carousel-content">
				<div class="container">
					<div class="carousel-texto-1">{{ $item->texto1 }}</div>
					<div class="carousel-texto-2">{{ $item->texto2 }}</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>