<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //---------------------------------------------------------------   INDEX  ----------------------------------------------------------------------\\
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Asociado a una operación GET de listado general
    public function index()
    {
        //
        $post = Post::get();
            // return $post;
        return response()->json($post, 200);
    }

    //---------------------------------------------------------------   STORE  ----------------------------------------------------------------------\\
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Asociada a una operación POST, para almacenar los datos que llegan a la solicitud
    public function store(Request $request)
    {
        //
        $post = new Post();
        $post->title = $request->title;

        $post->description = $request->description;
        $post->image = $request->image;
        $post->user()->associate(User::findOrFail($request->user_id));
        $post->ok = $request->ok;
        $post->save();

        return response()->json($post, 201);
    }

    //---------------------------------------------------------------   SHOW  ----------------------------------------------------------------------\\
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    //Asociado a una operación GET para obtener el registro asociado a un identificador específico
    public function show(Post $post)
    {
        //
            //return $post;
        return response()->json($post, 200);
    }

    //---------------------------------------------------------------   UPDATE  ----------------------------------------------------------------------\\
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    //Asociada a una operación PUT, para actualizar los datos del registro asociado a un identificador específico
    public function update(Request $request, Post $post)
    {
        //
        $post->id = $request->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $request->image;
        $post->user()->associate(User::findOrFail($request->user_id));
        $post->ok = $request->ok;
        $post->save();

        return response()->json($post, 201);
    }

    //---------------------------------------------------------------   DESTROY  ----------------------------------------------------------------------\\
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    //Asociado a una operación DELETE, para eliminar los datos del registro asociado a un identificador específico
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return response()->json(null, 204);
    }
}
