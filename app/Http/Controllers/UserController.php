<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function user_json(){
        $data = User::orderBy('id','desc')->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function index(){

        $title = 'Delete User?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);

        return view('admin.users.index');
    }

    public function create(){
        return view('admin.users.create');
    }

    public function insert(Request $request){
        $request->validate([
            'email' => 'required|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'role' => 'required',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        if ($user->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('user');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
    }

    
    public function edit($id){
        $user = User::findOrFail($id);

        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'nullable|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->role = $request->role;

        if ($request->password === '' || $request->password === null) {
            //
        } else {            
            $user->password = bcrypt($request->password);
        }

        if ($user->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('user');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
    }
    
    public function show($id){
        $data = User::findOrFail($id);

        return view('admin.users.show',compact('data'));
    }

    public function delete($id){
        $data = User::findOrFail($id);
        
        if ($data->delete()) {
            toast('Berhasil Menghapus Data','success');
            return redirect()->back();
        } else {
            toast('Gagal Menghapus Data','error');
            return redirect()->back();
        }
        
    }
}
