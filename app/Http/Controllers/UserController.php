<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
        /**
         * @OA\Get(
         *      path="/api/users",
         *      tags={"User"},
         *      summary="Get list of projects",
         *      description="Returns list of projects",
         *      @OA\Response(
         *          response=200,
         *          description="Successful operation",
         *          @OA\JsonContent(ref="components/schemas/ProjectResource")
         *       ),
         *      @OA\Response(
         *          response=401,
         *          description="Unauthenticated",
         *      ),
         *      @OA\Response(
         *          response=403,
         *          description="Forbidden"
         *      )
         *     )
         */
    public function getAllUsers() {
      $users = Users::get()->toJson(JSON_PRETTY_PRINT);
          return response($users, 200);
    }


    /**
     * @OA\Post(
     * path="/api/users",
     * summary="usre register",
     * description="register with basic details",
     * operationId="Register",
     * tags={"User"},
     * @OA\RequestBody(
     *    required=true,
     *    description="Pass user credentials",
     *    @OA\JsonContent(
     *       required={"email","password"},
     *       @OA\Property(property="name", type="string", example="mAYUR"),
     *       @OA\Property(property="email", type="string", format="email", example="user1@mail.com"),
     *       @OA\Property(property="password", type="string", format="password", example="PassWord12345"),
     *    ),
     * ),
     * @OA\Response(
     *    response=422,
     *    description="Wrong credentials response",
     *    @OA\JsonContent(
     *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
     *        )
     *     )
     * )
     */

    public function createUser(Request $request) {
        $user = new users;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json(["message" => "user record created"], 201);
      }

}
