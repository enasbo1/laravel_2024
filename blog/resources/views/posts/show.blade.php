<x-app-layout>
    <link rel="canonical" href="https://tailwindcomponents.com/component/blog-page" itemprop="URL">
    <script src="https://cdn.tailwindcss.com"></script>
    
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __( $post ->title) }}
            </h2>
        </x-slot>
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <img src="{{asset('/storage/' . $post->image)}}" alt="">

            <div>
                {{ $post ->content}}
            </div>
    
    </div>
    </x-app-layout>
    