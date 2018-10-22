<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;

use App\Http\Requests\PostRequest;
    use Illuminate\Support\Facades\Storage;

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
        $posts = Post::where('user_id',auth()->user()->id)->paginate();
        // return $posts;
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get(['id','name']);

        // return ($categories);

        return view('admin.posts.create',compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = (new Post)->fill($request->all());

        if($request->hasFile('file'))
        {
            $path = Storage::disk('public')->put('image',$request->file('file'));
            $post->fill(
                ["file" => asset($path)]
            )->save();
            
        }

        //Guardamos los Tags
        $post->tags()->sync($request->tags);
       

        return redirect()->route('posts.edit',$post->id)->with('info', 'entrada creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->authorize('permission',$post);

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {        
        $this->authorize('permission',$post);
       
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get(['id','name']);

        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('permission',$post);
        
        $post->fill($request->all());

        if($request->hasFile('file'))
        {
            $ruta = Storage::disk('public')->put('image', $request->file('file'));
            
            $post->fill([
                "file" => asset($path)

            ])->save();
        }

        //Tags
        $post->tags()->sync($request->tags);

        return back()->with('info', 'Entrada editada Exisota'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('permission',$post);

        $post->delete();

        return back()->with('info', 'Entrada eliminado con exito');
    }
}
