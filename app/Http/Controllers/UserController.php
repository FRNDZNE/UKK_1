<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
    // Petugas
    public function index_petugas()
    {
        $data = User::whereRoleIs('petugas')->get();
        return view('user.petugas',compact('data'));
    }

    public function store_petugas(Request $req)
    {
        $data = $req->all();
        $data['password'] = bcrypt($req->password);
        $user = User::create($data);

        $user->attachRole('petugas');
        return back();
    }

    public function update_petugas(Request $req)
    {
        // $data = $req->all();
        // // return $data;
        // $user = User::find($req->id);
        // $user->password = $req->password ?? bcrypt($req->password) : $user->password;
        // // if ($req->password != null) {
        // //     $user['password'] = bcrypt($req->password);
        // // }else {
        // //     unset($user['password']);
        // // }
        // $user->update($data);
        // return back();
        // $data = $req->all();
        $user = User::find($req->id);

        $user->nik = $req->nik;
        $user->name = $req->name;
        $user->username = $req->username;
        if ($req->password != null ) {
            $user->password = bcrypt($req->password);

            // return 'password diubah';
        }else {
            unset($user->password);
            // return 'password tetap gan';
        }
        $user->telp = $req->telp;
        $user->save();
        return back();
    }

    public function destroy_petugas($id)
    {
        User::find($id)->delete();
        return back();
    }

    public function profil_masyarakat()
    {
        $data = User::where('id', Auth::id())->first();
        return view('user.masyarakat', compact('data'));
    }

    public function update_profil(Request $req)
    {
        $user = User::find($req->id);

        $user->nik = $req->nik;
        $user->name = $req->name;
        $user->username = $req->username;
        if ($req->password != null ) {
            $user->password = bcrypt($req->password);

            // return 'password diubah';
        }else {
            unset($user->password);
            // return 'password tetap gan';
        }
        $user->telp = $req->telp;
        $user->save();
        return back()->with('success','Berhasil Mengubah Data');

    }

}
