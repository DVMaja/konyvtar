<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function show($id)
    {
        return User::find($id);
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        //még nem létetik az útvonal        
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->save();
    }

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "password" => array('required', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[^\s]{8,}$/')
        ]);
        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()->all()], 400);
        }
        $user = User::where("id", $id)->update([
            "password" => Hash::make($request->password),
        ]);
        return response()->json(["user" => $user]);
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permission = $request->permission;
        $user->save();
    }
}
