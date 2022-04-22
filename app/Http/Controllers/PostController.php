<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index() {


        $posts = Post::orderBy('title')->take(6)->get();


        return view('article', [
            'mesarticles' => $posts,


        ]);
        }

    protected function show($id) {

        $post = Post::findOrFail($id);
        // $post = Post::where('title', 'ssfvdf scfd')->firstOrFail();

        // $posts = [
        //     '1' => 'mon titre n°1',
        //     '2' => 'mon titre n°2',
        //     '3' => 'mon titre n°3'

        // ];

        return view('post', [
'article' => $post
        ]);
    }

    protected function contact() {
        return view('contact');
    }

    public function create() {
return view('form');
    }

        public function store(Request $request) {
// $post = new Post();
// $post->title = $request->title;
// $post->content = $request->content;
// $post->save();
// redirect('article');
Post::created([
    'title' => $request->title,
    'content' => $request->content

]);
    }

}
