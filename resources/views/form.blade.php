        @extends('layouts.app')




        @section('content')

@if ($errors->any())
            @foreach ($errors->all() as $error)
               <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
  <div class="flex">
    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
    <div>
      <p class="font-bold">alert</p>
      <p class="text-sm">{{$error}}</p>
    </div>
  </div>
</div>
            @endforeach
        @endif


<section class="bg-gray-100">
  <div class="max-w-screen-xl px-4 py-16 mx-auto sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
      <div class="lg:py-12 lg:col-span-2">



      </div>

      <div class="p-8 bg-white rounded-lg shadow-lg lg:p-12 lg:col-span-3">


        <form action="
{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="space-y-4">
@csrf

          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

            <div>
              <label class="sr-only" for="phone">Titre</label>
              <input
                class="w-full p-3 text-sm border-gray-200 rounded-lg"
                placeholder="Votre titre"

                name="title"
              />
            </div>
          </div>


          <div>
            <label class="sr-only" for="message">Message</label>
            <textarea
              class="w-full p-3 text-sm border-gray-200 rounded-lg"
              placeholder="Message"
              rows="8"
              name="content"
            ></textarea>
          </div>



          <div class="mt-4">
            <button
              type="submit"
              class="inline-flex items-center justify-center w-full px-5 py-3 text-white bg-black rounded-lg sm:w-auto"
            >
              <span class="font-medium"> Send article </span>

              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 ml-3"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </button>



<div class="flex justify-center">
  <div class="mb-3 w-96">
    <label for="formFileSm" class="form-label inline-block mb-2 text-gray-700">Upload avatar</label>
    <input class="form-control
    block
    w-full
    px-2
    py-1
    text-sm
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" name="avatar" id="formFileSm" type="file">
  </div>
</div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection


