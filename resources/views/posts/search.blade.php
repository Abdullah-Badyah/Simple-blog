@extends('layouts.app')

@section('content')
<div class="container py-5"> 

    <form action="{{ route('search') }}" method="GET">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="row">
                    <div class="col-8 pe-1">
                        <label class="search-lbl">Title</label>
                        <input type="text" name="query" class="form-control" value="{{$query}}">
                    </div>
                    <div class="col-4">
                        <label class="search-lbl">Date</label>
                        <input name="query3" id="startDate" class="form-control" value="{{$query3}}" type="date"/>
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-8 pe-1">
                        <label class="search-lbl">Categories</label>
                        <select class="js-example-basic-multiple form-control" name="query4[]" multiple="multiple">
                            <option value="">Categories</option>
                            @foreach ($cates as $name)
                                <option value="{{ $name }}" {{ in_array($name, $selectedValues) ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="search-lbl">Author</label>
                        <select class="js-example-basic-single" value="{{$query2}}" name="query2">
                            <option value=""></option>
                            @foreach ($users as $name)
                                <option value="{{ $name }}" {{ $query2 == $name ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                

                
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 d-flex justify-content-between align-items-end mt-3">
                <button type="submit" class="btn btn-primary w-50">Search</button>


                <a href="/search">clear</a>
                <!-- <div class="form-check form-switch">
                    <input name="advancSearch" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onclick="toggleStartDate()">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Advanced Search</label>
                </div> -->
            </div>
            <div class="col-3"></div>
        </div>
                
       
        
        
    </form>
 
    <!-- <button type="button" onclick="SearchController().redirectToSearch()">click</button> -->

    
    <h1 class="mt-5">{{count($results)}} Search Results</h1>
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

