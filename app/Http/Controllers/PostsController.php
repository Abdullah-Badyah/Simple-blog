<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use HTMLPurifier;
use HTMLPurifier_Config;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['show','index','test']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('verified', 1)->latest()->paginate(5);

        return view('posts.index', compact('posts'))
                    ->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cates = Category::all();
        return view('posts.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            // 'category'=> 'required',
            'image'=> 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        $input = $request->all();
        
        if ($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('Ymdhis').".".$image->getClientOriginalExtension();
            $image -> move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        
        $input['created_by'] = auth()->user()->id;
        
        $post = Post::create($input);

        $post = Post::find($post->id);
        foreach ($request->input('category') as $value) {
            $post->categories()->attach($value);
        }


        return redirect()->route('posts.index')
            ->with('success','Post added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $post->content = $purifier->purify($post->content);
        
        $posts = Post::latest()->paginate(5);
        return view('posts.show', compact('post','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=> 'required',
            'content'=> 'required',
            'category'=> 'required',
        ]);

        $input = $request -> all();
        if($image = $request->file('image')){
            $destinationPath = 'images/';
            $profileImage = date('Ymdhis').".".$image->getClientOriginalExtension();
            $image -> move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else {
            unset($input['image']);
        }

        $post -> update($input);

        return redirect()->route('posts.index')
        ->with('success','posts updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
                ->with('success','posts deleted successfully');
    }


    public function controlPanel()
    {
        if(auth()->user()->userType == 'admin'){
            $posts = Post::latest()->paginate(5);
        }
        
        else{
            $posts = Post::latest()
            ->where('created_by', auth()->user()->id)
            ->paginate(5);
        }

        return view('posts.controlPanel', compact('posts'))
                    ->with('i', (request()->input('page', 1)-1)*5);
    }

    public function publish(Post $post)
    {
        $post->update(['verified' => $post->verified ? 0 : 1]);

        return redirect()->back();
    }
}
