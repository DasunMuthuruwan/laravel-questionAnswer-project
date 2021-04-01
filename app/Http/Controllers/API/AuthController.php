<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    //
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */

     public function __construct()
     {
        $this->middleware('auth:api',['except'=>['login','register']]);
     }

     /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
     public function login(Request $request){

        $validator = Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required|string|min:8'
        ]);

         if($validator->fails()){
             return response()->json($validator->errors(), 422);
         }

        //  if(!$token = Auth::attempt($validator->validated())){
        //     return response()->json(['error' => 'invalid_credentials'], 400);
        //  }

        try {
            if (! $token = JWTAuth::attempt($validator->validated())) {
                return response()->json(['error' => 'invalid credentials'], 400);
            }
        } catch (JWTException $e) {
                return response()->json(['error' => 'could not create token'], 500);
        }

         return $this->createNewToken($token);
     }

     /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */

     public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $user = User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);

     }


    // public function login(Request $request)
    //     {
    //         $credentials = $request->only('email', 'password');

    //         try {
    //             if (! $token = JWTAuth::attempt($credentials)) {
    //                 return response()->json(['error' => 'invalid_credentials'], 400);
    //             }
    //         } catch (JWTException $e) {
    //             return response()->json(['error' => 'could_not_create_token'], 500);
    //         }

    //         return response()->json(compact('token'));
    //     }

        // public function register(Request $request)
        // {
        //         $validator = Validator::make($request->all(), [
        //         'name' => 'required|string|max:255',
        //         'email' => 'required|string|email|max:255|unique:users',
        //         'password' => 'required|string|min:6|confirmed',
        //     ]);

        //     if($validator->fails()){
        //             return response()->json($validator->errors()->toJson(), 400);
        //     }

        //     $user = User::create([
        //         'name' => $request->get('name'),
        //         'email' => $request->get('email'),
        //         'password' => bcrypt($request->get('password')),
        //     ]);

        //     $token = JWTAuth::fromUser($user);

        //     return response()->json(compact('user','token'),201);
        // }



    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */

     public function logout(){
         auth()->logout();

         return response()->json([
             'message' => 'user successfully logout'
         ]);
     }

     /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */

     public function refresh(){
         return $this->createNewToken(auth()->refresh());
     }

     /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        try{
            return response()->json(auth()->user());
        }
        catch(JWTException $e){
            return response()->json(['error' => 'user not found'],500);
        }
    }

     /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // 'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
