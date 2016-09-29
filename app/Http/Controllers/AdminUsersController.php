<?php

namespace App\Http\Controllers;

use App\Photos;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all()->pluck('name','id');


//        $roles=[''=>'--select option--']+ Role::lists('name','id')->toArray();
//        return view('admin.users.create');
//        $roles=[''=>'--select option--']+ Role::Lists('name','id')->toArray();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $file=$request->file('photo_id');
        $input=$request->all();
        if($request->file('photo_id')) {
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;
        }
        $input['password']=bcrypt($request->password);
        User::create($input);
        return redirect('/admin/users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
        $user=User::find($id); 
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\EditUserRequest $request, $id)
    {
        //
        $file=$request->file('photo_id');
        if($request->password == "") {
            $input = $request->except('password');
            if($request->file('photo_id')) {
                $name=time().$file->getClientOriginalName();
                $file->move('images',$name);
                $photo=Photo::create(['file'=>$name]);
                $input['photo_id']=$photo->id;
            }
        }
        else{
            $input=$request->all();
            if($request->file('photo_id')) {
                $name=time().$file->getClientOriginalName();
                $file->move('images',$name);
                $photo=Photo::create(['file'=>$name]);
                $input['photo_id']=$photo->id;
            }
            $input['password']=bcrypt($request->password);
        }
        $user = User::find($id);
        $user->update($input);
        return redirect('/admin/users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $name=User::find($id)->name;
        User::find($id)->delete();
        Session::flash('userDeleted','Deleted'.$name);
        return redirect('/admin/users');

    }
}
