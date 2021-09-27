<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilUserRequest;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilUserController extends Controller
{
    public function index(){
        $data = User::where('id',Auth::user()->id)->get();
        return view('pages.user.profil.view',[
            'data' => $data
        ]);
    }
    public function user(){
        $data = User::where('id',Auth::user()->id)->get();
        return view('pages.user.profil.edit',[
            'data' => $data
        ]);
    }

    public function update(ProfilUserRequest $request, $id){
        $data = User::where('id',$id)->first();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->no_hp = $request->no_hp;
        $data->profession = $request->profession;
        $data->address = $request->address;

        if(request()->hasFile('photo_ktp')){
            $photo_ktp = request()->file('photo_ktp')->store('assets/user','public');
            $data->update(['photo_ktp' => $photo_ktp]);
        }
        $data->save();
        Alert::success('SUCCESS','Profil Berhasil diupdate');
        return redirect()->route('profil-user');
    }
}
