@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>
    @if(count($results) > 0)
        <ul>
            @foreach($results as $result)
                <li>{{ $result->title }}</li>
            @endforeach
        </ul>
    @else
        <p>No results found.</p>
    @endif
@endsection