@extends('layouts.app')

@section('content')
<div class="container py-5">
<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="search">
            <form action="{{ route('search') }}" method="GET">
                <i class="fa fa-search"></i>
                <input type="text" name="query" class="form-control" value="{{$query}}" placeholder="Type here to search...">
                <!-- <input type="text" name="query2" class="form-control" placeholder="Author..."> -->
                
                <!-- <select class="fstdropdown-select" id="example" value="{{$query2}}" name="query2">
                    <option value="">Select option</option>
                    @foreach ($users as $name)
                        <option value="{{ $name }}" {{ $query2 == $name ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select> -->

                <select class="js-example-basic-single" value="{{$query2}}" name="query2">
                    <option value="">Select option</option>
                    @foreach ($users as $name)
                        <option value="{{ $name }}" {{ $query2 == $name ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>

                <!-- <select class="js-example-basic-multiple" name="query4"  multiple="multiple">
                @foreach ($cates as $name)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
                </select> -->
                
                
                @php
                    $selectedValues = is_array(request('query4')) ? request('query4') : explode(',', request('query4', ''));
                @endphp

                <select class="js-example-basic-multiple" name="query4[]" multiple="multiple">
                    @foreach ($cates as $name)
                        <option value="{{ $name }}" {{ in_array($name, $selectedValues) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>

                <input name="query3" id="startDate" class="form-control" value="{{$query3}}" type="date"/>

                
                
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

