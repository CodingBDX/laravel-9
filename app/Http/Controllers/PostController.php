<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Video;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Void_;
use Stringable;

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





//  $request->validate([
//     'title' => ['required', 'min:12', 'unique:posts', new Uppercase],
//     'content' => 'required|max:250'
//  ]);
$storing = Storage::disk('public')->put('avatars', $request->avatar);
// $filename = time() . '.' . $request->avatar->extension();




$post =  Post::created ([
    'title' => $request->title,
    'content' => $request->content

]);

$image = new Image();
$image->path = $storing;
// $image->post_id = $post->id;

$post->image()->save();
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
