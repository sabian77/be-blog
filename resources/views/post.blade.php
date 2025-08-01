<x-layout :title=$title>

        {{-- <article class="py-8 max-w-screen-md ">
        <h2 class="mb-1 text-2xl tracking-tight font-bold text-gray-900">{{ $post['title'] }} 
            {{-- <div class="inline-block px-4 py-2 mb-6 bg-indigo-100 text-indigo-800 rounded-lg font-semibold">
                {{ $post->count() }} Tulisan
            </div> --}}
        {{-- </h2>
        <div class="text-base text-gray-500">
            <a href="/authors/{{ $post->user->username }}" class="hover:underline">{{ $post->user->name }}</a>
            | 10 Juli 2025
        </div>
        <p class="my-5 font-light">{{ $post['body'] }}</p>

        <a href="/posts" class="font-medium text-indigo-600 hover:text-indigo-500">&laquo; Kembali </a>
    </article>  --}} 
    <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
    <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
    <a href="/posts" class="text-blue-600 text-xs hover:text-blue-500">&laquo;Back to all post</a>
      <header class="my-4 lg:mb-6 not-format">
        <address class="flex items-center mb-6 not-italic">
          <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
            <img class="mr-4 w-16 h-16 rounded-full" 
            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" 
            alt="{{ $post->user->name }}">
            <div>
              <a href="/posts?author={{ $post->user->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->user->name }}</a>
                <a href="/posts?category={{ $post->category->slug }}" class="block"> 
                  <span 
                  class="{{ $post->category->color }}
                   text-gray-600 text-xs font-medium inline-flex 
                  items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                      {{ $post->category->name }}
                  </span>
                </a>
              <p class="text-base text-gray-500 dark:text-gray-400">
                {{ $post->created_at->diffForHumans() }}
              </p>
            </div>
          </div>
        </address>
        <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
          {{ $post['title'] }}
        </h1>
      </header>
      <p>
        {{ $post['body'] }}
      </p>
    </article>
  </div>
</main>



</x-layout>