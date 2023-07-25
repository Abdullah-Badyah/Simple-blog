@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-5">
            <!-- @foreach ($posts as $item)
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
            @endforeach -->

            <span class="fs-2"><b>{{$categoryName}}</b> category</span>
            @if(count($posts) > 0)
        <div class="row">
            <!-- <ul class="ps-0"> -->
            @foreach($posts as $post)
                <div class="col-4">
                    @include('components.postcard2', ['id'=>$post->id ,'image' => $post->image, 'title' => $post->title, 'created_at' => $post->created_at, 'createdBy' => $post->createdBy->name, 'categories' => $post->categories, 'content' => $post->content])
                </div>
            @endforeach
            <!-- </ul> -->
        </div>
       
    @else
        <p>No results found.</p>
    @endif
        </div>
       
    </div>








@endsection