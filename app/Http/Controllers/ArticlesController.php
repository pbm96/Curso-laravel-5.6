<?php

namespace App\Http\Controllers;

use App\Article;
use App\Image;
use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\App;
use Laracasts\Flash\Flash;


class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles=Article::search($request->title)->orderBy('id','ASC')->paginate(5);

        return view('admin.articles.index')->with('articles',$articles);

    }


    public function create()
    {
        $categories=Category::orderBy('name','ASC')->pluck('name','id');
        $tags=Tag::orderBy('name','ASC')->pluck('name','id');
        return view('admin.articles.create')->with('categories',$categories)->with('tags',$tags);
    }


    public function store(Request $request)
    {
              $this->validate($request, [
       'image' => 'required|image'

      ]);
//        manipular imagenes
        if($request->file('image')){
            $file=$request->file('image');
            $name='blog_facilito_'.time().'.'.$file->getClientOriginalExtension();
            $path=public_path().'/image/articles/';
            $file->move($path,$name);
        }
        $article = new Article($request->all());
       $article->user_id=\Auth::user()->id;
      $article->save();
      $article->tags()->sync($request->tags);


      $image = new Image();
      $image->name= $name;
      $image->article()->associate($article);
      $image->save();
      Flash::success('se ha creado el articulo correctamente');
        return redirect()->route('articles.index');


    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::orderBy('name','ASC')->pluck('name','id');
        $article = Article::find($id);
        $tags=Tag::orderBy('name','ASC')->pluck('name','id');
        $my_tags=$article->tags->pluck('id');
        return view('admin.articles.edit')->with('categories',$categories)->with('tags',$tags)->with('my_tags',$my_tags)->with('article',$article);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article= Article::find($id);
        $article->fill($request->all());
        $article->tags()->sync($request->tags);
        $article->save();


        Flash::success('se ha editado el articulo correctamente');
        return redirect()->route('articles.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articles= Article::find($id);
        $articles->delete();
        Flash::error('se ha borrado el articulo');
        return redirect()->route('articles.index');
    }
}
