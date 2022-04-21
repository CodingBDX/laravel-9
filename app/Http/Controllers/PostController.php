<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index() {
        $posts = [
           'sfdfgr ferd',
             'sdfrg dfef',
             'sfdggb qxsd'
        ];
        $title = 'mon super titre';
        $title2 = 'mon deuxieme super titre';

        return view('article', [
            'title' => $title,
            'title2' => $title2,
            'mesarticles' => $posts

        ]);
        }

    protected function show($id) {
        $posts = [
            '1' => 'mon titre n°1',
            '2' => 'mon titre n°2',
            '3' => 'mon titre n°3'

        ];
        $post = $posts[$id] ?? 'pas de titre';

        return view('post', [
'post' => $post
        ]);
    }

    protected function contact() {
        return view('contact');
    }
}
