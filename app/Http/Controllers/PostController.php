<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Psr7\Response;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                        request(['search', 'category', 'author'])
                    )->paginate(18)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
       public function create(Post $post)
    {

   return view('posts.create');

    }
    public function store(){
    // validate inputs
     $attributes = request()->validate([
            'title' => 'required',
            'slug'=>['required',Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required',Rule::exists('categories','id')],
        ]);
        $attributes['user_id']=auth()->id();

        Post::create($attributes);

        return redirect('/')->with('success', 'Your post has been published.');
    }
    }
