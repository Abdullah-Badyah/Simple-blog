<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class SearchController extends Controller
{
    public function search(Request $request)
    {


        $query = $request->input('query');
        $query2 = $request->input('query2');
        $query3 = $request->input('query3');
        $query4 = $request->input('query4');
        $advancSearch = $request->input('advancSearch');
        $request = request();

        // return $query4Values;

        $results = Post::where('verified', 1);

        if ($query) {
            $results->where('title', 'like', '%'.$query.'%');
        }

        
            if ($query2) {
                $results->whereHas('createdBy', function ($innerQuery) use ($query2) {
                    $innerQuery->where('name', 'like', '%'.$query2.'%');
                });
            }
    
            if ($query3) {
                $results->whereDate('created_at', '=', $query3);
            }
    
            if ($query4) {
                // $categories = explode(',', $query4);
                $results->whereHas('categories', function ($innerQuery) use ($query4) {
                    $innerQuery->whereIn('name', $query4);
                });
            }
       
        
        $results = $results->get();

        $selectedValues = is_array(request('query4')) ? request('query4') : explode(',', request('query4', ''));

       
        $cates = Category::pluck('name', 'name');
        $users = User::pluck('name', 'name');
        $posts = Post::where('verified', 1)->latest()->paginate(2); //For footer layout - latest posts widget

        // $q4Array = [];
        // $match = preg_match('/query4=(.*?)&/', $request, $matches);
        // // if ($match) {
        // //     $q4Array = explode('&', $matches[1]);
        // // }
        // $q4Array = $matches;

        return view('posts.search', compact('results', 'posts', 'users', 'cates', 'query', 'query2', 'query3', 'query4','selectedValues'));
      
    }

}
