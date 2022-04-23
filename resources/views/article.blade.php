


        @extends('layouts.app')


    @section('content')

	<div class="text-center pt-16 md:pt-32">

        <h1 class="font-bold break-normal text-3xl md:text-5xl">Les articles</h1>
             <p>il y a {{ Str::length($mesarticles)}} articles</p>

   	</div>
    <div class="flex flex-wrap justify-between pt-12 -mx-6">
					<!--1/3 col -->

    @if ($mesarticles->count() > 0)


    @foreach ($mesarticles as $article)
	<div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
						<div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
							<a href="{{  route('posts.show', ['id' => $article->id])  }}" class="flex flex-wrap no-underline hover:no-underline">
								<img src="https://source.unsplash.com/collection/225/800x600" class="h-64 w-full rounded-t pb-6">
								<p class="w-full text-gray-600 text-xs md:text-sm px-6">Liste des articles</p>
								<div class="w-full font-bold text-xl text-gray-900 px-6">{{ $article->title }}</div>
								<p class="text-gray-800 font-serif text-base px-6 mb-5">
{{ $article->content }}
								</p>
							</a>
						</div>
						<div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
							<div class="flex items-center justify-between">
                                <a href="{{$article->deleted($article->id)}}">Delete</a>
                                 <button
        type="button" action="{{$article->deleted($article->id)}}"
        class="inline-block px-5 py-3 ml-3 text-sm font-medium text-white bg-red-500 rounded-lg"
      >
        Delete
      </button>
								<p class="text-gray-600 text-xs md:text-sm"> {{ $article->created_at }}</p>
							</div>
						</div>
					</div>
                    @endforeach
@else
<p>nothing to look</p>

 @endif

    </div>

	<div class="text-center pt-16 md:pt-32">
		<h1 class="font-bold break-normal text-3xl md:text-5xl">Les Videos</h1>
	</div>

    @foreach ($mavideo->comments as $comment)
    <p>{{$comment->content}}</p>

    @endforeach
    @endsection

