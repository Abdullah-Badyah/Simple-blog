@extends('layouts.app')

@section('content')
<div class="container py-5">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="search">
            <form action="{{ route('search') }}" method="GET">
                <i class="fa fa-search"></i>
                <input type="text" name="query" class="form-control" placeholder="Type here to search...">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <div class="col-3"></div>
    
</div>
    
    <h1 class="mt-5">Search Results</h1>
    @if(count($results) > 0)
        <div class="row">
            <!-- <ul class="ps-0"> -->
            @foreach($results as $result)
                <div class="col-4">
                    @include('components.postcard2', ['id'=>$result->id ,'image' => $result->image, 'title' => $result->title, 'created_at' => $result->created_at, 'createdBy' => $result->createdBy->name, 'categories' => $result->categories, 'content' => $result->content])
                </div>
            @endforeach
            <!-- </ul> -->
        </div>
       
    @else
        <p>No results found.</p>
    @endif
</div>

@endsection