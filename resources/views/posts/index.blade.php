@extends('layouts.app')

@section('content')

<div class="">

<div class="row">

	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($posts as $index => $item)
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{$index+1}}"></button>
			@endforeach
			{{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$index}}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button> --}}
		</div>
		<div class="carousel-inner d-flex align-items-center">
			@if ($posts->isEmpty())
				<h2 class="m-auto">No Posts to Display</h2>
			@else
				@foreach ($posts as $index => $post)
				<div class="carousel-item position-relative {{ $index == 0 ? 'active' : '' }}">
					<div class="overlay"></div>
    				<div class="d-flex align-items-center" style="background-image: url('images/{{$post->image}}'); height:100%; background-size: cover;">
						<div class="container px-lg-5">
							<div class="row carousel-row d-flex align-items-center p-4">
								{{-- <div class="col-lg-1"></div> --}}
								<div class="col-lg-6">
									<img src="images/{{$post->image}}" class="carousel-image d-block w-100 shadow bg-body rounded" alt="{{ $post->title }}">
								</div>
								<div class="col-lg-6">
									<div class="carousel-caption d-none d-md-block">
										<h5 class="fw-bold fs-1 mb-3">{{ $post->title }}</h5>
										<p class="mb-0">{{ Str::limit(strip_tags($post->content), 200, '...') }}</p>
										<div class="meta d-flex mb-3 mt-2">
											<div class="pe-2"><ion-icon name="calendar"></ion-icon> {{$post->created_at}}</a></div>
											<div class="pe-2"><ion-icon name="person"></ion-icon> {{$post->createdBy->name}}</div>
											<div class="pe-2"><ion-icon name="document"></ion-icon>
												@foreach ($post->categories as $category)
													<a href="{{ route('cates.show', $category) }}">{{ $category->name }}</a>
												@endforeach
											</div>
										</div>
										{{-- <a class="btn" href="{{route('posts.show',$post->id)}}"><ion-icon name="book-outline"></ion-icon>Read More</a> --}}
										<a type="button" class="btn read-btn align-items-center px-3" href="{{route('posts.show',$post->id)}}"><ion-icon class="pe-2" name="book-outline"></ion-icon>Read More</a>
									</div>
								</div>
								{{-- <div class="col-lg-1"></div> --}}
							</div>
						</div>
					</div>
				</div>
				@endforeach
			@endif
			
		</div>
		
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		  <ion-icon class="carousel-nav" name="chevron-back-circle"></ion-icon>
		  <span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		  <ion-icon class="carousel-nav" name="chevron-forward-circle"></ion-icon>
		  <span class="visually-hidden">Next</span>
		</button>
	  </div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col-8">
			@if ($posts->isEmpty())
				<h2>No Posts to Display</h2>
			@else
				@foreach ($posts as $item)
					<article class="postcard dark blue">
						<a class="postcard__img_link" href="#">
							<img class="postcard__img" src="images/{{$item->image}}" alt="Image Title" />
						</a>
						<div class="postcard__text">
							<h1 class="postcard__title blue on-top"><a href="#">{{$item->title}}</a></h1>
							<div class="postcard__subtitle small">
								<time datetime="2020-05-25 12:00:00">
									<ion-icon class="pe-2" name="calendar"></ion-icon>{{$item->created_at}}
								</time>
								<span><ion-icon class="pe-1 ps-2" name="person"></ion-icon>{{$item->createdBy->name}}</span>
								<span><ion-icon class="pe-1 ps-2" name="document"></ion-icon>
									@foreach ($item->categories as $category)
										{{ $category->name }}
									@endforeach
								</span>
							</div>
							<div class="postcard__bar on-top"></div>
							<div class="postcard__preview-txt on-top">{{ Str::limit(strip_tags($post->content), 200, '...') }}</div>
							<ul class="postcard__tagbox on-top">
								<li class="tag__item play blue">
									<a href="{{route('posts.show',$item->id)}}"><i class="fas fa-play mr-2"></i>Read More</a>
								</li>
							</ul>
						</div>
					</article>
				@endforeach
				{!! $posts -> links() !!}
			@endif
			
		</div>
		<div class="col-4">
			<div class="search">
				<form action="{{ route('search') }}" method="GET">
					<i class="fa fa-search"></i>
					<input type="text" name="query" class="form-control" placeholder="Type here to search...">
					<button type="submit" class="btn btn-primary">Search</button>
				</form>
			</div>
		</div>

	  </div>
	</div>
</div>
@endsection