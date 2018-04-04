<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function index()
    {
        $users=User::orderBy('id','ASC')->paginate(3);
        return view('admin.users.index')->with('users',$users);
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(UserRequest $request)
    {
//        $this->validate($request, [
//            'name' => 'required|min:4|max:120',
//            'email' => 'required|unique:users|max:255',
//        ]);

        $user = new User($request->all());
        $user->password=bcrypt($request->password);
        $user->save();
        Flash::success("se ha registrado ".$user->name." de forma exitosa");
        return redirect()->route('users.index');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
       $user = User::find($id);
       return view('admin.users.edit')->with('user',$user);
    }


    public function update(Request $request, $id)
    {

            $user= User::find($id);
            $user->fill($request->all());
            $user->save();
        Flash::success('se ha modificado el usuario '.$user->name);
            return redirect()->route('users.index');



    }


    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        Flash::error('se ha borrado el usuario');
        return redirect()->route('users.index');

    }
}
