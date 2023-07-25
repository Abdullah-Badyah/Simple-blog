@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <!-- <div class="row align-items-start mb-4">
            <div class="col">
              <a class="btn btn-primary" href="{{route('posts.index')}}" >All Posts</a>
            </div>
        </div> -->

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<div class="row">
    <div class="col-9 pe-4">
    <div class="card text-start">
        <h1 class="card-title">{{$post->title}}</h1>
         <img class="" src="/images/{{$post->image}}">
         <div class="card-body p-0">
           {{-- <h4 class="card-title">{{$post->category}}</h4> --}}

           <div class="meta post-meta d-flex mb-4 py-3 justify-content-center">
            <div class="pe-4"><ion-icon name="calendar"></ion-icon> {{$post->created_at}}</a></div>
            <div class="pe-4"><ion-icon name="person"></ion-icon> {{$post->createdBy->name}}</div>
            <div class="pe-4"><ion-icon name="document"></ion-icon>
                @foreach ($post->categories as $category)
                    {{ $category->name }}
                @endforeach
            </div>
           </div>
           <p class="card-text">{!! $post->content !!}</p>         
         </div>
       </div>
    </div>
    <div class="col-3 mt-5">
    @include('components.sidebar', ['posts'=>$posts ,'cates' => $cates])
        
    </div>
</div>
      
    </div>
@endsection