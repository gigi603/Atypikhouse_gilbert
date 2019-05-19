<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notifiable;


class UserController extends Controller
{
    use Notifiable;
    public function create(Request $request) {
        $id = $request->input('name');

        User::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        
        return response()->json('0');
    }

    public function get($id, Request $request) {
        $user = User::find($id);
        return response()->json($user);
    }

    public function delete($id, Request $request) {
        $user = User::find($id);
        $user->delete();
        return response()->json('0');
    }
}
