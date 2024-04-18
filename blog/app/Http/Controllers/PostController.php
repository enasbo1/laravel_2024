<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Actions\PostUpdateAction;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //pour eviter que à chaque chargement il aillle chercher la categorie en base, 
        //pas opti, on indique ici que chaque post est appelé avec sa category
        $posts = Post::with ('category', 'user')-> latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view ('posts.create', compact ('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $imageName = $request -> image ->store('posts');
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Votre post a été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact ('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {


        $categories = Category::all();
        return view ('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {

        $arrayUpdate = [

            'title' => $request->title,
            'content' => $request->content
        ];
        

        if ($request -> image != null){
            $imageName = $request -> image ->store('posts');
            $arrayUpdate = array_merge ($arrayUpdate,[
                'image' => $imageName
            ]);


            
        }


        $post->update($arrayUpdate);

        return redirect()->route('dashboard')->with('success', 'Votre post a été modifié');

    }

    /**
     * 
     * 
     
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
    

        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Votre post a été supprimé');
    }
}
