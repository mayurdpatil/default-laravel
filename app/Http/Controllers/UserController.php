<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers() {
      $users = Users::get()->toJson(JSON_PRETTY_PRINT);
          return response($users, 200);
    }

    public function createUser(Request $request) {
        $user = new users;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json(["message" => "user record created"], 201);
      }

}
