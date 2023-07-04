@extends('layouts.app2')

@section('content')
    <div class="container p-5">
        <div class="row align-items-start mb-4">
            <div class="col">
              <a class="btn btn-primary" href="#" >All Posts</a>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form action="{{route('cates.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">name</label>
              <input type="text" class="form-control" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection