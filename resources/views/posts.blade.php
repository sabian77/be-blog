<x-layout :title=$title>

    {{-- @foreach ( $posts as $post )
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2 class="mb-1 text-2xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
            </a>
        <div class="text-base ">
            Created by <a href="/authors/{{ $post->user->username }}" class="hover:underline text-gray-500">{{ $post->user->name }}</a>
            in <a href="/categories/{{ $post->category->slug }}"
                 class="hover:underline text-gray-500">{{ $post->category->name }}</a>
             | 10 Juli 2025
        </div>
        <p class="my-5 font-light">{{ Str::limit($post['body'],110) }}</p>

        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-indigo-600 hover:text-indigo-500">Selengkapnya &raquo;</a>
    </article> 
    @endforeach --}}


  <div class="py-4 px-4 mx-auto max-w-screen-xl lg:px-6">
    <form class="mb-8">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif

        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
    <div class="flex justify-end"> <!-- Tambahkan justify-end agar ke kanan -->
        <div class="relative w-full max-w-sm"> <!-- max-w-sm atau sesuai kebutuhan lebar -->
        <input type="search" id="search-dropdown"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg
             focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
              dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
            placeholder="Search Posts" required autofocus autocomplete="off" name="search" />

        <button type="submit"
            class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
            <span class="sr-only">Search</span>
        </button>
        </div>
    </div>
    </form>
    @if ($posts->hasPages ())
        <div class="p-3">
            {{ $posts->links ()}}
        </div>
    @endif
    
      <div class="mt-4 grid gap-8 lg:grid-cols-3 md:grid-cols-2 ">
        @forelse ( $posts as $post )
          <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
              <div class="flex justify-between items-center mb-5 text-gray-500">
                <a href="/posts?category={{ $post->category->slug }}"> 
                  <span 
                  class="{{ $post->category->color }} text-gray-600 text-xs font-medium inline-flex 
                  items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                      {{ $post->category->name }}
                  </span>
                </a>

                  <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
              </div>
              <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <a href="/posts/{{ $post['slug'] }}" class="hover:underline">{{ $post['title'] }}</a>
            </h2>
              <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                  {{ Str::limit($post['body'], 100) }}
              </p>
              <div class="flex justify-between items-center">
                  <a href="/posts?author={{ $post->user->username }}" class="hover:underline text-gray-500">
                  <div class="flex items-center space-x-4">
                      <img class="w-7 h-7 rounded-full" 
                      src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" 
                      alt="{{ $post->user->name }}" />
                        <span class="font-medium text-xs dark:text-white">
                            {{ $post->user->name }}
                        </span>
                  </div>
                    </a>
                  <a href="/posts/{{ $post['slug'] }}" class="inline-flex items-center text-xs font-medium text-primary-600 dark:text-primary-500 hover:underline">
                      Read more
                      <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
          </article> 
        @empty
            <div class="col-span-full flex flex-col items-center justify-center my-20">
                <p class="font-bold text-2xl mb-4 text-center">
                    Yang anda cari tidak ditemukan
                </p>
                <a href="/posts" class="text-blue-600 hover:underline">
                    &laquo; Kembali ke all post
                </a>
            </div>
        @endforelse

        

  </div>


</x-layout>