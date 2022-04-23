        @extends('layouts.app')




        @section('content')




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
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection


