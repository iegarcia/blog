<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;


class PostController extends Controller
{
  public function  __contruct()
  {
    $this->middleware('auth');
  }
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $posts = Post::orderBy('id', 'DESC')
    ->where('user_id', auth()->user()->id)
    ->paginate(5);

    return view('admin.posts.index', compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $cats = Category::orderBy('name', 'ASC')->pluck('name', 'id');
    $tags = Tag::orderBy('name', 'ASC')->get();
    return view('admin.posts.create', compact('cats', 'tags'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(PostStoreRequest $request)
  {
    $post = Post::create($request->all());
    if ($request->file('file')) {
      $path = Storage::disk('public')->put('image', $request->file('file'));
      $post->fill(['file' => asset($path)])->save();
    }
    $post->tags()->attach($request->get('tags'));
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
    $post = Post::find($id);
    $this->authorize('pass', $post);

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
    $post = Post::find($id);
    $this->authorize('pass', $post);
    $cats = Category::orderBy('name', 'ASC')->pluck('name', 'id');
    $tags = Tag::orderBy('name', 'ASC')->get();

    return view('admin.posts.edit', compact('post', 'cats', 'tags'));
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
    $this->authorize('pass', $post);
    $post->fill($request->all())->save();
    if ($request->file('file')) {
      $path = Storage::disk('storage/public')->put('image', $request->file('file'));
      $post->fill(['file' => asset($path)])->save();
    }
    $post->tags()->sync($request->get('tags'));

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
    Post::find($id);
    $this->authorize('pass', $post);
    $post->delete();
    return back()->with('info', 'Se ha eliminado la publicación');
  }
}
