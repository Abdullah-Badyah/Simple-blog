<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = post::where('title', 'like', '%'.$query.'%')
                        ->where('verified', 1)
                        ->get();
        $posts = Post::where('verified', 1)->latest()->paginate(2);
        return view('posts.search', compact('results', 'posts'));
    }
}
