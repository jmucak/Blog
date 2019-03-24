<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Category;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();
        
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // vrati create view

        $categories = Category::all();

        if($categories->count() == 0) {

            
            return redirect()->back();
        }

        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'
        ));

        //$featured = $request->featured; -> on je to napisao
        $featured = request('featured');
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts', $featured_new_name);

        //$post = new Post();

        $post = Post::create(array(
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title) // ugrađena laravel funkcija za generiranje slugova
        ));

        return redirect()->back();

        //dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->back();
    }

    public function trashed() {

        $posts = Post::onlyTrashed()->get();

        // onlyTrashed() -> vraća samo trashed iz tablice -> ugrađena funkcija u laravelu

        //dd($posts);

        return view('posts.trashed')->with('posts', $posts);
    }

    public function kill($id) {
        
        $post = Post::withTrashed()->where('id', $id)->first();

        //dd($post);
        // first() umjesto get()
        // get() vraća kolekciju
        /* 
            withTrashed() -> ugrađena funkcija u laravelu
            all()-> vraće sve iz tablice osim trashed
        */

        $post->forceDelete();

        // forceDelete() -> ugrađena funkcija laravela, forca brisanje iz tablice (potrebno jer koristim softDeletes)

        return redirect()->back();

    }

    public function restore($id) {

        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        return redirect()->route('posts');
    }
}
