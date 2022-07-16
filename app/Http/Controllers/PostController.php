<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $this->authorize('view', Post::class);
        $role = Auth::user()->role_id;
        if($role == 1){
            $posts = Post::latest()->get();
        }else{
            $posts = Post::where('user_id', auth()->user()->id)->latest()->get();
        }
        return view('backend.pages.show_post', compact('posts'));
    }

    public function create()
    {
        $this->authorize('create', Post::class);
        return view('backend.pages.create_post');
    }
    
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
         ]);
         $validatedData['user_id'] = auth()->user()->id;
         Post::create($validatedData);
         return redirect()->route('show.post')->with('success', 'Berhasil Menambah postingan.');
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
         ]);
         Post::where('id', $post->id)->update($validatedData);
         return redirect()->back();
    }

    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect()->back()->with('success', 'Berhasil menghapus postingan.');
    }
}