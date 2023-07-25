<div class="search">
				<form action="{{ route('search') }}" method="GET">
					<i class="fa fa-search"></i>
					<input type="text" name="query" class="form-control" placeholder="Type here to search...">
					<button type="submit" class="btn btn-primary">Search</button>
				</form>
			</div>
			<div class="mt-5">
				<h4 class="widget-title">Categories</h4>
				<ul class="ps-3 mb-5 widget-list">
				@foreach($cates as $cate)
					<li class="list-group-item">
						<a href="{{ route('cates.show', $cate) }}">{{ $cate->name }}</a>
					</li>
				@endforeach
				</ul>
				
				<h4 class="widget-title">Latest Posts</h4>
				<ul class="ps-3 mb-5 widget-list">
				@foreach($posts->take(5) as $post)
					<li class="list-group-item">
						<a href="{{route('posts.show',$post->id)}}">{{ $post->title }}</a>
					</li>
					<hr>
				@endforeach
				</ul>

				<h4 class="widget-title">Social Media</h4>
				<div class="text-center">
					<img src="/images/facebook.png" class="social-imgs">
					<img src="/images/twitter (2).png" class="social-imgs">
					<img src="/images/linkedin.png" class="social-imgs">
					<img src="/images/instagram.png" class="social-imgs">
				</div>
				
			</div>