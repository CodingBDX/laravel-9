


        @extends('layouts.app')


    @section('content')

    <h1>liste des articles</h1>
    <h2>{{ $title }}</h2>
    <h2>{{ $title2 }}</h2>
<ul>
    @foreach ($mesarticles as $article)
   <li> {{ $article}}</li>

    @endforeach

    @endsection
