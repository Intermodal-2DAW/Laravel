<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use SebastianBergmann\Environment\Console;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',
            ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }

    //---------------------------------------------------------------   INDEX  ----------------------------------------------------------------------\\

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::get();
        // return($posts);
        return view('posts.index')->with('posts',$posts);
        // return view('posts.listing');

    }

    //---------------------------------------------------------------   CREATE  ----------------------------------------------------------------------\\

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('posts.index');
        //return redirect()->route('start');
        // return redirect()->action([PostController::class, 'index']);
        // return redirect()->guest('start');
        $users = User::get();
        return view('posts.create', compact('users')) ;
    }


    //---------------------------------------------------------------   STORE  ----------------------------------------------------------------------\\

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        // request()->validate(
        //     [
        //     'title' => 'required|min:5',
        //     'content' => 'required|min:50'
        //     ]
        // );
        //
        if($request->has('title')){

            $post = new Post();
            $post->title = $request->get('title');
            $post->description = $request->get('description');
            $post->image = $request->get('image');
            $post->user()->associate(User::findOrFail($request->get('user')));
            $post->save();

            return redirect()->route('posts.index');

        }
    }

    //---------------------------------------------------------------   SHOW  ----------------------------------------------------------------------\\

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // return view('posts.tab')->with('id',$id);
        //Esta es una forma de buscarlo
        $post = Post::find($id);

        return view('posts.show', compact('post'));

    }

    //---------------------------------------------------------------   EDIT  ----------------------------------------------------------------------\\

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // return redirect()->guest('start');
        // return view('posts.show')->with('id',$id);
        $post = Post::find($id);

        return view('posts.edit', compact('post'));


    }

    //---------------------------------------------------------------   UPDATE  ----------------------------------------------------------------------\\

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->has('title')){

            $post = Post::find($id);
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            // $post->user()->associate(User::findOrFail($request->get('user')));
            $post->save();

            return redirect()->route('posts.index');


        }

    }

    //---------------------------------------------------------------   DESTROY  ----------------------------------------------------------------------\\

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index');

    }

    //---------------------------------------------------------------   METODOS TEMPORALES  ----------------------------------------------------------------------\\


    public function newPost(){
        $post = new Post();
        $rand = rand(100,1000);
        $post->title = 'Title: '.$rand;
        $post->content = 'Content: '.$rand;
        $post->user_id = 1;
        $post->save();

        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    public function editTest($id){
        $postEdit = Post::findOrFail($id);
        $rand = rand(100,1000);
        $postEdit->title = 'Title:'.$rand;
        $postEdit->content = 'Content:'. $rand;
        $postEdit->save();

        $posts = Post::get();
        return view('posts.index', compact('posts'));
    }

    public function start(){
        return view('start');
    }



}
