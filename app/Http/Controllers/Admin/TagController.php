<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Controllers\Controller;
use App\Tag;

class TagController extends Controller
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
        $tags = Tag::orderBy('id', 'DESC')->paginate(5);//Vemos las Publicaciones

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');//Mostramos el formulario de creacion
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
      $tag = Tag::create($request->all());//Guardamos la Publicación
      return redirect()->route('tags.edit', $tag->id)->with('info', 'Creación Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);//Mostramos la Publicación pedida

        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $tag = Tag::find($id);//Se modifica

      return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagStoreRequest $request, $id)
    {
        $tag = Tag::find($id);
        $tag->fill($request->all())->save();//Aca se actualiza la Publicación y se guarda la nueva version
        return redirect()->route('tags.edit', $tag->id)->with('info', 'Se ha modificado la etiqueta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();// Se busca y se elimina
        return back()->with('info', 'Se ha eliminado la etiqueta');
    }
}
