@extends('layouts.app2')

@section('content')
<div class="container">
<div class="row align-items-start mb-4">
    <div class="col">
        <a class="btn btn-primary" href="{{route('posts.create')}}" >Create</a>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>
@endif

<div class="table-responsive">
    <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th>Created by</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($posts as $item)
                <tr class="table-primary" >
                    <td>{{$item->id}}</td>
                    <td> <img src="/images/{{$item->image}}" width="200px"></td>
                    <td>{{$item->title}}</td>
                    <td>{{ Str::limit(strip_tags($item->content), 200, '...') }}</td>
                    <td>
                        @foreach ($item->categories as $category)
                            {{ $category->name }}
                        @endforeach
                    </td>
                    <td>
                        {{$item->createdBy->name}}
                    </td>
                    <td>
                        {{$item->verified ? 'published':'unpublished'}}
                    </td>
                    <td>
                        @auth <!--run this code if the user is logged in-->
                            <form action="{{route('posts.destroy', $item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <a class="btn btn-primary" href="{{route('posts.edit', $item->id)}}">Edit</a>
                            @if (auth()->user()->userType == 'admin')
                            <a class="btn btn-primary" href="{{ route('posts.publish', $item->id) }}">
                                {{$item->verified ? 'Unpublish' : 'Publish'}}
                            </a>
                            @endif
                            

                        @endauth
                        <a class="btn btn-primary" href="{{route('posts.show', $item->id)}}">Show</a>
                    </td>
                </tr>
            @endforeach

           
        </tbody>
            <tfoot>
                
            </tfoot>
    </table>

    {!! $posts -> links() !!}

    {{-- {!! $posts->links('pagination') !!} --}}
</div>
</div>

@endsection