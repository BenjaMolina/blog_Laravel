<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use App\Tag;

class PagesController extends Controller
{
    
    public function blog()
    {
        $posts = Post::orderBy('id','DESC')->where('status','PUBLISHED')->paginate(7);

        return view('blog.posts',compact('posts'));
    }

    
    public function post($slug)
    {
        $post = Post::where('slug',$slug)->with(['category','tags'])->first();
        
        return view('blog.post',compact('post'));
    }

    public function categoria($slug)
    {
        // $category = Category::where('slug',$slug)->pluck('id')->first();
        // $posts    = Post::where('category_id',$category)
        //                 ->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(7);

        $posts = Post::whereHas('category',function($query) use($slug){
            $query->where('slug',$slug);

        })->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(7);

        return view('blog.posts',compact('posts'));
    }

    public function etiqueta($slug)
    {
        $posts = Post::whereHas('tags',function($query) use($slug){
            $query->where('slug',$slug);
            
        })->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(7);
        
        return view('blog.posts',compact('posts'));
    }

   
}
