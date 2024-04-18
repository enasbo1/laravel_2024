<x-app-layout>
<link rel="canonical" href="https://tailwindcomponents.com/component/blog-page" itemprop="URL">
<script src="https://cdn.tailwindcss.com"></script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer un post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">




            <div class="my-5">

                @foreach ($errors -> all() as $error)

                    <span class="block text-red-500">{{ $error }}</span>
                    
            @endforeach
        </div>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="mt-10">
            <!--token csrf-->
            @csrf
            <x-label for="title" value="Titre du post" />
            <x-input id="title" name="title" />

            <x-label for="content" value="Contenu du post" />
            <textarea id="content" name="content"></textarea>

            <x-label for="image" value="Image du post" />
            <x-input id="image" type="file" name="image" />

            <x-label for="catgeory" value="Catégorie du post" />

            <select name ="category" id ="category">
                 @foreach ($categories as $category)
                 <option value ="{{$category -> id}}"> {{$category ->name}}</option>
                 @endforeach
            </select>

            <x-button style="display:block !important;" class="mt-5">Créer mon post</x-button>
    </form>

</div>
</x-app-layout>
