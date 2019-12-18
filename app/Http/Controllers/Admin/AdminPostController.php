<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Controllers\Controller;
use App\Post;

class AdminPostController extends Controller
{
  public function  __contruct()
  {
    $this->middleware('auth');// Protegemos la Publicación
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(5);//Vemos las Publicaciones

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');//Mostramos el formulario de creacion
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
      $post = Post::create($request->all());//Guardamos la Publicación
      return redirect()->route('posts.edit', $post->id)->with('info', 'Creación Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);//Mostramos la Publicación pedida

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::find($id);//Se modifica

      return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $id)
    {
        $post = Post::find($id);
        $post->fill($request->all())->save();//Aca se actualiza la Publicación y se guarda la nueva version
        return redirect()->route('posts.edit', $post->id)->with('info', 'Se ha modificado la publicación');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();// Se busca y se elimina
        return back()->with('info', 'Se ha eliminado la publicación');
    }
}
