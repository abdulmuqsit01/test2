<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\instansi_model;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function view_login(Request $request)
    {
        return view('administrator.login');
    }

    public function view_registrasi()
    {
        return view('administrator.registrasi', ['instansiList' => instansi_model::all()]);
    }
    public function view_edit()
    {
        return view('administrator.akun_edit', ['akun' => User::where('id', Auth::user()->id)->get()]);
    }

    public function mutate_edit(Request $request)
    {
        // dd($request->id);
        $flight = User::find($request->id);

        $flight->name = $request->name;
        $flight->username = $request->username;
        if ($request->password != '') {
            $flight->password = password_hash($request->password, PASSWORD_DEFAULT);
        }
        // $flight->tag = $request->tag;

        $post = $flight->save();
        if ($post) {
            session()->flash('message-success', $request->name . ' berhasil di edit');
        }
        return view('administrator.akun_edit', ['akun' => User::where('id', Auth::user()->id)->get()]);
    }


    public function mutate_create(Request $request)
    {
        $customMessages = [
            'name.unique' => "Nama akun sudah pernah di gunakan",
            'name.required' => "Nama tidak boleh kosong",
            'username.unique' => "Username akun sudah pernah di gunakan",
            'username.required' => "Username tidak boleh kosong",
            'password.unique' => "Nama akun sudah pernah di gunakan",
            'username.required' => "Username tidak boleh kosong",
        ];

        $validatedData = $request->validate([
            'name' => 'required|unique:users,name',
            'username' => 'required|unique:users,username',
            'instansi' => 'required|',
            'password' => 'required',
            'instansi' => 'required',

        ], $customMessages);

        $post = User::create([
            'id' => rand(1, 99999999),
            'name' => $request->name,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'username' => $request->username,
            'role' => 'ADMIN',
            'instansi_id' => $request->instansi,
        ]);
        if ($post) {
            session()->flash('message-success', $request->name . ' berhasil disimpan');
        }
        return redirect()->route("view_admin_registrasi");
    }

    public function mutate_login(Request $request)
    {
        $customMessages = [
            'username.required' => 'Pastikan username terisi dengan benar',
            'password.required' => 'Pastikan password terisi dengan benar',
        ];

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $customMessages);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd(Auth::user());
            if (Auth::user()->name != "Admin") {
                return redirect()->route("view_admin_program");
            }
            return redirect()->route("view_admin_instance");
        }
        Session::flash(
            'message',
            'Pastikan username dan password Anda benar'
        );
        return redirect()->route("view_admin_login");
    }

    public function mutate_logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("view_admin_login");
    }
}
