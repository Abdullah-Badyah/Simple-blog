@extends('layouts.app2')

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

       <form action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="" class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="{{$post->title}}">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Content</label>
              <textarea class="form-control" name="content" rows="3">{{$post->content}}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <textarea class="form-control" name="category" rows="3">{{$post->category}}</textarea>
              </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <img src="/images/{{$post->image}}" class="img-fluid rounded-top" alt="">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection