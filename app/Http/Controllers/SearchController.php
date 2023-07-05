<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Post::where('title', 'LIKE', '%'.$query.'%')->get();
        $posts = Post::where('verified', 1)->latest()->paginate(2);
        return view('posts.search', compact('results', 'posts'));
    }
}
