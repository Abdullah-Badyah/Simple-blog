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

       <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">Title</label>
              <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Content</label>
              {{-- <textarea class="form-control" name="content" rows="3"></textarea> --}}
            <textarea name="content" class="form-control tinymce"></textarea>
             

            </div>
            <div class="mb-3">
                <label for="" class="form-label cates-lbl">Category</label>
                
                @foreach ($cates as $item)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="category[]" id="inlineCheckbox1" value="{{$item->id}}">
                        <label class="form-check-label" for="inlineCheckbox1">{{$item->name}}</label>
                    </div>
                @endforeach 
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
    </div>
@endsection