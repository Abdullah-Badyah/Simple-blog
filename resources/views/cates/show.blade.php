@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            @foreach ($posts as $item)
                <div class="col-md-4">
                    <div class="card card-blog">
                        <div class="card-image">
                            <a href="{{route('posts.show',$item->id)}}"> <img class="img" src="/images/{{$item->image}}"> </a>
                            <div class="ripple-cont"></div>
                        </div>
                        <div class="table">
                            <h6 class="category text-success"><i class="fa fa-university"></i> Law</h6>
                            <h4 class="card-caption">
                        <a href="{{route('posts.show',$item->id)}}">{{$item->title}}</a>
                        </h4>
                            <p class="card-description">{{ Str::limit(strip_tags($item->content), 200, '...') }}</p>
                            <div class="ftr">
                                <div class="author">
                                    <a href="#"> <img src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=740&t=st=1681074317~exp=1681074917~hmac=623eabb12f3d86f4321fae172d8aab1f7fdb915b0849ed3d6679f246ea34ff4d" alt="..." class="avatar img-raised"> <span>{{$item->createdBy->name}}</span> </a>
                                </div>
                                <div class="stats"> <i class="fa fa-clock-o"></i> 10 min </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- {{$category}}   --}}
    </div>



    {{-- <article class="col-md-12">
        <!-- Modern - Bootstrap Cards -->
        <header>
            <h2>Modern - Bootstrap 4 Cards</h2> </header>
        <!-- BLOG CARDS -->
        <h2>Blog Cards</h2>
        <div class="cards-1 section-gray">
            <div class="container">
                <div class="row">
                  
                    <div class="col-md-4">
                        <div class="card">
                            <div class="table">
                                <h6 class="category text-danger">
	    									<i class="fa fa-globe "></i> World
	    								</h6>
                                <h4 class="card-caption">
	    									<a href="#">Vivamus odio ante, feugiat eget nisi sit amet, dignissim velit.</a>
	    								</h4>
                                <div class="ftr">
                                    <div class="author">
                                        <a href="#"> <img src="http://adamthemes.com/demo/code/cards/images/avatar3.png" alt="" class="avatar img-raised"> <span>Patrick Wood</span>
                                            <div class="ripple-cont">
                                                <div class="ripple ripple-on ripple-out" style="left: 574px; top: 364px; background-color: rgb(60, 72, 88); transform: scale(11.875);"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="stats"> <i class="fa fa-heart"></i> 342 &nbsp; <i class="fa fa-comment"></i> 45 </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-blog">
                            <div class="card-image">
                                <a href="#"> <img class="img" src="http://adamthemes.com/demo/code/cards/images/blog01.jpeg"> </a>
                                <div class="ripple-cont"></div>
                            </div>
                            <div class="table">
                                <h6 class="category text-success"><i class="fa fa-university"></i> Law</h6>
                                <h4 class="card-caption">
                            <a href="#">Vivamus odio ante, feugiat eget nisi sit amet, dignissim velit</a>
	    			        </h4>
                                <p class="card-description"> Lorem ipsum dolor sit amet, consectetur adipis cingelit. Etiam lacinia elit et placerat finibus.</p>
                                <div class="ftr">
                                    <div class="author">
                                        <a href="#"> <img src="http://adamthemes.com/demo/code/cards/images/avatar3.png" alt="..." class="avatar img-raised"> <span>Mary Dunst</span> </a>
                                    </div>
                                    <div class="stats"> <i class="fa fa-clock-o"></i> 10 min </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </article> --}}




@endsection