<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Laracasts\Flash\Flash;



class TagsController extends Controller
{

    public function index( Request $request)
    {

        $tags=Tag::search($request->name)->orderBy('id','ASC')->paginate(3);
        return view('admin.tags.index')->with('tags',$tags);
    }


    public function create()
    {
        return view('admin.tags.create');
    }


    public function store(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|min:4|max:120',
//            'email' => 'required|unique:users|max:255',
//        ]);

        $this->validate($request, [
            'name' => 'required|min:4|max:120|unique:tags',
        ]);

        $tags = new tag($request->all());
        Flash::success('El Tag '.$tags->name.' se ha guardado correctamente');
        $tags->save();
        return redirect()->route('tags.index');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $tags = Tag::find($id);
        return view('admin.tags.edit')->with('tags',$tags);
    }


    public function update(Request $request, $id)
    {

        $tags= Tag::find($id);
        $tags->fill($request->all());
        $tags->save();
        Flash::success('se ha modificado el usuario '.$tags->name);
        return redirect()->route('tags.index');



    }


    public function destroy($id)
    {
        $tags= Tag::find($id);
        $tags->delete();
        Flash::error('se ha borrado el usuario');
        return redirect()->route('tags.index');

    }
}
