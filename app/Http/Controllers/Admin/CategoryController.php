<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
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
        $cats = Category::orderBy('id', 'DESC')->paginate(5);//Vemos las Publicaciones

        return view('admin.categories.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');//Mostramos el formulario de creacion
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
      $cats = Category::create($request->all());//Guardamos la Publicación
      return redirect()->route('categories.edit', $cats->id)->with('info', 'Creación Exitosa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats = Category::find($id);//Mostramos la Publicación pedida

        return view('admin.categories.show', compact('cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cats = Category::find($id);//Se modifica

      return view('admin.categories.edit', compact('cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryStoreRequest $request, $id)
    {
        $cats = Category::find($id);
        $cats->fill($request->all())->save();//Aca se actualiza la Publicación y se guarda la nueva version
        return redirect()->route('categories.edit', $cats->id)->with('info', 'Se ha modificado la categoría');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();// Se busca y se elimina
        return back()->with('info', 'Se ha eliminado la categoría');
    }
}
