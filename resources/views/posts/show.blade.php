@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="row align-items-start mb-4">
            <div class="col">
              <a class="btn btn-primary" href="{{route('posts.index')}}" >All Posts</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <div class="card text-start">
         <img class="card-img-top" src="/images/{{$post->image}}">
         <div class="card-body">
           <h1 class="card-title">{{$post->title}}</h1>
           {{-- <h4 class="card-title">{{$post->category}}</h4> --}}

           <div class="meta d-flex mb-3">
            <div class="text-secondary pe-2"><ion-icon name="calendar"></ion-icon> {{$post->created_at}}</a></div>
            <div class="text-secondary pe-2"><ion-icon name="person"></ion-icon> {{$post->createdBy->name}}</div>
            <div class="text-secondary pe-2"><ion-icon name="document"></ion-icon>
                @foreach ($post->categories as $category)
                    {{ $category->name }}
                @endforeach
            </div>
           </div>
           <p class="card-text">{!! $post->content !!}</p>         
         </div>
       </div>
    </div>
@endsection