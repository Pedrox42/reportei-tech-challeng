<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function editProfile(){
        $user = auth()->user();
        return view('user.edit', $user);
    }

    public function updateProfile(Request $request){
        if(isset($request->all()['password'])) {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id . ',id'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $data['password'] = bcrypt($data['password']);
        }
        $user = auth()->user();
        $user->update($data);
        return redirect(route('editar-perfil'));
    }
}
