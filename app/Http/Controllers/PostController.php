<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index() {

$video = Video::find(1);
        $posts = Post::orderBy('title')->take(10)->get();


        return view('article', [
            'mesarticles' => $posts,
            'mavideo' => $video


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

    public function register() {
        $post = Post::find(1);
        $video = Video::find(1);
$comment1 = new Comment([
    'content' => 'super commentaire de ouf'
]);
$comment2 = new Comment([
    'content' => 'encore une video'
]);

$post->comments()->save($comment1);
$video->comments()->save($comment2);

    }

}
