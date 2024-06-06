<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login()
    {
    }
    public function authenticate(Request $request)
    {
        $credentials = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'email wajib di isi !',
            'password.required' => 'password wajib di isi',

        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('danger', 'login Gagal !');
    }
    public function v_user()
    {
        $user = user::all();
        return view('user/v_user', compact('user'));
    }

    public function v_register()
    {
        return view('user/register');
    }

    public function register(Request $request)
    {
        $validate =  $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:200',
            'is_admin'=> 'required'
            
        ]);

        $validate['password'] = bcrypt($validate['password']);
        user::create($validate);
        return redirect('user/v_user')->with('sukses', 'Data User Berhasil Di tambahkan');
    }

    public function edit_user($id)
    {
        $user = DB::table('users')->where('id', $id)->get()->first();
        return view('user/e_user', compact('user'));
    }

    public function save_edituser(Request $request, $id)
    {
        $validate =  $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|',
            'password' => 'required|min:6|max:200'
        ]);
        $validate['password'] = bcrypt($validate['password']);

        DB::table('users')->where('id', $id)->update([
            'id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect('user/v_user')->with('sukses', 'Data Users Berhasil Di Edit');
    }

    public function v_changepas()

    {
        return view('user/changepas');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|max:200',
            'new-password' => 'required|min:6|max:200',
        ]);

        if (Auth::Check()) {
            $requestData = $request->All();

            $currentPassword = Auth::User()->password;
            if (Hash::check($requestData['password'], $currentPassword)) {
                $userId = Auth::User()->id;
                $user = User::find($userId);
                $user->password = Hash::make($requestData['new-password']);;
                $user->save();
                return redirect('/')->with('sukses', 'Possword Berhasil Di Ganti.');
            } else {
                return back()->with('danger', 'Sorry, your current password was not recognised. Please try again.');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('user/v_user')->with('danger', 'Data User Berhasil Di Delete');
    }
}
